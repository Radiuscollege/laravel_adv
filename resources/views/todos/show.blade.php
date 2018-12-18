@extends('layouts.base')

@section('content')
    <div class="container">
        @include('partials.notifications')
        <h1>{{ $todo->title }}</h1>

        <h2>Description:</h2>
        <p>{{ $todo->description }}</p>

        <h2>Deadline</h2>
        <p> {{ $todo->deadline  }}</p>

        <a href="{{route('todos.edit', $todo->id)}}" class="btn is-primary">Edit</a>

        <form id="deleteForm" method="post"  action="{{route('todos.destroy', $todo)}}">
            @csrf
            @method('DELETE')
            <input id="delete" type="submit" class="btn is-error" value="delete">
        </form>
    </div>
@endsection