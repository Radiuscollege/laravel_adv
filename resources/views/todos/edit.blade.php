@extends('layouts.base')

@section('content')
    <h2>Edit Todo</h2>

    @include('partials.notifications')

    <form action="{{route('todos.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <br>
            <input value="{{$todo->title}}" name="title" class="input" type="text" id="title">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <br>
            <textarea name="description" class="input" type="text" id="description">{{$todo->description}}</textarea>
        </div>

        <div class="form-group">
            <label for="deadline">Deadline {{$todo->deadline}}</label>
            <br>
            <input value="" type="datetime-local" class="input" name="deadline" id="">
        </div>


        <div class="field">
            <label for="priority">Priority </label>
            <select class="input" name="priority" id="priority">
                <option value=""></option>
                <option value="1" @if($todo->priority == 1) selected @endif>Very low priority</option>
                <option value="2" @if($todo->priority == 2) selected @endif>Low priority</option>
                <option value="3" @if($todo->priority == 3) selected @endif>Neutral priority</option>
                <option value="4" @if($todo->priority == 4) selected @endif>High priority</option>
                <option value="5" @if($todo->priority == 5) selected @endif>Very high priority</option>
            </select>
        </div>

        <input type="submit" value="Edit Item" class="btn is-primary" >


    </form>
@endsection