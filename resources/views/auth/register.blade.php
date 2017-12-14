@extends('layouts.app')

@section('content')

    <div class="row" style="text-align: center;">

        <div class="col">

            <h1>Create a HackerPair Account</h1>

            <p>
                Create a HackerPair account by authenticating your identity using Github. Alternatively,
                you can use the below form to create a new account.
            </p>

            <a href="/auth/github" class="btn btn-lg btn-info" style="background-color: #000000">
                <span class="fa fa-github"></span> Login with GitHub
            </a>

        </div>

    </div>

    <div class="row">
        <div class="col">
            <div style="text-align: center; padding-top: 15px; padding-bottom: 5px;">
                <h2>OR</h2>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col">

            {!! Form::open(['route' => 'register', 'class' => 'form']) !!}

            {{ csrf_field() }}

            <div class="form-group">

                    <label class="control-label" for="first_name">First Name<sup>*</sup></label>
                    {!! Form::text('first_name', old('first_name'), ['class' => 'form-control', 'placeholder' => 'Clifford']) !!}
                    @if ($errors->has('first_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                    @endif

            </div>

            <div class="form-group">

                    <label class="control-label" for="last_name">Last Name<sup>*</sup></label>
                    {!! Form::text('last_name', old('last_name'), ['class' => 'form-control', 'placeholder' => 'Stoll']) !!}
                    @if ($errors->has('last_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                    @endif

            </div>

            <div class="form-group">
                    {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}<br/>
                    {!! Form::text('title', old('title'), ['placeholder' => 'Laravel Developer, UX Expert, etc.', 'class' => 'form-control']) !!}
                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>

            <div class="form-group">
                    <label class="control-label" for="zip">Zip Code<sup>*</sup></label>
                    {!! Form::text('zip', old('zip'), ['class' => 'form-control']) !!}
                    @if ($errors->has('zip'))
                        <span class="help-block">
                            <strong>{{ $errors->first('zip') }}</strong>
                        </span>
                    @endif
                </div>

            <div class="form-group">
                    <label class="control-label" for="zip">Time Zone<sup>*</sup></label>
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
                    @if ($errors->has('zip'))
                        <span class="help-block">
                            <strong>{{ $errors->first('timezone') }}</strong>
                        </span>
                    @endif
                </div>

            <div class="form-group">
                    <label class="control-label" for="email">E-mail Address<sup>*</sup></label>
                    {!! Form::text('email', old('email'), ['placeholder' => 'example@hackerpair.com', 'class' => 'form-control']) !!}
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

            <div class="form-group">
                    <label class="control-label" for="password">Password<sup>*</sup></label>
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

            <div class="form-group">
                    <label class="control-label" for="password_confirmation">Confirm Password<sup>*</sup></label>
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>

            <div class="form-group">
                    <br/>
                    {!! Form::submit('Create Your Account', ['class' => 'form-control btn btn-primary']) !!}
                    <br />
                </div>
        </div>

            {!! Form::close() !!}

    </div>

@endsection

