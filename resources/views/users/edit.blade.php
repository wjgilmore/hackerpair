@extends('layouts.app')

@section('jumbotron')
    <div class="jumbotron">
        <div class="container" style="padding-bottom: 35px;">
            <h1>Update Your Account Profile</h1>
            <h2>Tell fellow HackerPair members all about you!</h2>
        </div>
    </div>
@endsection

@section('content')

    <div class="row">

        <div class="col-md-12">

            {!! Form::model($user, [
                'route'  => ['users.update', $user->id],
                'class'  => 'form',
                'method' => 'put'
                ]
            ) !!}

            <h4>General Info</h4>

            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('email', 'E-mail Address') !!}
                {!! Form::text('email', null, ['class' => 'form-control']) !!}
            </div>

            <hr />

            <h4>Profile</h4>

            <div class="form-group">
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('bio', 'Bio') !!}
                {!! Form::textarea('bio', null, ['class' => 'form-control', 'rows' => '3', 'placeholder' => 'Say a little something about yourself']) !!}
            </div>

            <hr />

            <h4>Location</h4>

            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('city', 'City') !!}
                        {!! Form::text('city', null, ['class' => 'form-control', 'placeholder' => 'Add your city for localized results']) !!}
                    </div>
                </div>

                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="title">State</label>
                        {!! Form::select('state_id',
                         App\State::pluck('name', 'id'),
                         null,
                         [
                             'id'          => 'state_id',
                             'class'       => 'form-control',
                         ]
                         ) !!}
                    </div>
                </div>

                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('zip', 'Zip Code') !!}
                        {!! Form::text('zip', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('timezone', 'Time Zone') !!}
                        {!! Form::select('timezone',
                            [
                                'America/New_York'    => 'Eastern Time',
                                'America/Chicago'     => 'Central Time',
                                'America/Denver'      => 'Mountain Time',
                                'America/Phoenix'     => 'Mountain Time (no DST)',
                                'America/Los_Angeles' => 'Pacific Time',
                                'America/Anchorage'   => 'Alaska Time',
                                'America/Adak'        => 'Hawaii-Aleutian (no DST)',
                                'Pacific/Honolulu'    => 'Hawaii-Aleutian Time (no DST)'
                            ],
                            null, ['class' => 'form-control input-lg']); !!}
                    </div>
                </div>

            </div>

            <hr />

            <h4>Social</h4>

            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                        {!! Form::label('handle_twitter', 'Twitter Handle') !!}
                        {!! Form::text('handle_twitter', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                        {!! Form::label('handle_github', 'GitHub Handle') !!}
                        {!! Form::text('handle_github', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            {!! Form::submit('Update Profile', ['class' => 'submit btn btn-info']) !!}

            {!! Form::close() !!}
            <br />
        </div>

    </div>

@endsection
