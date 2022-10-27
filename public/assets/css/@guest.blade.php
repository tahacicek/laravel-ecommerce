@guest
@if (Route::has('login'))
    <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
    </li>
@endif

@if (Route::has('register'))
    <li class="nav-item">
        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
    </li>
@endif
@else

<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
    data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa fa-user"></i>                                    {{ Auth::user()->name }}

</a>
<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
    <li><a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a></li>
    <li><a class="dropdown-item" href="#"><i class="fa fa-list"></i> My Orders</a>
    </li>
    <li><a class="dropdown-item" href="#"><i class="fa fa-heart"></i> My Wishlist</a>
    </li>
    <li><a class="dropdown-item" href="#"><i class="fa fa-shopping-cart"></i> My
            Cart</a></li>
    <li>
        <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out"></i>
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST"
            class="d-none">
            @csrf
        </form>
    </li>
</ul>
</li>
@endguest
