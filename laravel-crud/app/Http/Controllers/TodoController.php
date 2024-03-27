<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Validation\ValidatesRequests; 

use Illuminate\Http\Request;

class TodoController extends Controller
{
    use ValidatesRequests;
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
    public function details(Todo $todo){
        return view('details')->with('todos', $todo);
    }
    // Function 'edit'
    public function edit(){
        return view('edit');
    }
    // Function 'update'
    public function update(Todo $todo){

        try {
            $this->validate(request(), [
                'name' => ['required'],
                'description' => ['required'],
           
            ]);
        } catch (ValidationException $e) {
        }

        $data = request()->all();

       
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->save();

        session()->flash('success', 'Todo updated successfully');

        return redirect('/');

    }
    // Function 'delete'
    public function delete(Todo $todo){

        $todo->delete();

        return redirect('/');

    }
    // Function 'store' for sending data to the server

    public function store()
{
    try {
        $this->validate(request(), [
            'name' => ['required'],
            'description' => ['required']
        ]);
    } catch (ValidationException $e) {
        // Handle validation exception if needed
        return back()->withErrors($e->validator->errors())->withInput();
    }

    $data = request()->all();

    // Check if 'name' key exists in $data array
    if (!isset($data['name'])) {
        // Handle the case where 'name' key is missing
        // You can redirect back with an error message or handle it as you see fit
        return back()->with('error', 'Name field is missing')->withInput();
    }

    $todo = new Todo();

    // Assign values to the model attributes
    $todo->name = $data['name'];
    $todo->description = $data['description'];
    $todo->save();

    session()->flash('success', 'Todo created successfully');

    return redirect('/');
}
        
}
