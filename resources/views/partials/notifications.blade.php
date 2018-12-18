@if (session('success'))
    <div class="input is-success">
        {{ session('success') }}
    </div>
@endif

@if (session('warning'))
    <div class="input is-warning">
        {{ session('warning') }}
    </div>
@endif

@if ( !empty($errors->all()) )
    <ul>
    @foreach($errors->all() as $error)
        <li class="input is-error">{{ $error }}</li>
    @endforeach
    </ul>
@endif