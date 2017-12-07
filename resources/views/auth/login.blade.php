@extends('layouts.empty')

@section('content')

    <div class="row">
        <div class="col-md-8 offset-md-2" style="text-align: center; padding-top: 30px;">
            <h1>HackerPair Login</h1>
        </div>
    </div>

    <div class="row h-100">
        <div class="col-md-6 offset-md-3 my-auto" style="padding-top: 25px">

            <div style="text-align: center; padding-bottom: 10px;">
                <a href="/auth/twitter" class="btn btn-lg btn-info btn-block" style="background-color: #1A97F0">
                    <span class="fa fa-twitter"></span> Login with Twitter
                </a>
                <br />
                <a href="/auth/github" class="btn btn-lg btn-info btn-block" style="background-color: #000000">
                    <span class="fa fa-github"></span> Login with GitHub
                </a>
                <br />
                <h3>or</h3>
            </div>

            <form class="form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" style="padding: 0 10px 0 10px">
                    <input id="email" type="email" class="form-control input-lg" name="email" placeholder="E-mail Address" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}" style="padding: 0 10px 0 10px">
                    <input id="password" type="password" class="form-control input-lg" name="password" placeholder="Password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group" style="padding: 0 10px 0 10px">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                        </label>
                    </div>
                </div>

                <div class="form-group" style="text-align: center; padding: 0 10px 0 10px">
                    <button type="submit" class="btn btn-primary btn-lg" style="width: 100%;">Login</button>
                    <br /><br />
                    <a href="{{ route('password.request') }}">Forgot Your Password?</a>
                    &middot;
                    <a href="{{ route('register') }}">Create an Account</a>
                </div>
            </form>
        </div>
    </div>
@endsection

