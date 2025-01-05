@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')
    <div class="flex flex-col items-center justify-center bg-gray-50">
        <div class="w-full max-w-md bg-white shadow-md rounded-lg p-8">
            <h2 class="text-2xl font-bold text-center text-[#766FFF] mb-6">Reset Your Password</h2>

            @if (session('error'))
                <div class="mb-4 text-red-600 text-center">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div>
                    <label for="email" class="block text-gray-700">Email Address</label>
                    <input id="email" type="email" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-[#766FFF] @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Enter your email">
                    @error('email')
                        <span class="invalid-feedback text-red-600" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-gray-700">New Password</label>
                    <input id="password" type="password" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-[#766FFF] @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter your new password">
                    @error('password')
                        <span class="invalid-feedback text-red-600" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div>
                    <label for="password-confirm" class="block text-gray-700">Confirm Password</label>
                    <input id="password-confirm" type="password" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-[#766FFF]" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your new password">
                </div>

                <button type="submit" class="w-full py-2 px-4 bg-[#766FFF] text-white font-semibold rounded hover:bg-[#6858f2] transition">
                    Reset Password
                </button>
            </form>

            <p class="text-center text-gray-600 mt-4">
                Remembered your password? <a href="{{ route('login') }}" class="text-[#766FFF] hover:underline">Login</a>
            </p>
        </div>
    </div>
@endsection
