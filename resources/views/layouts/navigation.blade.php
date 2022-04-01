<nav>
    <!-- Primary Navigation Menu -->
    <ul>
        <li>
            <a href="{{ route('home') }}">
                {{ __('retour au site') }}
            </a>
            |
            <a href="{{ route('dashboard') }}">
                {{ __('dashboard') }}
            </a>
            |
            <a href="{{ route('posts.create') }}">
                {{ __('post.create') }}
            </a>
            |
            <a href="{{ route('dashboard.posts.index') }}">
                {{ __('posts.index') }}
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
