@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ \Illuminate\Support\Facades\Crypt::decrypt($bankaccount->name) }}</div>

                    <div class="card-body">
                        <h4>{{ __('content.accbalance') }} {{ $bankaccount->balance() }} €</h4>
                        <p>{{ __('content.donationlink') }}: <a href="{{ url('/donate/' . $bankaccount->id) }}">{{ url('/donate/' . $bankaccount->id) }}</a> </p>
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
                                <tr>
                                <div>
                                    <td>{{ \Illuminate\Support\Facades\Crypt::decrypt(Auth::user()->name) }}</td>
                                    <td>{{ $transaction->amount }} @if($transaction->currency == 'EUR')€@else₽@endif</td>
                                    <td>{{ $transaction->type }}</td>
                                    <td>{{ $transaction->status }}</td>
                                    <td>
                                        <div class="input-group mb-3">
                                            <a href="/transactions/{{ $transaction->id }}"><button class="btn-primary btn"><i class="fa fa-eye"></i> View</button></a>
                                            @if($transaction->type == 'Request' && $transaction->status != 'Paid')
                                            <button class="btn-secondary btn"><i class="fa fa-eye"></i> Edit</button>
                                            @endif
                                            @if($transaction->status != 'Paid')
                                                <form method="POST" action="/transactions/{{ $transaction->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                            <button type="submit" class="btn-danger btn"><i class="fa fa-times"></i> Delete</button>
                                                </form>
                                            @endif
                                        </div>
                                </div>
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
