@extends('layouts.app')

@section('jumbotron')
    <div class="jumbotron">
        <div class="container">
            <h1>Categories</h1>
            <h2>Events by category</h2>
        </div>
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col">

            <div style="padding: 15px 0px 15px 0px;">
                {!! link_to_route('welcome.index', 'Home') !!} &gt; Events
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Upcoming Events by Category</h4>
                    <p class="card-text">

                        @include('partials._categories_table', ['categories' => $categories])

                    </p>
                </div>
            </div>

        </div>

    </div>

@endsection

