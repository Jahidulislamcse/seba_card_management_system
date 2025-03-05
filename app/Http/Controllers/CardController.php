<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\User;
use App\Models\Ward;
use App\Models\Union;
use App\Models\Upazila;
use App\Models\Customer;
use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CardController extends Controller
{
    public function index()
    {

        // dd('hello');
        // $data = [
        //     'cards' => Card::latest()->paginate(20),
        //     'ward_admins' => User::where('role', 'ward_admin')->get(),
        //     'division' => Division::all(),
        //     'district' => District::all(),
        //     'upazila' => Upazila::all(),
        //     'union' => Union::all(),
        //     'ward' => Ward::all(),
        // ];

        $data['cards'] = Card::query()->where('status', 'active')->orWhere('status', 'expired')->latest()->paginate(20);

        // dd($data['cards']);

        return view('card.card-number', $data);
    }


    public function create()
    {
        $data['ward_admins'] = User::where('role', 'ward_admin')->get();
        // dd('hello');
        return view('card.create', $data);
    }


    public function prndingCard()
    {
        $data = [
            'cards' => Card::where('status', 'pending')->latest()->paginate(20),
        ];

        return view('card.card-request-list', $data);
    }



    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'assign_id' => 'required|exists:users,id',
            'price' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $status = auth()->user()->role == 'super_admin' ? 'active' : 'pending';

        if ($request->card_mode == 'single') {
            $request->validate([
                'card_number' => 'required|digits:6|unique:cards,card_number',
            ]);
            Card::create([
                'creator_id' => auth()->id(),
                'assign_id' => $request->assign_id,
                'card_number' => $request->card_number,
                'price' => $request->price,
                'status' => $status, // Use the defined variable
            ]);
        } elseif ($request->card_mode == 'multiple') {
            if ($request->generation_type == 'random') {
                foreach ($request->random_card_numbers as $card_number) {
                    Card::create([
                        'creator_id' => auth()->id(),
                        'assign_id' => $request->assign_id,
                        'card_number' => $card_number,
                        'price' => $request->price,
                        'status' => $status,
                    ]);
                }
            } elseif ($request->generation_type == 'range') {
                $start = (int) $request->start_card_number;
                $end = (int) $request->end_card_number;
                $storedNumbers = [];
                $duplicateNumbers = [];
                for ($i = $start; $i <= $end; $i++) {
                    $cardNumber = str_pad($i, 6, '0', STR_PAD_LEFT);
                    if (Card::where('card_number', $cardNumber)->exists()) {
                        $duplicateNumbers[] = $cardNumber;
                        continue;
                    }
                    Card::create([
                        'creator_id' => auth()->id(),
                        'assign_id' => auth()->id(),
                        'card_number' => $cardNumber,
                        'price' => $request->price,
                        'status' => $status,
                    ]);
                    $storedNumbers[] = $cardNumber;
                }
                $successMessage = '';
                $errorMessage = '';

                if (!empty($storedNumbers)) {
                    $successMessage = 'The following card numbers were successfully stored: ' . implode(', ', $storedNumbers);
                }

                if (!empty($duplicateNumbers)) {
                    $errorMessage = 'The following card numbers already exist and were not stored: ' . implode(', ', $duplicateNumbers);
                }


                if (auth()->user()->role == 'super_admin') {
                    return redirect()->route('cards.list')
                        ->with('success', $successMessage)
                        ->with('error', $errorMessage);
                } else {
                    return redirect()->route('ward_admin.cards.list')
                        ->with('success', $successMessage)
                        ->with('error', $errorMessage);
                }
            }
        }

        return redirect()->route('cards.list')->with('success', 'Card(s) created successfully');
    }


    public function update(Request $request, $id)
    {
        $card = Card::find($id);

        if (!$card) {
            return response()->json(['message' => 'Card not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'card_number' => 'required|digits:6|unique:cards,card_number,' . $id,
            'price' => 'required|numeric',
            'status' => 'required|in:pending,active,expired'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation failed', 'errors' => $validator->errors()], 422);
        }

        $card->update([
            'card_number' => $request->card_number,
            'price' => $request->price,
            'status' => $request->status,
        ]);

        return response()->json(['message' => 'Card updated successfully']);
    }


    public function destroy($id)
    {
        $card = Card::find($id);

        if (!$card) {
            return redirect()->back()->with('error', 'Card not found');
        }
        $card->delete();
        return redirect()->back()->with('success', 'Card deleted successfully');
    }


    public function searchCard(Request $request)
    {
        $cardNumber = $request->input('card_number');

        // Check if a card with the given number exists
        $card = Card::where('card_number', $cardNumber)->first();

        if ($card) {
            // Card exists, now fetch the related customer data
            $customer = $card->customer; // assuming the relation is defined in the Card model

            if ($customer) {
                return response()->json([
                    'message' => 'Card exists. Customer details found.',
                    'customer' => [
                        'name' => $customer->name ? $customer->name : 'N/A', // Show 'N/A' if name is null
                        'phone' => $customer->phone ? $customer->phone : 'N/A', // Show 'N/A' if phone is null
                        'card_number' => $card->card_number
                    ]
                ]);
            } else {
                // Customer not found, return null
                return response()->json([
                    'message' => 'Card exists, but no customer data found.',
                    'customer' => null
                ]);
            }
        } else {
            // Card not found, return null
            return response()->json([
                'message' => 'Card not found.',
                'customer' => null
            ]);
        }
    }


    public function approveCard(Request $request, $id)
    {
        try {
            $card = Card::findOrFail($id);
            Log::info("Current status of card {$card->id}: " . $card->status);
            $card->price = $request->price;
            $card->status = 'active';
            $card->save();
            Log::info("Updated status of card {$card->id}: " . $card->status);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            Log::error("Error updating card {$id}: " . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'An error occurred while approving the card.'], 500);
        }
    }
}
