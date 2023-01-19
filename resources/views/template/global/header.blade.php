<header class="sticky" x-data="{ menuOpen: false }">
    <div class="header">
        <div class="sm:hidden">
            <button class="btn btn-tertiary" @click="menuOpen = !menuOpen" @click.outside="menuOpen = false">
                <i class="fas fa-bars" x-show="!menuOpen"></i>
                <i class="fas fa-bars-staggered" x-show="menuOpen"></i>
            </button>
        </div>
        <div class="flex items-center">
            <div class="text-xl font-medium tracking-wide">
                <a href="{{ route('homepage') }}">{{ config('app.name', 'Cosplayer.gg') }}</a>
            </div>
            <div class="hidden sm:flex items-center ml-10 space-x-5 text-gray-900">
                <div><a href="#">Home</a></div>
                <div><a href="#">Home</a></div>
                <div><a href="#">Home</a></div>
                <div><a href="#">Home</a></div>
                <div x-data="{ dropdownOpen: false }">
                    <a href="#" @click="dropdownOpen = ! dropdownOpen" @click.outside="dropdownOpen = false">More</a>
                    <div class="absolute z-10 mt-2 origin-top-left rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" x-show="dropdownOpen" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700">More Link</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700">More Link</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700">More Link</a>
                    </div>
                </div>
            </div>
        </div>
        @auth
            <div class="relative ml-3" x-data="{ profileOpen: false }">
                <div>
                    <button @click="profileOpen = !profileOpen" @click.outside="profileOpen = false" type="button" class="flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                        <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    </button>
                </div>
                <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" x-show="profileOpen" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700">Your Profile</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700">Settings</a>
                    <a href="#logout" class="block px-4 py-2 text-sm text-gray-700" onclick="event.preventDefault(); document.getElementById('logout').submit();">Logout</a>
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
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="#" class="bg-palette-5 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Dashboard</a>
            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Team</a>
            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Projects</a>
            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Calendar</a>
        </div>
    </div>
</header>
