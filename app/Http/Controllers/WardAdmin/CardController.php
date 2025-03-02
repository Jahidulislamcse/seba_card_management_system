<?php

namespace App\Http\Controllers\WardAdmin;

use App\Http\Controllers\Controller;
use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CardController extends Controller
{
    public function index()
    {

        $cards = Card::query()->where('assign_id', auth()->id())->orderBy('id', 'desc')->paginate(10);
        return view('word-admin.cards.list', compact('cards'));
    }

    public function create()
    {
        return view('word-admin.cards.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if ($request->card_mode == 'single') {
            $request->validate([
                'card_number' => 'required|digits:6|unique:cards,card_number',
            ]);

            Card::create([
                'creator_id' => auth()->id(),
                'assign_id' => auth()->id(),
                'card_number' => $request->card_number,
                'price' => $request->price,
                'status' => 'pending',
            ]);
        } elseif ($request->card_mode == 'multiple') {
            if ($request->generation_type == 'random') {
                foreach ($request->random_card_numbers as $card_number) {
                    Card::create([
                        'creator_id' => auth()->id(),
                        'assign_id' => auth()->id(),
                        'card_number' => $card_number,
                        'price' => $request->price,
                        'status' => 'pending',
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
                        'status' => 'pending',
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
                return redirect()->route('ward_admin.cards.list')
                    ->with('success', $successMessage)
                    ->with('error', $errorMessage);
            }
        }
        return redirect()->route('ward_admin.cards.list')->with('success', 'Card(s) created successfully');
    }
}
