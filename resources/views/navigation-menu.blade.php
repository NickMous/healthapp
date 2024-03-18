<nav x-data="{ open: false }" class="transition-colors bg-mint_green dark:bg-dm-dark_green border-b border-gray-300 dark:border-dm-accent-aquamarine-100 sticky top-0">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('tuinhuisje') }}" wire:navigate>
                        <x-application-mark class="block h-10 w-auto dark:fill-dm-mint_green"/>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-6 sm:flex">
                    <x-nav-link href="{{ route('tuinhuisje') }}" :active="request()->routeIs('tuinhuisje')">
                        {{ __('Home') }}
                    </x-nav-link>
                    @if (Auth::check())
                        <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                    @endif
                    @role('super admin')
                    <x-nav-dropdown align="left" width="48" :active="request()->routeIs('data.index') || request()->routeIs('health')">
                        <x-slot name="trigger">
                            App
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link href="{{ route('data.index') }}" wire:navigate>
                                {{ __('Data') }}
                            </x-dropdown-link>
                            <x-dropdown-link href="{{ route('health') }}" wire:navigate>
                                {{ __('App health') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-nav-dropdown>
                    @endrole
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @if(Auth::check())
                    <!-- this div is only for the class to exist in the css file, so we can use the transition -->
                    <div class="hidden w-72"></div>
                    <a href="{{ route('notifications.index') }}" id="notificationButton" class="inline-flex items-center overflow-hidden px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-dark_green dark:text-dm-mint_green bg-mint_green dark:bg-dm-dark_green hover:text-dark_green-600 dark:hover:text-dm-aquamarine hover:bg-mint_green hover:dark:bg-dm-dark_green focus:outline-none focus:bg-aquamarine dark:focus:bg-dm-brunswick_green active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-500" wire:navigate>
                        <div id="notificationInnerDiv" class="h-6 w-6 flex items-center justify-center relative transition-[width]">
                            <div id="notificationIconDiv" class="flex items-center justify-center w-6 h-6 absolute top-0 transition-top duration-500">
                                <i class="fa-regular fa-bell"></i>
                            </div>
                            <div id="notificationTextDiv" class="flex items-center justify-center h-6 absolute top-8 transition-top hidden">
                                <p class="dark:text-dm-dark_green-600 truncate">The import of the NEVO dataset is complete</p>
                            </div>
                        </div>
                    </a>
                @endif

                <button
                    class="relative inline-flex items-center overflow-hidden px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-dark_green dark:text-dm-mint_green bg-mint_green dark:bg-dm-dark_green hover:text-dark_green-600 dark:hover:text-dm-aquamarine focus:outline-none focus:bg-aquamarine dark:focus:bg-dm-brunswick_green active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150"
                    x-data="{ nextDarkMode: () => {
                switch (darkMode) {
                    case 'light':
                        return 'dark';
                    case 'dark':
                        return 'system';
                    case 'system':
                        return 'light';
                }
            }}"
                    x-on:click="darkMode = nextDarkMode()">
                    <div class="w-6 h-6">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             x-show="darkMode === 'light'"
                             x-transition:enter="transition-top ease-out duration-500 delay-500"
                             x-transition:enter-start="top-10"
                             x-transition:enter-end="top-2"
                             x-transition:leave="transition-top ease-in-out duration-500"
                             x-transition:leave-start="top-2"
                             x-transition:leave-end="top-10"
                             class="w-6 h-6 p-1 absolute" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg"
                             x-show="darkMode === 'dark'"
                             x-transition:enter="transition-top ease-out duration-500 delay-500"
                             x-transition:enter-start="top-10"
                             x-transition:enter-end="top-2"
                             x-transition:leave="transition-top ease-in-out duration-500"
                             x-transition:leave-start="top-2"
                             x-transition:leave-end="top-10"
                             class="w-6 h-6 p-1 absolute" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"/>
                        </svg>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            x-show="darkMode === 'system'"
                            x-transition:enter="transition-top ease-out duration-500 delay-500"
                            x-transition:enter-start="top-10"
                            x-transition:enter-end="top-2"
                            x-transition:leave="transition-top ease-in-out duration-500"
                            x-transition:leave-start="top-2"
                            x-transition:leave-end="top-10"
                            class="w-6 h-6 p-1 absolute"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                </button>

                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ms-3 relative">
                        <x-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"/>
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" wire:navigate>
                                        {{ __('Team Settings') }}
                                    </x-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-dropdown-link href="{{ route('teams.create') }}" wire:navigate>
                                            {{ __('Create New Team') }}
                                        </x-dropdown-link>
                                    @endcan

                                    <!-- Team Switcher -->
                                    @if (Auth::user()->allTeams()->count() > 1)
                                        <div class="border-t border-gray-300 dark:border-gray-600"></div>

                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Switch Teams') }}
                                        </div>

                                        @foreach (Auth::user()->allTeams() as $team)
                                            <x-switchable-team :team="$team"/>
                                        @endforeach
                                    @endif
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endif

                @if (Auth::check())
                    <!-- Settings Dropdown -->
                    <div class="ms-3 relative">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"/>
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-dark_green dark:text-dm-mint_green bg-mint_green dark:bg-dm-dark_green hover:text-dark_green-600 dark:hover:text-dm-aquamarine focus:outline-none focus:bg-aquamarine dark:focus:bg-dm-brunswick_green active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                                        </svg>
                                    </button>
                                </span>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-dark_green dark:text-dm-mint_green">
                                    {{ __('Manage Account') }}
                                </div>

                                <x-dropdown-link href="{{ route('profile.show') }}" wire:navigate>
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-dropdown-link href="{{ route('api-tokens.index') }}" wire:navigate>
                                        {{ __('API Tokens') }}
                                    </x-dropdown-link>
                                @endif

                                <div class="border-t border-gray-300 dark:border-gray-600"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf

                                    <x-dropdown-link href="{{ route('logout') }}"
                                                     @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @else
                    <div class="ms-3 relative">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-dark_green dark:text-dm-mint_green bg-mint_green dark:bg-dm-dark_green hover:text-dark_green-600 dark:hover:text-dm-aquamarine focus:outline-none focus:bg-aquamarine dark:focus:bg-dm-brunswick_green active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                                        {{ __('Login or register') }}

                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->

                                <x-dropdown-link href="{{ route('login') }}" wire:navigate>
                                    {{ __('Login') }}
                                </x-dropdown-link>

                                <x-dropdown-link href="{{ route('register') }}" wire:navigate>
                                    {{ __('Register') }}
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endif
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-dark_green dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-aquamarine dark:focus:bg-gray-900 focus:text-dark_green dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div class="block sm:hidden overflow-hidden"
         x-show="open"
         x-transition:enter="transition-[max-height] ease-in-out duration-300"
         x-transition:enter-start="max-h-0"
         x-transition:enter-end="max-h-[400px]"
         x-transition:leave="transition-[max-height] ease-in-out duration-300"
         x-transition:leave-start="max-h-[400px]"
         x-transition:leave-end="max-h-0"
    >
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('tuinhuisje') }}" :active="request()->routeIs('tuinhuisje')">
                {{ __('Home') }}
            </x-responsive-nav-link>
            @if(Auth::check())
                <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            @endif
            @role('super admin')
            <x-response-nav-dropdown :active="request()->routeIs('data.index') || request()->routeIs('data.import') || request()->routeIs('health')">
                <x-slot name="trigger">
                    App
                </x-slot>
                <x-slot name="content">
                    <x-responsive-nav-link href="{{ route('data.index') }}" :active="request()->routeIs('data.index') || request()->routeIs('data.import')">
                        {{ __('Data') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="{{ route('health') }}" :active="request()->routeIs('health')">
                        {{ __('App health') }}
                    </x-responsive-nav-link>
                </x-slot>
            </x-response-nav-dropdown>
            @endrole
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-300 dark:border-dm-accent-aquamarine-100">
            @if(Auth::check())
                <div class="flex items-center px-4">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="shrink-0 me-3">
                            <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"/>
                        </div>
                    @endif

                    <div>
                        <div class="font-medium text-base text-dark_green dark:text-dm-mint_green">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Account Management -->
                    <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                            {{ __('API Tokens') }}
                        </x-responsive-nav-link>
                    @endif

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <x-responsive-nav-link href="{{ route('logout') }}"
                                               @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>

                    <!-- Team Management -->
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <div class="border-t border-gray-200 dark:border-gray-600"></div>

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Team') }}
                        </div>

                    <!-- Team Settings -->
                        <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                            {{ __('Team Settings') }}
                        </x-responsive-nav-link>

                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                            <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                                {{ __('Create New Team') }}
                            </x-responsive-nav-link>
                        @endcan

                        <!-- Team Switcher -->
                        @if (Auth::user()->allTeams()->count() > 1)
                            <div class="border-t border-gray-200 dark:border-gray-600"></div>

                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Switch Teams') }}
                            </div>

                            @foreach (Auth::user()->allTeams() as $team)
                                <x-switchable-team :team="$team" component="responsive-nav-link"/>
                            @endforeach
                        @endif
                    @endif
                </div>
            @else
                <div class="pb-3 space-y-1">
                    <x-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                        {{ __('Login') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                        {{ __('Register') }}
                    </x-responsive-nav-link>
                </div>
            @endif
        </div>
        <div class="pt-3 pb-3 space-y-1 border-t border-gray-300 dark:border-dm-accent-aquamarine-100">
            <button
                class="relative overflow-hidden flex w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-dark_green dark:text-dm-mint_green hover:text-gray-800 dark:hover:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 hover:border-gray-300 dark:hover:border-gray-600 focus:outline-none focus:text-dark_green dark:focus:text-dm-mint_green focus:bg-sea_green dark:focus:bg-dm-aquamarine/30 focus:border-sea_green dark:focus:border-dm-aquamarine transition duration-150 ease-in-out"
                x-data="{ nextDarkMode: () => {
                switch (darkMode) {
                    case 'light':
                        return 'dark';
                    case 'dark':
                        return 'system';
                    case 'system':
                        return 'light';
                }
            }}"
                x-on:click="darkMode = nextDarkMode()">
                <div class="h-6 flex">
                    <div class="absolute flex"
                         x-show="darkMode === 'light'"
                         x-transition:enter="transition-top ease-out duration-500 delay-500"
                         x-transition:enter-start="top-10"
                         x-transition:enter-end="top-2"
                         x-transition:leave="transition-top ease-in-out duration-500"
                         x-transition:leave-start="top-2"
                         x-transition:leave-end="top-10">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-6 h-6 p-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                        <p>Light mode</p>
                    </div>
                    <div class="absolute flex"
                         x-show="darkMode === 'dark'"
                         x-transition:enter="transition-top ease-out duration-500 delay-500"
                         x-transition:enter-start="top-10"
                         x-transition:enter-end="top-2"
                         x-transition:leave="transition-top ease-in-out duration-500"
                         x-transition:leave-start="top-2"
                         x-transition:leave-end="top-10">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-6 h-6 p-1" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"/>
                            <p>Dark mode</p>
                        </svg>
                    </div>
                    <div class="absolute flex"
                         x-show="darkMode === 'system'"
                         x-transition:enter="transition-top ease-out duration-500 delay-500"
                         x-transition:enter-start="top-10"
                         x-transition:enter-end="top-2"
                         x-transition:leave="transition-top ease-in-out duration-500"
                         x-transition:leave-start="top-2"
                         x-transition:leave-end="top-10">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6 p-1"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <p>System preferences</p>
                    </div>
                </div>
            </button>
        </div>
    </div>
</nav>
