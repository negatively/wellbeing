<?php
    use App\Enums\RoleEnum;

    $menus = json_decode(json_encode([
        [
            'title' => 'Dashboard',
            'icon'  => 'lucide-house',
            'route' => 'dashboard',
            'match' => 'dashboard',
        ],
        [
            'title' => 'Wellbeing & Engagement',
            'icon'  => 'lucide-sun',
            'route' => 'wellbeings.index',
            'match' => 'wellbeings.index',
        ],
        [
            'title' => 'Pengembangan Diri & Karir',
            'icon'  => 'lucide-graduation-cap',
            'route' => 'self_developments.index',
            'match' => 'self_developments.index',
        ],
        [
            'title' => 'Feedback',
            'icon'  => 'lucide-mail',
            'route' => 'wellbeings.index',
            'match' => 'wellbeings.index',
        ]
    ]));
?>

<nav x-data="{ open: false }" class="fixed top-0 z-10 w-full border-b border-gray-200 bg-white shadow-md">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 justify-between">
            <div class="flex">
                <!-- Logo -->
                <div class="flex shrink-0 items-center">
                    <a href="{{ route('dashboard') }}">
                        Dashboard
                    </a>
                </div>

            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:ms-6 sm:items-center md:flex">
                <x-dropdown-menu align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none">
                            <div>{{ Auth::user()->name }} ({{ strtoupper(Auth::user()->roles[0]->name) }})</div>

                            <div class="ms-1">
                                <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown-menu>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center md:hidden">
                <button
                    @click="open = ! open"
                    class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div class="fixed bottom-0 left-0 right-0 bg-white shadow md:hidden">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 justify-between">

                @foreach( $menus as $menu )
                    
                        <a
                            href="{{ route($menu->route) }}"
                            class="flex flex-col items-center justify-center px-6 hover:bg-gray-100"
                        >
                            <x-dynamic-component
                                :component="$menu->icon"
                                class="w-5 h-5 {{ request()->routeIs($menu->match) ? 'text-primary' : 'text-gray-500 group-hover:text-primary' }}"
                            />
                        </a>
              
                @endforeach

            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden">
        <div class="space-y-1 pb-3 pt-2">
            @foreach( $menus as $menu )
            
                    <x-responsive-nav-link :href="route($menu->route)" :active="request()->routeIs($menu->match)">
                        {{ $menu->title }}
                    </x-responsive-nav-link>
      
            @endforeach
        </div>

        <!-- Responsive Settings Options -->
        <div class="border-t border-gray-200 pb-1 pt-4">
            <div class="px-4">
                <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

<aside id="logo-sidebar" class="fixed left-0 top-0 z-20 mt-16 h-screen w-56 -translate-x-full border-r border-gray-200 bg-white pt-2 transition-transform md:translate-x-0" aria-label="Sidebar">
    <div class="h-full overflow-y-auto bg-white pb-4">
       <ul class="space-y-2 font-medium">

            @foreach( $menus as $menu )
               
                    <li>
                        <x-side-link
                            :href="route($menu->route)"
                            :active="request()->routeIs($menu->match)"
                            :icon="$menu->icon"
                        >
                            {{ $menu->title }}
                        </x-side-link>
                    </li>
             
            @endforeach
       </ul>
    </div>
</aside>