@extends('layouts.app')

@section('content')
<main class="bg-gray-100 flex bg-local" style="background: url('./assets/svg/architect.svg')">
  <div class="bg-gray-100 mx-auto max-w-6xl bg-white py-20 px-12 lg:px-24 shadow-xl mb-24">
    <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
        {{ __('Register') }}
    </header>
    <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
      <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="name">
              {{ __('Name') }}:
            </label>
            <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3 @error('name')  border-red-500 @enderror" 
                id="name" name="name" type="text" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
                <p class="text-red-500 text-xs italic mt-4">
                    {{ $message }}
                </p>
            @enderror
          </div>
          <div class="md:w-1/2 px-3">
            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="mail">
              {{ __('E-Mail Address') }}:
            </label>
            <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3 @error('email') border-red-500 @enderror"
                 id="email" name="email" type="mail" value="{{ old('email') }}" required autocomplete="email">
          </div>
            @error('email')
                <p class="text-red-500 text-xs italic mt-4">
                    {{ $message }}
                </p>
            @enderror
        </div>
        
        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="password">
              {{ __('Password') }}:
            </label>
            <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3 @error('password') border-red-500 @enderror" 
                id="password" type="password" name="password" required autocomplete="new-password">
            @error('password')
                <p class="text-red-500 text-xs italic mt-4">
                    {{ $message }}
                </p>
            @enderror
          </div>
          <div class="md:w-1/2 px-3">
            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="password-confirm">
              {{ __('Confirm Password') }}:
            </label>
            <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" type="password" id="title" 
                name="password_confirmation" required autocomplete="new-password">
          </div>
        </div>

        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="password">
              {{ __('Imagen de perfil') }}:
            </label>
            <input type="file" name="imagen">
          </div>
        </div>

        <div class="-mx-3 md:flex mt-2">
          <div class="md:w-full px-3">
            <button class="md:w-full bg-gray-900 text-white font-bold py-2 px-4 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full">
              Register
            </button>
          </div>
        </div>
      </div>
    </form>
  </div>
</main>
@endsection