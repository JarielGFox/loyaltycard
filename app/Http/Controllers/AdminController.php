<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPointsRequest;
use App\Models\Card;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function pointsManager(Request $request)
    {
        if (auth()->user()->role !== 1 && 2 && 3) {
            abort(403);
        }

        $idcard = $request->query('idcard');
        $card = null;

        if ($idcard) {
            $card = Card::where('card', $idcard)->first(); // it checks if finds a result

            if (!$card) {
                return redirect()->back()->withErrors(['error' => 'Card number not found in the database']); // if no card matches the number given
            }
        }

        return view('admin.cards.points', compact('card', 'idcard'));
    }

    public function checkPoints(Request $request)
    {
        $card = Card::where('card', $request->input('idcard'))->first(); // checks if there is any card with the input

        if (!$card) {
            return redirect()->back()->withErrors(['error' => 'Card number not found in the database']); // if no card redirect with error message
        }

        return redirect()->route('points-manager', ['idcard' => $card->card]);
    }

    public function givePoints(AddPointsRequest $request)
    {
        $card = Card::where('card', $request->input('idcard'))->firstOrFail();

        // update the points only if the input value is not empty
        if ($request->filled('points')) {
            $card->points = $request->input('points');
            $card->save();
            return redirect()->route('points-manager', ['idcard' => $card->card])->with('success', 'Points updated successfully');
        }
    }
}
