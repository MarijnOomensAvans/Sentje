@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if($success)
                    <h1>{{ __('content.thanksdon') }}<br/>{{ __('content.recieved') }}</h1>
                @elseif($pending)
                    <h1>{{ __('content.thanksdon') }}<br/>{{ __('content.processed') }}</h1>
                @else
                    <h1>{{ __('content.thanksdon') }}<br/>{{ __('content.error') }}</h1>
                @endif
            </div>
        </div>
    </div>
@endsection

