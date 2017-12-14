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

        <div class="col-md-3 col-sm-12">
            <div class="card" style="border: none;">
                <div class="card-body">
                    <p class="card-text">
                        <i class="fa fa-github" aria-hidden="true"></i>
                        <a href="http://github.com/wjgilmore/hackerpair">HackerPair Source Code</a>
                    </p>
                </div>
            </div>

            <div class="card" style="border: none;">

                <div class="card-body">
                    <p class="card-text" style="text-align: center;">
                        <img src="{{ asset('img/book-large-web.jpg') }}" class="img-fluid" style="border: 1px solid black;" />
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-9 col-sm-12">

            <p>
                HackerPair is the companion project to the latest edition of <a href="http://wjgilmore.com">W. Jason Gilmore's</a> bestselling book,
                <a href="http://easylaravelbook.com">Easy Laravel 5</a>. The site embodies many features Laravel
                developers would likely want to integrate into their own web applications, including user authentication,
                complex models and database relationships, e-mail delivery, sophisticated views and layouts, and
                Vue.js-based interface enhancement. I'll highlight a few other key features here:
            </p>

            <ul>
                <li>
                    <b>Comprehensive Database Seeding Examples</b>: Many beginning developers tend to skip over the generation of
            real-world data for the development environment. HackerPair includes extensive data generation scripts
            (known as seeds) for users, events, categories, and locations.
                </li>
                <li>
                    <b>Form Integration and Validation</b>: HackerPair uses the powerful LaravelCollective/HTML package
            for forms generation, and relies on formalized Laravel procedures for input validation including use of the
            native Laravel validators and form requests.
                </li>
                <li>
                    <b>Extensive Model Relationships</b>: HackerPair offers numerous examples of model relationships by including
            features such as event creation (events are owned by users), event favorites (users can favorite many
            events), event locations (events belong to states, states have many events), and so on.
                </li>
                <li>
                    <b>User Authentication and Profile Management</b>: Laravel offers great off-the-shelf support for user
            registration and login, however developers will quickly outgrow the defaults. HackerPair extends the
            registration form to include several additional fields, extensively modifies the default registration and
            login view formatting, and adds account profile management.
                </li>
                <li>
                    <b>Social Login</b>: In addition to standard user registration and authentication, users can instead opt to
            login using a third-party service such as GitHub and Twitter.
                </li>
                <li>
                    <b>Nested Routes</b>: As you application grows in complexity, you'll want to make sure the routes
                    are defined using the most intuitive approach. This often means taking advantage of <i>nested routes</i>.
                    The HackerPair source code and book will show you how to integrate these often confusing routes into
                    your own application.
                </li>
                <li>
                    <b>Route Model Binding</b>: The app takes advantage of route model binding whenever practical,
                    eliminating a great deal of otherwise required boilerplate code.
                </li>
                <li>
                    <b>Vue.js Features</b>: Vue.js is Laravel's de facto JavaScript library. HackerPair includes a number of cool
            Vue.js features, including AJAX-driven event favoriting, Google Maps integration, an event attendance widget, and notifications.
                </li>
                <li>
                    <b>Bootstrap 4 Integration</b>: Although Bootstrap 4 is still in beta at the time of this writing, I wanted
            to give it a spin and am glad I did. Although I will make clear I'm not a CSS nor design guru, and you'll
            find some of my styling to be repulsive. At any rate, in the book you'll also learn how to
            integrate Bootstrap 3, Bootstrap 4, and the new Tailwind CSS frameworks.
                </li>
                <li>
                    <b>Extensive Automated Testing</b>: One of my favorite Laravel features is the practically push button
            automated test integration. The HackerPair project includes extensive testing of numerous aspects of the
            code, including unit tests, model tests, and integration tests using Laravel Dusk.
                </li>
                <li>
                    <b>A REST API (forthcoming)</b>: We want to give developers the chance to build their own cool HackerPair applications, and
            so have exposed a REST API which allows information about events to be retrieved for display in a variety of
            formats.
                </li>
            </ul>
                
            <p>
                Best of all, all interested Laravel developers are provided with free access to the HackerPair GitHub repository.
                Head on over to <a href="http://github.com/wjgilmore/hackerpair">GitHub</a> to download the latest release.
            </p>

        </div>

    </div>

@endsection

