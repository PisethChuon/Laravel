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

    public function store(){


        try {
            $this->validate(request(), [
                'name' => ['required'],
                'description' => ['required']
            ]);
        } catch (ValidationException $e) {
        }


        $data = request()->all();


        $todo = new Todo();
        //On the left is the field name in DB and on the right is field name in Form/view
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->save();

        session()->flash('success', 'Todo created succesfully');

        return redirect('/');

    }
        
}
