<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // Function 'index'
    public function index(){
        $todo = Todo::all();
        return view('index')->with('todos', $todo);
    }
    // Function 'Create'
    public function create(){
        return view('create');
    }
    // Function 'Details'
    public function details(){
        return view('details');
    }
    // Function 'edit'
    public function edit(){
        return view('edit');
    }
    // Function 'update'
    public function update(){
    // I will write code for update a Todo here
    }
    // Function 'delete'
    public function delete(){
        // I will write code for deleting a Todo here
    }
    // Function 'store' for sending data to the server
    public function store(){
        // I Will write code for storing a data here
    }


        
}
