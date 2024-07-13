<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      ユーザ登録
    </h2>
  </x-slot>
  <x-slot name="breadcrumbs">
    <div>
      {{ Breadcrumbs::render('users-create') }}
    </div>
  </x-slot>

  <div class="mx-auto my-16 max-w-lg sm:px-6 lg:px-8">
    <div class="bg-gray-100 pt-6 px-2">
      <form method="POST" action="{{ route('register') }}">
        @csrf
        <!-- Name -->
        <div>
          <x-input-label for="name" :value="__('Name')" />
          <x-text-input id="name" class="mt-1 block w-full" type="text"
            name="name" :value="old('name')" required autofocus
            autocomplete="name" />
          <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <!-- NickName -->
        <div>
          <x-input-label for="nickname" :value="__('ニックネーム')" />
          <x-text-input id="nickname" class="mt-1 block w-full" type="text"
            name="nickname" :value="old('nickname')" required />
          <x-input-error :messages="$errors->get('nickname')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
          <x-input-label for="email" :value="__('Email')" />
          <x-text-input id="email" class="mt-1 block w-full" type="email"
            name="email" :value="old('email')" required autocomplete="email" />
          <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
          <x-input-label for="password" :value="__('Password')" />

          <x-text-input id="password" class="mt-1 block w-full" type="password"
            name="password" required autocomplete="new-password" />

          <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
          <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

          <x-text-input id="password_confirmation" class="mt-1 block w-full"
            type="password" name="password_confirmation" required
            autocomplete="new-password" />

          <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-4 flex items-center justify-end">
          <a class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
            href="{{ route('login') }}">
            {{ __('Already registered?') }}
          </a>

          <x-primary-button class="ms-4">
            {{ __('Register') }}
          </x-primary-button>
        </div>
      </form>
    </div>
  </div>
</x-app-layout>
