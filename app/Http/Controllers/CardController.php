<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\User;
use App\Models\District;
use App\Models\Division;
use App\Models\Union;
use App\Models\Upazila;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CardController extends Controller
{
    public function index()
    {
        $data = [
            'cards' => Card::latest()->paginate(10),
            'ward_admins' => User::where('role', 'ward_admin')->get(),
            'division' => Division::all(),
            'district' => District::all(),
            'upazila' => Upazila::all(),
            'union' => Union::all(),
            'ward' => Ward::all(),
        ];

        return view('card.index', $data);
    }



   public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'assign_id' => 'required|exists:users,id',
        'price' => 'required|numeric',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'status' => 'required|in:pending,active,expired',
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
            'assign_id' => $request->assign_id,
            'card_number' => $request->card_number,
            'price' => $request->price,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status,
        ]);
    } elseif ($request->card_mode == 'multiple') {
        if ($request->generation_type == 'random') {
            foreach ($request->random_card_numbers as $card_number) {
                Card::create([
                    'creator_id' => auth()->id(),
                    'assign_id' => $request->assign_id,
                    'card_number' => $card_number,
                    'price' => $request->price,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                    'status' => $request->status,
                ]);
            }
        } elseif ($request->generation_type == 'range') {
            $start = (int) $request->start_card_number;
            $end = (int) $request->end_card_number;

            for ($i = $start; $i <= $end; $i++) {
                Card::create([
                    'creator_id' => auth()->id(),
                    'assign_id' => $request->assign_id,
                    'card_number' => str_pad($i, 6, '0', STR_PAD_LEFT),
                    'price' => $request->price,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                    'status' => $request->status,
                ]);
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
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:pending,active,expired'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation failed', 'errors' => $validator->errors()], 422);
        }

        $card->update([
            'card_number' => $request->card_number,
            'price' => $request->price,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status,
        ]);

        return response()->json(['message' => 'Card updated successfully']);
    }


    public function destroy($id)
    {
        $card = Card::find($id);

        if (!$card) {
            return redirect()->route('cards.list')->with('error', 'Card not found');
        }
        $card->delete();
        return redirect()->route('cards.list')->with('success', 'Card deleted successfully');
    }

}
