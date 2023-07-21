<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">{{ Auth::user()->name ?? 'Динозаврик'}} <i class="fas fa-dragon"></i></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link  @if(request()->routeIs('news.index')) active @endif"
                       href="{{route('news.index')}}">{{__('News')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('order.index')) active @endif"
                       href="{{route('order.index')}}">{{__('Order')}}</a>
                </li>

                @if (!Auth::user())
                <li class="nav-item">
                    <a class="btn btn-secondary" href="{{route('login')}}">{{__('Enter')}}</a>
                    <a class="btn btn-outline-secondary" href="{{route('register')}}">{{__('Register')}}</a>
                </li>
                @endif

{{--                @if (Auth::user())--}}
                @can('logged-in')
                <li class="nav-item dropdown">
                    <a class="avatar-link nav-link dropdown-toggle" href="#" id="navbarDropdownBlog"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{asset('assets/dino/images/avartar-dinosaur-100.png')}}"
                             class="rounded-circle bg-white avatar-img" alt="Аватар">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
{{--                        @if(Auth::user() && Auth::user()->admin)--}}
                        @can('is-admin')
                        <a class="dropdown-item" href="{{route('admin.index')}}">{{__('Admin')}}</a>
                        @endcan
{{--                        @endif--}}
                        <a class="dropdown-item" href="{{route('account.index')}}">{{__('Account')}}</a>
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="dropdown-item" type="submit">
                                {{__('Exit')}}
                            </button>
                        </form>
                    </div>
                </li>
                @endcan
{{--                @endif--}}
            </ul>
        </div>
    </div>
</nav>


