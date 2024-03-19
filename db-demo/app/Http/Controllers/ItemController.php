<?php

namespace App\Http\Controllers;
use App\models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'description' => 'required',
    ]);

    Item::create($validatedData);

    return redirect('/items')->with('success', 'Item created successfully');
}
}
