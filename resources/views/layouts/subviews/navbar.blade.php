<nav class="bg-white border-gray-200 py-4">
    <div class="flex justify-between max-w-screen px-4 mx-2">
        <div id="logo">
            <a href="/">
                <img src="{{ asset("images/JUTHA_Logo.png") }}" class="h-6 mr-3 sm:h-10" alt="Logo">
            </a>
        </div>
        <div class="flex items-center" id="acc">
            @if( Auth::check() )
                <div class="mr-4">
                    {{ Auth::user()->name }}
                </div>
                <div>
                    <form action="{{ route('logout') }}" method='POST'>
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </div>
            @else
                <div class="mr-4">
                    <a href="{{ route('login') }}">
                        Login
                    </a>
                </div>
            @endif
        </div>
{{--   Center Item  -  Unuse lol ------------------------------------------------------------------------------------------------------------------ --}}
{{--        <div class="items-center justify-between w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">--}}
{{--            <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">--}}
{{--                <li>--}}
{{--                    <a href="{{ url('/') }}"--}}
{{--                       class="nav-menu {{ request()->is('/') ? 'active' : '' }}">--}}
{{--                        Welcome--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="{{ route('login') }}"--}}
{{--                       class="nav-menu {{ Route::currentRouteName() === 'songs.index' ? 'active' : '' }}">--}}
{{--                        Song List--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="{{ route('login') }}"--}}
{{--                       class="nav-menu {{ Route::currentRouteName() === 'artists.index' ? 'active' : '' }}">--}}
{{--                        Artists List--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="{{ route('login') }}"--}}
{{--                       class="nav-menu {{ Route::currentRouteName() === 'about.index' ? 'active' : '' }}">--}}
{{--                        About--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="{{ route('login') }}"--}}
{{--                       class="nav-menu {{ Route::currentRouteName() === 'about.index' ? 'active' : '' }}">--}}
{{--                        My Playlist--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
</nav>
