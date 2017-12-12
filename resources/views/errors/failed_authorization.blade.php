@extends('layouts.app')

@section('jumbotron')
    <div class="jumbotron">
        <div class="container">
            <h1>We Seem to Have Located an Intruder</h1>
            <h2>Send in the attack drones.</h2>
        </div>
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col">

            <p>
                Our technology crime division has detected an unauthorized entry. One of our cyborgs
                will be showing up at your house shortly for an, ahem, "interview".
            </p>

            <p>
                Have we accused an innocent user? {{ link_to_route('contact.create', 'Send us a message.') }}
            </p>

        </div>
    </div>

@endsection

