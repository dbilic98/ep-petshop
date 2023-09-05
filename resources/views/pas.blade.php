@extends('layouts.nav3')

@section('content')
    <div class="container">
        <div class="btn">
            <button type="button" class="button1" onclick="window.location='{{ route("p_hrana") }}'">HRANA</button>
            <button type="button" class="button2" onclick="window.location='{{ route("p_odjeca") }}'">ODJEĆA</button>
            <button type="button" class="button3" onclick="window.location='{{ route("p_igracke") }}'">IGRAČKE</button>
        </div>
    </div>
@endsection
