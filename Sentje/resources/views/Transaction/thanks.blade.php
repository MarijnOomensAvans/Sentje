@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if($success)
                    <h1>Hartelijk dank dat u gekozen hebt om VEADS te helpen met uw donatie!<br/>VEADS heeft uw donatie in goede orde ontvangen.</h1>
                @elseif($pending)
                    <h1>Hartelijk dank dat u gekozen hebt om VEADS te helpen met uw donatie!<br/>Uw donatie wordt momenteel verwerkt.</h1>
                @else
                    <h1>Hartelijk dank dat u gekozen hebt om VEADS te helpen met uw donatie!<br/>Er is een fout opgetreden tijdens het verwerken van uw donatie. Probeer het later nog een keer.</h1>
                @endif
            </div>
        </div>
    </div>
@endsection

