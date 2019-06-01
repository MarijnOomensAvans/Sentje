@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="/bankaccounts">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Name" name="name" required>
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

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection