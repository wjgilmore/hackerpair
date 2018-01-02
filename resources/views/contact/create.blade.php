@extends('layouts.app')

@section('jumbotron')
    <div class="jumbotron">
        <div class="container">
            <h1>Contact HackerPair</h1>
            <h2>Your message will be delivered to our clandestine team</h2>
        </div>
    </div>
@endsection

@section('content')

    <div class="row" style="margin-top: 25px;">

        <div class="col-md-4 col-sm-12">

            <div class="card">
                <div class="card-body">
                    <div class="card-title map">
                        <gmap-map
                                :center="{lat: 38.871026, lng: -77.055959}"
                                :zoom="13"
                                :options="{styles: mapStyles, streetViewControl: false, zoomControl: false, mapTypeControl: false}"
                                map-type-id="roadmap"
                                style="width: 100%; height: 300px;"
                        >
                        </gmap-map>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" style="border: none;">
                                <span class="fa fa-building" style="color: #FFC200; padding-right: 5px;" aria-hidden></span>
                                Group 9
                            </li>
                            <li class="list-group-item" style="border: none;">
                                <span class="fa fa-map" style="color: #FFC200; padding-right: 5px;" aria-hidden></span>
                                Classified
                            </li>
                            <li class="list-group-item" style="border: none;">
                                <span class="fa fa-map-signs" style="color: #FFC200; padding-right: 5px;" aria-hidden></span>
                                Classified
                            <li class="list-group-item" style="border: none;">
                                <span class="fa fa-calendar" style="color: #FFC200; padding-right: 5px;" aria-hidden></span>
                                support@hackerpair.com
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-8 col-sm-12">

            <p>
                Send us your questions, comments, and suggestions and someone will be in touch within
                24 hours.
            </p>

            {!! Form::open(['route' => 'contact.store']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Your Name') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'E-mail Address') !!}
                {!! Form::text('email', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('msg', 'Message') !!}
                {!! Form::textarea('msg', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
            </div>

            {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

            {!! Form::close() !!}
            <br />
        </div>

    </div>

@endsection

