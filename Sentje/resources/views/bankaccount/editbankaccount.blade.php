@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="/bankaccounts/{{ $bankaccount->id }}">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Name" name="name" value="{{ $bankaccount->name }}" required>
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

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection