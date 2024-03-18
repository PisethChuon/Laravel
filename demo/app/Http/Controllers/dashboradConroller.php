<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboradConroller extends Controller
{
    public function index(){
        return view("welcome");
    }
}
