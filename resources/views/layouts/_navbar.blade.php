<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container">
        <a class="logo" href="{{ url('/') }}">
            HackerPair
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    {{ link_to_route('locations.index', 'Locations', [], ['class' => 'nav-link']) }}
                </li>
                <li class="nav-item">
                    {{ link_to_route('events.index', 'Events', [], ['class' => 'nav-link']) }}
                </li>
                <li class="nav-item">
                    {{ link_to_route('languages.index', 'Languages', [], ['class' => 'nav-link']) }}
                </li>
                <li class="nav-item">
                    {{ link_to_route('maps.index', 'Map', [], ['class' => 'nav-link']) }}
                </li>
                <li class="nav-item">
                    {{ link_to_route('about.index', 'About', [], ['class' => 'nav-link']) }}
                </li>
                <li class="nav-item">
                    {{ link_to_route('contact.index', 'Contact Us', [], ['class' => 'nav-link']) }}
                </li>
                <li class="nav-item">
                    {{ link_to_route('about.book', 'About the Book', [], ['class' => 'nav-link']) }}
                </li>
            </ul>
            <ul class="navbar-nav">
                @auth
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a href="{{ route('logout') }}" class="dropdown-item"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                    @else
                        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                        <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                        @endauth
            </ul>
            </ul>
        </div>
    </div>
</nav>
