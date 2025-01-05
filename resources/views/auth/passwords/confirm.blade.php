@extends('layouts.app')

@section('title', 'Confirm Password')

@section('content')
    <div class="flex flex-col items-center justify-center bg-gray-50">
        <div class="w-full max-w-md bg-white shadow-md rounded-lg p-8">
            <h2 class="text-2xl font-bold text-center text-[#766FFF] mb-6">Confirm Your Password</h2>

            <p class="text-gray-700 text-center mb-6">
                {{ __('Please confirm your password before continuing.') }}
            </p>

            <form method="POST" action="{{ route('password.confirm') }}" class="space-y-4">
                @csrf

                <div>
                    <label for="password" class="block text-gray-700">Password</label>
                    <input id="password" type="password" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-[#766FFF] @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password">
                    @error('password')
                        <span class="invalid-feedback text-red-600" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="w-full py-2 px-4 bg-[#766FFF] text-white font-semibold rounded hover:bg-[#6858f2] transition">
                        Confirm Password
                    </button>

                    @if (Route::has('password.request'))
                        <a class="text-[#766FFF] hover:underline" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection
