<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item; // Import the Item model

class ItemController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate
        (
            [
                'name' => 'required',
                'description' => 'required',
            ]
        );
        
        Item::create($validatedData);
        
        return redirect('/items')->with('success', 'Item created successfully');
    }
}
