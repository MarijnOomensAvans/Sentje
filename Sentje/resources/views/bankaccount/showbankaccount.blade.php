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
                        {{-- Transactions table --}}
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                                {{-- Create row for each transaction --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
