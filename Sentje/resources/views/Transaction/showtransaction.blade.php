@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('content.transaction') }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3"><b>{{ __('content.reciever') }}: </b></div>
                            <div class="col-lg-9">{{ $transaction->name }}</div>
                        </div>
                        <hr>
                        @if(!empty($transaction->email))
                        <div class="row">
                            <div class="col-lg-3"><b>{{ __('content.email') }}: </b></div>
                            <div class="col-lg-9">{{ $transaction->email }}</div>
                        </div>
                        <hr>
                        @endif
                        <div class="row">
                            <div class="col-lg-3"><b>{{ __('content.amount') }}: </b></div>
                            <div class="col-lg-9">{{ $transaction->amount }} @if($transaction->currency == 'EUR')€@else₽@endif</div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-3"><b>{{ __('content.wcurrency') }}: </b></div>
                            <div class="col-lg-9">{{ $transaction->currency }}</div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-3"><b>{{ __('content.description') }}: </b></div>
                            <div class="col-lg-9">{{ $transaction->description }}</div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-3"><b>{{ __('content.type') }}: </b></div>
                            <div class="col-lg-9">{{ $transaction->type }}</div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-3"><b>{{ __('content.status') }}: </b></div>
                            <div class="col-lg-9">{{ $transaction->status }}</div>
                        </div>
                        @if($transaction->getPaymentAttribute()->isPaid())
                        <hr>
                        <div class="row">
                            <div class="col-lg-3"><b>{{ __('content.paidat') }}: </b></div>
                            <div class="col-lg-9">{{ $transaction->paid_at() }}</div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
