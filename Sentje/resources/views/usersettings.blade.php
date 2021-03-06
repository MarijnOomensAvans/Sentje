@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('settings.settings') }}</div>
                    <div class="card-body">
                        <form method="POST" action="/settings">
                            @csrf
                        <div class="form-group row mb-4">
                            <label class="col-sm-4 col-lg-3 col-form-label">{{ __('settings.language') }}</label>
                            <div class="col-sm-8 col-lg-9">
                                <select class="form-control " name="language">
                                    <option value="en" {{ (app()->getLocale() == 'en') ? 'selected' : '' }}>{{ __('settings.english') }}</option>
                                    <option value="ru" {{ (app()->getLocale() == 'ru') ? 'selected' : '' }}>{{ __('settings.russian') }}</option>
                                </select>

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-12 text-left">
                                <a href="{{ route('home') }}" class="btn btn-warning">{{ __('settings.cancel') }}</a>
                                <button type="submit" class="btn btn-primary">{{ __('settings.save') }}</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
@endsection
