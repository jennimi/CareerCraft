@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')
    <div class="flex flex-col items-center justify-center bg-gray-50">
        <div class="w-full max-w-md bg-white shadow-md rounded-lg p-8">
            <h2 class="text-2xl font-bold text-center text-[#766FFF] mb-6">Reset Your Password</h2>

            @if (session('status'))
                <div class="mb-4 text-green-600 text-center">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                @csrf

                <div>
                    <label for="email" class="block text-gray-700 mb-2">Email Address</label>
                    <input id="email" type="email" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-[#766FFF] @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your email">

                    @error('email')
                        <span class="invalid-feedback text-red-600" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="w-full py-2 px-4 bg-[#766FFF] text-white font-semibold rounded hover:bg-[#6858f2] transition">
                        Send Password Reset Link
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
