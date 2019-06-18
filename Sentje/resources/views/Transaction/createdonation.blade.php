@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('content.donation') }}</div>
                    <div class="card-body">
                        <form method="POST" action="/transactions">
                            @csrf
                            <input type="hidden" name="type" value="Donation">
                            <input type="hidden" name="status" value="Unpaid">
                            <input type="hidden" name="bank_account_id" value="{{ $accountid }}">
                            <div class="form-group">
                                <label>{{ __('content.amount') }}</label>
                                <input type="number" min="0.01" max="4000" step="0.01" class="form-control" aria-describedby="amountHelp" placeholder="{{ __('content.amount') }}" name="amount" required>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label>{{ __('content.wcurrency') }}</label>
                                <select class="form-control " name="currency">
                                    <option value="EUR" selected>Euro : €</option>
                                    <option value="RUB">Ruble : ₽</option>
                                </select>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label>{{ __('content.description') }}</label>
                                <textarea class="form-control" name="description" rows="4" required></textarea>
                            </div>
                            <hr>
                            @if($errors->any())
                                <div>
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li class="text-danger">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <hr>
                            @endif
                            <div class="form-group row mb-0">
                                <div class="col-12 text-left">
                                    <button type="submit" class="btn btn-success">{{ __('content.createdon') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection