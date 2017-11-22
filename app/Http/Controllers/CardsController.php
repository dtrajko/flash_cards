<?php

namespace App\Http\Controllers;

use App\Card;

class CardsController extends Controller
{
    public function index()
    {
        $data = Card::getCardData();
        return view('cards.index', $data);
    }

    public function json()
    {
        $data = Card::getCardData();
        return response()->json($data);
    }
}
