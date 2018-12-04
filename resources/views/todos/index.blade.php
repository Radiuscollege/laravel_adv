@extends('layouts.base')

@section('content')
    <section class="balloon container with-title" style="padding: 45px">
        <h2 class="title">Todo items</h2>
        <div class="messages">
            @foreach($todos as $item)
                <div class="message -left">
                    <i class="bcrikko" style="top: 50px"></i>
                    <div class="balloon from-left">
                        <p>{{ $item->title }}</p>
                    </div>
                </div>
            @endforeach
        </div>

    </section>

    <a href="{{route('todos.create')}}" class="btn is-primary">Create</a>
@endsection