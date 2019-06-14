@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('content.overview') }}</div>
                <div class="card-body">
                    <h1>{{ __('content.accounts') }}</h1>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">{{ __('account.name') }}</th>
                            <th scope="col">{{ __('content.balance') }}</th>
                            <th scope="col"><a href="{{ url('bankaccounts/create') }}"><button type="button" class="btn btn-success"><i class="fa fa-fw fa-plus mr-1"></i>{{ __('content.createacc') }}</button></a></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(Auth::user()->bankAccounts as $account)
                            <tr>
                                <td><a href="bankaccounts/{{ $account->id }}">{{ $account->name }}</a></td>
                                <td>{{ $account->balance() }} {{ __('content.currency') }}</td>
                                <td>
                                    <div class="input-group mb-3">
                                    <a href="/bankaccounts/{{ $account->id }}/edit"><button type="button" class="btn btn-primary"><i class="fa fa-pencil-alt"></i> {{ __('content.edit') }}</button></a> <form method="POST" action="/bankaccounts/{{ $account->id }}" style="width: 30%;" class="form-inline">@csrf @method('DELETE')<button type="submit" class="btn btn-danger"><i class="fa fa-times"></i> {{ __('content.delete') }}</button></form>
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
