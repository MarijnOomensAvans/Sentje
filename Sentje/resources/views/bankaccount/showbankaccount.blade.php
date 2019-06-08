@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $bankaccount->name }}</div>

                    <div class="card-body">
                        <h4>{{ __('content.accbalance') }} {{ $bankaccount->balance }}</h4>
                        <h1>{{ __('content.transactions') }}</h1>
                        {{-- Transaction table --}}
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">{{ __('content.reciever') }}</th>
                                <th scope="col">{{ __('content.amount') }}</th>
                                <th scope="col">{{ __('content.type') }}</th>
                                <th scope="col">{{ __('content.status') }}</th>
                                <th><a href="/transactions/create/{{ $bankaccount->id }}"><button type="button" class="btn btn-success"><i class="fa fa-fw fa-plus mr-1"></i> Create payment request</button></a></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bankaccount->transactions as $transaction)
                                <div>
                                    <td>{{ Auth::user()->name }}</td>
                                    <td>{{ $transaction->amount }}</td>
                                    <td>{{ $transaction->type }}</td>
                                    <td>{{ $transaction->status }}</td>
                                    <td>
                                        <div class="input-group mb-3">
                                            <a href="/transactions/{{ $transaction->id }}"><button class="btn-primary btn"><i class="fa fa-eye"></i> View</button></a>
                                            @if($transaction->type == 'Request' && $transaction->status != 'Paid')
                                            <button class="btn-secondary btn"><i class="fa fa-eye"></i> Edit</button>
                                            @endif
                                            @if($transaction->status != 'Paid')
                                            <button class="btn-danger btn"><i class="fa fa-times"></i> Delete</button>
                                            @endif
                                        </div>
                                </div>
                            </tbody>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
