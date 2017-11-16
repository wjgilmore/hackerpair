@extends('layouts.app')

@section('jumbotron')
    <div class="jumbotron">
        <div class="container">
            <h1>About HackerPair</h1>
            <h2>All about the drones, bots, and AIs behind this site</h2>
        </div>
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col">

            <p>
                HackerPair is the companion project for the latest edition of <a href="http://wjgilmore.com">W. Jason Gilmore's</a> bestselling book,
                <a href="http://easylaravelbook.com">Easy Laravel 5</a>. The site embodies many features Laravel
                developers would likely want to integrate into their own web applications, including user authentication,
                complex models and database relationships, e-mail delivery, sophisticated views and layouts, and
                Vue.js-based interface enhancement.
            </p>

        </div>
    </div>

@endsection

