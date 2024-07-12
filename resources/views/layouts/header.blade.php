<header>
  <div class="mx-auto">
    <div class="border-b border-gray-100 bg-white">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-start gap-x-4 py-6 pl-8">
          <!-- Logo -->
          <div class="flex flex-shrink-0 items-center">
            <a href="{{ route('home') }}">
              <x-application-logo
                class="block h-9 w-auto fill-current text-gray-800" />
            </a>
          </div>
          <h2
            class="text-lg font-semibold leading-tight text-gray-800 md:text-2xl">
            {{ config('app.name') }}
          </h2>
        </div>
      </div>
    </div>
    <nav x-data="{ open: false }" class="border-b border-gray-100 bg-white">
      <!-- Primary Navigation Menu -->
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 justify-between">
          <div class="flex">

            <!-- Navigation Links -->
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
              <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ '記事すべて' }}
              </x-nav-link>
            </div>
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
              <x-nav-link :href="route('category.camp',['id'=> '1'])" :active="request()->routeIs('category.camp')">
                {{ 'キャンプ' }}
              </x-nav-link>
            </div>
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
              <x-nav-link :href="route('category.trekking',['id'=> '2'])" :active="request()->routeIs('category.trekking')">
                {{ 'トレッキング' }}
              </x-nav-link>
            </div>
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
              <x-nav-link :href="route('category.cycling',['id'=> '3'])" :active="request()->routeIs('category.cycling')">
                {{ 'サイクリング' }}
              </x-nav-link>
            </div>
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
              <x-nav-link :href="route('category.fishing',['id'=> '4'])" :active="request()->routeIs('category.fishing')">
                {{ 'フィッシング' }}
              </x-nav-link>
            </div>
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
              <x-nav-link :href="route('category.snow',['id'=> '5'])" :active="request()->routeIs('category.snow')">
                {{ 'スキー・スノボ' }}
              </x-nav-link>
            </div>
          </div>

          <!-- Hamburger -->
          <div class="-me-2 flex items-center sm:hidden">
            <button @click="open = ! open"
              class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none">
              <svg class="h-6 w-6" stroke="currentColor" fill="none"
                viewBox="0 0 24 24">
                <path :class="{ 'hidden': open, 'inline-flex': !open }"
                  class="inline-flex" stroke-linecap="round"
                  stroke-linejoin="round" stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{ 'hidden': !open, 'inline-flex': open }"
                  class="hidden" stroke-linecap="round" stroke-linejoin="round"
                  stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>
      </div>

      <!-- Responsive Navigation Menu -->
      <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="space-y-1 pb-3 pt-2">
          <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
            {{ '記事すべて' }}
          </x-responsive-nav-link>
        </div>
        <div class="space-y-1 pb-3 pt-2">
          <x-responsive-nav-link :href="route('category.camp',['id'=> '1'])" :active="request()->routeIs('category.camp')">
            {{ 'キャンプ' }}
          </x-responsive-nav-link>
        </div>
        <div class="space-y-1 pb-3 pt-2">
          <x-responsive-nav-link :href="route('category.trekking',['id'=> '2'])" :active="request()->routeIs('category.trekking')">
            {{ 'トレッキング' }}
          </x-responsive-nav-link>
        </div>
        <div class="space-y-1 pb-3 pt-2">
          <x-responsive-nav-link :href="route('category.cycling',['id'=> '3'])" :active="request()->routeIs('category.cycling')">
            {{ 'サイクリング' }}
          </x-responsive-nav-link>
        </div>
        <div class="space-y-1 pb-3 pt-2">
          <x-responsive-nav-link :href="route('category.fishing',['id'=> '4'])" :active="request()->routeIs('category.fishing')">
            {{ 'フィッシング' }}
          </x-responsive-nav-link>
        </div>
        <div class="space-y-1 pb-3 pt-2">
          <x-responsive-nav-link :href="route('category.snow',['id'=> '5'])" :active="request()->routeIs('category.snow')">
            {{ 'スキー・スノボ' }}
          </x-responsive-nav-link>
        </div>
      </div>
    </nav>
  </div>
</header>
