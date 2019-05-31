@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Overview</div>

                <div class="card-body">
                    <h1>Your accounts:</h1>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Balance</th>
                            <th scope="col"><a href="{{ url('bankaccounts/create') }}"><button type="button" class="btn btn-success"><i class="fa fa-fw fa-plus mr-1"></i>Create account</button></a></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(Auth::user()->bankAccounts as $account)
                            <tr>
                                <td>{{ $account->name }}</td>
                                <td>{{ $account->balance }}</td>
                                <td>
                                    <div class="input-group mb-3">
                                    <a href="/bankaccounts/{{ $account->id }}/edit"><button type="button" class="btn btn-primary"><i class="fa fa-pencil-alt"></i> Edit</button></a> <form method="POST" action="/bankaccounts/{{ $account->id }}" style="width: 30%;" class="form-inline">@csrf @method('DELETE')<button type="submit" class="btn btn-danger"><i class="fa fa-pencil-alt"></i> Delete</button></form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
