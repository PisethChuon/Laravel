<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $numbers = range(1, 100); // Create an array of numbers from 1 to 100
        return view('index', ['index' => $numbers]); // Pass the numbers to the view
    }
}
