@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('content.transaction') }}</div>
                    <div class="card-body">
                    <form method="POST" action="/transactions">
                        @csrf
                        <input type="hidden" name="type" value="Transaction">
                        <input type="hidden" name="status" value="Unpaid">
                        <input type="hidden" name="bank_account_id" value="{{ $accountid }}">
                        <div class="form-group">
                            <label>{{ __('content.Recipient') }}</label>
                            <input type="text" class="form-control" aria-describedby="nameHelp" placeholder="{{ __('content.Recipient') }}" name="name" required>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>{{ __('content.recipientmail') }}</label>
                            <input type="text" class="form-control" aria-describedby="nameHelp" placeholder="{{ __('content.recipientmail') }}" name="email" required>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>{{ __('content.amount') }}</label>
                            <input type="number" min="0.01" step="0.01" class="form-control" aria-describedby="amountHelp" placeholder="{{ __('content.amount') }}" name="amount" required>
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
                            <textarea class="form-control " name="description" rows="4"></textarea>
                        </div>
                        <hr>
                        <div class="form-group row mb-0">
                            <div class="col-12 text-left">
                                <button type="submit" class="btn btn-success">{{ __('content.create') }}</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

