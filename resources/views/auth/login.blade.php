@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="flex flex-col items-center justify-center bg-gray-50">
        <div class="w-full max-w-md bg-white shadow-md rounded-lg p-8">
            <h2 class="text-2xl font-bold text-center text-[#766FFF] mb-6">Login to Your Account</h2>

            @if (session('error'))
                <div class="mb-4 text-red-600 text-center">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="email" class="block text-gray-700">Email Address</label>
                    <input type="email" id="email" name="email"
                        class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-[#766FFF]"
                        placeholder="Enter your email" required>
                </div>

                <div>
                    <label for="password" class="block text-gray-700">Password</label>
                    <input type="password" id="password" name="password"
                        class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-[#766FFF]"
                        placeholder="Enter your password" required>
                </div>

                <div class="flex items-center justify-between">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="remember"
                            class="text-[#766FFF] border-gray-300 rounded focus:ring-[#766FFF]">
                        <span class="ml-2 text-gray-600">Remember Me</span>
                    </label>

                    <a href="{{ route('password.request') }}" class="text-[#766FFF] hover:underline">Forgot Password?</a>
                </div>

                <button type="submit"
                    class="w-full py-2 px-4 bg-[#766FFF] text-white font-semibold rounded hover:bg-[#6858f2] transition">
                    Login
                </button>
            </form>

            <p class="text-center text-gray-600 mt-4">
                Don't have an account? <a href="{{ route('register') }}" class="text-[#766FFF] hover:underline">Sign up</a>
            </p>
        </div>
    </div>
@endsection
