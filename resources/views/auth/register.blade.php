@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-full max-w-lg bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">{{ __('Register') }}</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name Field -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-medium">{{ __('Name') }}</label>
                    <input id="name" type="text"
                        class="w-full px-4 py-2 mt-2 border rounded-lg focus:ring-2 focus:ring-[#766FFF] focus:outline-none @error('name') border-red-500 @enderror"
                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Field -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium">{{ __('Email Address') }}</label>
                    <input id="email" type="email"
                        class="w-full px-4 py-2 mt-2 border rounded-lg focus:ring-2 focus:ring-[#766FFF] focus:outline-none @error('email') border-red-500 @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-medium">{{ __('Password') }}</label>
                    <input id="password" type="password"
                        class="w-full px-4 py-2 mt-2 border rounded-lg focus:ring-2 focus:ring-[#766FFF] focus:outline-none @error('password') border-red-500 @enderror"
                        name="password" required autocomplete="new-password">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password Field -->
                <div class="mb-6">
                    <label for="password-confirm"
                        class="block text-gray-700 font-medium">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password"
                        class="w-full px-4 py-2 mt-2 border rounded-lg focus:ring-2 focus:ring-[#766FFF] focus:outline-none"
                        name="password_confirmation" required autocomplete="new-password">
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center">
                    <button type="submit"
                        class="w-full py-2 px-4 text-white bg-[#766FFF] rounded-lg hover:bg-[#6858f2] focus:outline-none focus:ring-2 focus:ring-[#6858f2]">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
