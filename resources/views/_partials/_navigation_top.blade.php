<nav id="topNavigation" class="nav has-shadow">
    <div class="container">
        <div class="nav-left">
            <a class="nav-item" id="logo">
                <strong>{</strong> codeur.co <strong>}</strong>
            </a>
        </div>
        <span class="nav-toggle" id="navigationToggle">
            <span></span>
            <span></span>
            <span></span>
        </span>
        <div class="nav-right nav-menu">
            <a href="https://github.com/naimkhalifa/codeur.co" class="nav-item is-tab">
                <span class="icon">
                    <i class="fa fa-github"></i>
                </span>
            </a>
            @if (Auth::check())
            <a href="{{ route('logout') }}"  class="nav-item is-tab"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                <span class="icon">
                    <i class="fa fa-sign-out"></i>
                </span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            @endif
        </div>
    </div>
</nav>
