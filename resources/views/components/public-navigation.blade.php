<nav class="public-navbar">
    <!-- Primary Navigation Menu -->
    <ul>
        <li>
            <a href="{{ route('dashboard') }}">
                {{ __('Dashboard') }}
            </a>

            <a href="{{ route('posts.index') }}">
                {{ __('posts') }}
            </a>
        </li>
    </ul>
    @auth()
        <p>
            Welcome {{ Auth::user()->name }}
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
    @endauth

</nav>
