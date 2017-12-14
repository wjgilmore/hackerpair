@extends('layouts.app')

@section('jumbotron')
    <div class="jumbotron">
        <div class="container">
            <h1>Easy Laravel 5</h1>
            <h2>The latest edition is available in beta format!</h2>
        </div>
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-3">

            <a href="http://www.easylaravelbook.com">
            <img src="{{ asset('img/book-large-web.jpg') }}" class="img-fluid book" />
            </a>

            <p>
                The latest edition of Easy Laravel 5 is available in beta format via
                <a href="http://www.easylaravelbook.com<">EasyLaravelBook.com</a>.
            </p>

            <p>
                <i class="fa fa-github" aria-hidden="true"></i>
                <a href="http://github.com/wjgilmore/hackerpair">HackerPair Source Code</a>
            </p>

        </div>

        <div class="col-9">

            <p>
                <i>Easy Laravel 5</i> is veteran PHP developer and consultant W. Jason Gilmore's bestselling book on the
                popular Laravel framework. First released in early 2015, Easy Laravel 5 has gone on to sell thousands
                of copies to readers around the globe, and thanks to a lean publishing approach, was updated literally
                hundreds of times throughout 2015 and 2016.
            </p>

            <p>
                After a hiatus away from the book while working on several enterprise Laravel projects,
                the author W. Jason Gilmore has been hard at work bringing the book current for Laravel 5.5, and adding
                a great deal of new and revised material.
            </p>

            <p>
                Head over to <a href="http://www.easylaravelbook.com">the book website</a> to learn how to purchase the
                book from Gumroad and Leanpub. The price <b>will increase</b> as new material is added, so purchase now
                and you'll receive free book updates for life!
            </p>

            <h3>About W. Jason Gilmore</h3>

            <p>
                I'm W. Jason Gilmore, a software developer, consultant, and bestselling author.
            I've spent much of the past 17 years helping companies of all sizes build amazing technology solutions.
            Recent projects include an API for one of the world's highest volume robocall blockers, a SaaS for the
            interior design and architecture industries, an intranet application for a major South American avocado
            farm, an e-commerce analytics application for a globally recognized publisher, and a 10,000+ product online
            store for the environmental services industry.
            </p>

            <p>
                I'm the author of eight books, including the bestselling Beginning PHP and MySQL, Fourth Edition,
                <a href="http://easyecommercebook.com/">Easy E-Commerce Using Laravel and Stripe</a> (with co-author
                and <a href="https://laravel-news.com/">Laravel News</a> founder Eric L. Barnes), and
                <a href="http://easyactiverecord.com/">Easy Active Record for Rails Developers</a>.
            </p>

            <p>
                Over the years I've published more than 300 articles within popular publications such as Developer.com,
            JSMag, and Linux Magazine, and instructed hundreds of students in the United States and Europe. I'm also
            cofounder of the wildly popular CodeMash Conference, the largest multi-day
            developer event in the Midwest.
            </p>

            <p>Away from the keyboard, I love playing with my children, thinking about chess, and having fun
            with DIY electronics.</p>

            <p>Please e-mail me with your questions and comments at wj@wjgilmore.com.</p>

        </div>
    </div>

@endsection

