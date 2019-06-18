@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="/bankaccounts">
            @csrf
            <div class="form-group">
                <label for="name">{{ __('content.name') }}</label>
                <input type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="{{ __('content.name') }}" name="name" required>
            </div>

            @if($errors->any())
                <div>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <button type="submit" class="btn btn-primary">{{ __('content.create') }}</button>
        </form>
    </div>
@endsection