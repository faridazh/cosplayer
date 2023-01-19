<header class="sticky" x-data="{ menuOpen: false }">
    <div class="header">
        <div class="mobile-menu-btn">
            <button class="btn btn-tertiary" @click="menuOpen = !menuOpen" @click.outside="menuOpen = false">
                <i class="fas fa-bars" x-show="!menuOpen"></i>
                <i class="fas fa-bars-staggered" x-show="menuOpen"></i>
            </button>
        </div>
        <div class="navbar">
            <div class="text-xl font-medium tracking-wide">
                <a href="{{ route('homepage') }}">{{ config('app.name', 'Cosplayer.gg') }}</a>
            </div>
            <div class="navbar-links">
                <div>
                    <a href="#"><i class="fas fa-home fa-fw mr-1"></i>Home</a>
                </div>
                <div>
                    <a href="#"><i class="fas fa-mask fa-fw mr-1"></i>Cosplay</a>
                </div>
                <div>
                    <a href="#"><i class="fas fa-calendar fa-fw mr-1"></i>Event</a>
                </div>
                <div>
                    <a href="#"><i class="fas fa-circle-xmark fa-fw mr-1"></i>Scammer</a>
                </div>
                <div x-data="{ dropdownOpen: false }">
                    <a href="#more" @click="dropdownOpen = ! dropdownOpen" @click.outside="dropdownOpen = false"><i class="fas fa-angle-down fa-fw mr-1"></i>More</a>
                    <div class="dropdown origin-top-left" x-show="dropdownOpen" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95">
                        <a href="#"><i class="fab fa-discord fa-fw mr-1"></i>Discord</a>
                    </div>
                </div>
            </div>
        </div>
        @auth
            <div class="relative ml-3" x-data="{ profileOpen: false }">
                <div>
                    <button @click="profileOpen = !profileOpen" @click.outside="profileOpen = false" type="button" class="flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                        <img class="h-8 w-8 rounded-full" src="{{ asset('uploads/avatar/' . auth()->user()->avatar) }}" onerror="this.src='{{ asset('assets/avatar/default_avatar.png') }}'">
                    </button>
                </div>
                <div class="dropdown right-0 w-48 origin-top-right" x-show="profileOpen" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95">
                    <a href="#">Profile</a>
                    <a href="#">Settings</a>
                    @can('access-filament')
                        <a href="{{ config('filament.path') }}">Admin Panel</a>
                    @endcan
                    <a href="#logout" onclick="event.preventDefault(); document.getElementById('logout').submit();">Logout</a>
                </div>
            </div>
        @else
            <div class="space-x-2">
                <a href="{{ route('login') }}" class="btn btn-tertiary">Login</a>
                <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
            </div>
        @endauth
    </div>
    <div class="sm:hidden absolute w-full z-10 bg-white border-t rounded-b-md shadow-lg" id="mobile-menu" x-show="menuOpen" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95">
        <div class="space-y-1 px-2 pt-2 pb-3">
            <a href="#" class="bg-palette-5 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Dashboard</a>
            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Team</a>
            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Projects</a>
            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Calendar</a>
        </div>
    </div>
</header>
