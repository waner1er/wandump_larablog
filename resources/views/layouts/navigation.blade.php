<nav>
    <!-- Primary Navigation Menu -->
    <ul>
        <li>
            <a href="{{ route('dashboard') }}">
                {{ __('Dashboard') }}
            </a>
            |
            <a href="{{ route('posts.dashboard.index') }}">
                {{ __('posts') }}
            </a>
            |
            <a href="{{ route('welcome') }}">
                {{ __('retour au site') }}
            </a>
        </li>
    </ul>

    <p>
        Welcome {{ Auth::user()->first_name }}
    </p>

    <!-- Authentication -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Logout') }}
        </a>
    </form>
</nav>
