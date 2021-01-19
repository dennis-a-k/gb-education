<menu class="menu">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a href="{{ route('news') }}">{{ __('lang.news') }}</a>
  <a href="{{ route('about') }}">{{ __('lang.about-us') }}</a>
  @guest
    @if (Route::has('login'))
      <a href="{{ route('login') }}">{{ __('lang.login') }}</a>
    @endif

    @if (Route::has('register'))
      <a href="{{ route('register') }}">{{ __('lang.register') }}</a>
    @endif
  @else
    <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
      {{ Auth::user()->name }}
    </a>
    <div class="dropdown-menu dropdown-menu-right p-0" aria-labelledby="navbarDropdown">
    <ul class="list-unstyled m-0">
      <li class="p-2">
        <a href="{{ route('admin::news') }}" class="m-0">{{ __('lang.edit-news') }}</a>
      </li>
      <li class="p-2">
        <a href="{{ route('profile::update') }}" class="m-0">{{ __('lang.users') }}</a>
      </li>
      <li class="p-2">
        <a href="{{ route('logout') }}" class="m-0" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          {{ __('lang.logout') }}
        </a>
      </li>
    </ul>
      
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>
    </div>
  @endguest
</menu>