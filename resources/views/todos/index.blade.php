@extends('layouts.base')

@section('content')
    <section class="balloon container with-title" style="padding: 45px">
        <h2 class="title">Todo items</h2>

        @include('partials.notifications')

        <div class="messages">
            @foreach($todos as $item)
                <div class="message -left">
                    <a href="{{ route('todos.show', $item->id) }}">
                        <i class="bcrikko" style="top: 50px"></i>
                        <div class="balloon from-left">
                            <p>{{ $item->title }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

    </section>

    <a href="{{route('todos.create')}}" class="btn is-primary">Create</a>
@endsection