<div class="min-h-full">
  <nav class="bg-gray-800" x-data="{ abrir:false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <img class="h-8 w-8" src="{{ Storage::url('imagen/logo.png') }}" alt="TicketShop">
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              @auth
                <a href="{{ route('home') }}" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Inicio</a>
              @endauth
              
              @auth
                <a href="{{ route('concierto.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Conciertos</a>  
              @endauth
              
              @auth
                <a href="{{ route('artista.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Artistas</a>  
              @endauth
              
              @auth
                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Calendar</a>
              @endauth

              @can('admin.home')
                <a href="{{ route('admin.home') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Administración</a>
              @endcan
              <div>
              @auth
                @if (count(Cart::getContent()))
                  <a href="{{ route('cart.checkout') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">CARRITO <span class="badge badge-danger">{{ count(Cart::getContent()) }}</span></a>
                @endif
              @endauth
          </div>
            </div>
          </div>
        </div>
        <div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6">
            <!-- Profile dropdown -->
            <div class="relative ml-3" x-data="{ abrir:false }">
              <div>
                @auth
                  <button x-on:click="abrir=true" type="button" class="flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                    <span class="sr-only">Open user menu</span>
                    @if (Auth::guest())
                      <img class="h-8 w-8 rounded-full" src="{{ Storage::url('imagen/logo.png') }}" alt="">
                    @else
                      <img class="h-8 w-8 rounded-full" src="{{ Auth::user()->getMedia('perfils')->first()->getUrl('thumb') }}" alt="">  
                    @endif          
                  </button>
                @endauth
              </div>

              <!--
                Dropdown menu, show/hide based on menu state.

                Entering: "transition ease-out duration-100"
                  From: "transform opacity-0 scale-95"
                  To: "transform opacity-100 scale-100"
                Leaving: "transition ease-in duration-75"
                  From: "transform opacity-100 scale-100"
                  To: "transform opacity-0 scale-95"
              -->
              <div x-show="abrir" x-on:click.away="abrir=false" class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                  <!-- Active: "bg-gray-100", Not Active: "" -->
                  
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white" onclick="event.preventDefault(); this.closest('form').submit();">
                      Sign out
                    </a>
                  </form>
              </div>
            </div>
          </div>
        </div>
        <div class="-mr-2 flex md:hidden">
          <!-- Mobile menu button -->
          <button x-on:click="abrir=true" type="button" class="inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <!--
              Heroicon name: outline/bars-3

              Menu open: "hidden", Menu closed: "block"
            -->
            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!--
              Heroicon name: outline/x-mark

              Menu open: "block", Menu closed: "hidden"
            -->
            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden" id="mobile-menu" x-show="abrir" x-on:click.away="abrir=false">
      <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        @auth
          <a href="#" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Inicio</a>
        @endauth

        @auth
          <a href="{{ route('concierto.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Conciertos</a>  
        @endauth
        
        @auth
          <a href="{{ route('artista.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Artistas</a>
        @endauth

        @auth
          <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Calendar</a>
        @endauth

        @can('admin.home')
          <a href="{{ route('admin.home') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Administración</a>
        @endcan
      </div>
      <div>
            @auth
              @if (count(Cart::getContent()))
                <a href="{{ route('cart.checkout') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">CARRITO <span class="badge badge-danger">{{ count(Cart::getContent()) }}</span></a>
              @endif
            @endauth
      </div>
      @auth
        <div class="border-t border-gray-700 pt-4 pb-3">
          <div class="flex items-center px-5">
            <div class="flex-shrink-0">
              @if (Auth::guest())
                <img class="h-8 w-8 rounded-full" src="{{ Storage::url('imagen/logo.png') }}" alt="">
              @else
                <img class="h-8 w-8 rounded-full" src="{{ Auth::user()->getMedia('perfils')->first()->getUrl('thumb') }}" alt="">  
              @endif
            </div>
            <div class="ml-3">
              @if (!Auth::guest())
                <div class="text-base font-medium leading-none text-white">{{ Auth::user()->name }}</div>
                <div class="text-sm font-medium leading-none text-gray-400">{{ Auth::user()->email }}</div>
              @endif  
            </div>
          </div>
          <div class="mt-3 space-y-1 px-2">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <a href="{{ route('logout') }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white" onclick="event.preventDefault(); this.closest('form').submit();">
                Sign out
              </a>
            </form>
          </div>
        </div>
      @endauth
    </div>
  </nav>

  @yield('content')
      
</div>

