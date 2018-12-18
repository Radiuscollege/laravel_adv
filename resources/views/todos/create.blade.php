@extends('layouts.base')

@section('content')
    <h2>Create new Todo</h2>

    @include('partials.notifications')

    <form action="{{route('todos.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <br>
            <input name="title" class="input" type="text" id="title">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <br>
            <textarea name="description" class="input" type="text" id="description"></textarea>
        </div>

        <div class="form-group">
            <label for="deadline">Deadline</label>
            <br>
            <input type="datetime-local" class="input" name="deadline" id="">
        </div>


        <div class="field">
            <label for="priority">Priority</label>
            <select class="input" name="priority" id="priority">
                <option value=""></option>
                <option value="1">Very low priority</option>
                <option value="2">Low priority</option>
                <option value="3">Neutral priority</option>
                <option value="4">High priority</option>
                <option value="5">Very high priority</option>
            </select>
        </div>

        <input type="submit" value="Create Item" class="btn is-primary" >


    </form>
@endsection