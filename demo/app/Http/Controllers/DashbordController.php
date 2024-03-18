<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = [
            [
                "name"=> "Alex",
                "age" => "20",
            ],
            [
                "name"=> "Mac",
                "age"=> "18",
            ]
        ];

        return view('dashbord', ['users' => $users]);
    }
}
