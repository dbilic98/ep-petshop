<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('home') }}">PetStore</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('dogs')}}">PAS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('cats')}}">MAČKA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">MALE ŽIVOTINJE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">BLOG</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('cart') }}">KOŠARICA</a>
                </li>
            </ul>
        </div>
    </div>


{{--            <li class="nav-item2">--}}
{{--                <a class="nav-item"  id="navbarDropdown" role="button" aria-expanded="false">--}}
{{--                    {{ Auth::user()->name }}--}}
{{--                </a>--}}
{{--                    <li>--}}
{{--                        <a class="nav-item" href="{{ route('logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">--}}
{{--                            {{ __('Logout') }}--}}
{{--                        </a>--}}
{{--                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                            @csrf--}}
{{--                        </form>--}}
{{--                    </li>--}}
{{--            </li>--}}
    <div class="btn-group dropstart">
        <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
            <span class="small text-align mt-2 mr-2"> {{auth()->user()->name}}</span>
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href={{route("orderDetails")}}>Moje narudžbe</a></li>
{{--            <li><a class="dropdown-item" href=>Moj profil</a></li>--}}
{{--            <form method="POST">--}}
{{--                @csrf--}}
            <li>
                <a class="nav-item" href="{{ route('logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>
