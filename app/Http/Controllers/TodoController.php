<?php

namespace App\Http\Controllers;
use Validator;
use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // standard query
        // $todos = \Auth::user()->todos;

        // if you want to make custom queries:
        $todos = \Auth::user()->todos()
            ->orderBy('id', 'DESC')
            ->take(5)
            ->get();

        return view('todos/index')->with('todos', $todos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todos/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validatie
        // in database zetten
        // redirecten naar todos.index
        Validator::make($request->all(), [
           'title'          => 'required|string|min:6',
           'description'    => 'string',
           'deadline'       => 'date',
           'priority'       => 'required|between:1,5'
        ])->validate();

        $todo = new Todo();
        $todo->user_id      = \Auth::id();
        $todo->title        = $request->title;
        $todo->description  = $request->description;
        $todo->deadline     = $request->deadline;
        $todo->priority     = $request->priority;

        $todo->save();
        // wat nu?
        return redirect( route('todos.index') )
            ->with('success', 'Todo item created succesfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        abort_if(\Auth::id() !== $todo->user_id, 403);
        return view('todos.show')->with('todo', $todo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        $todo->deadline = date_timestamp_get(new \DateTime($todo->deadline));
        return view('todos.edit')
            ->with('todo', $todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        dd( $request->all() );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        //
    }
}
