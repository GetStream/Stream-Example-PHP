<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">GetStream Example</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li @if ($location == 'trending') class="active" @endif>
                    <a href="{{ URL::route('trending') }}">Trending</a>
                </li>
                <li @if ($location == 'feed') class="active" @endif>
                    <a href="{{ URL::route('feed') }}"><i class="glyphicon glyphicon-th"></i> Flat Feed</a>
                </li>
                <li @if ($location == 'aggregated_feed') class="active" @endif>
                    <a href="{{ URL::route('aggregated_feed') }}"><i class="glyphicon glyphicon-th-list"></i> Aggregated Feed</a>
                </li>
                <li @if ($location == 'people') class="active" @endif>
                    <a href="{{ URL::route('people') }}"><i class="glyphicon glyphicon-user"></i> People</a>
                </li>
                @if (Auth::check())
                <li class="dropdown @if ($location == 'profile') active @endif">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon"></i>  {{{ Auth::user()->username }}}<b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ URL::route('profile', Auth::user()->username) }}">My Profile</a></li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>