@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-full max-w-lg bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">{{ __('Verify Your Email Address') }}</h2>

            <div class="text-gray-700">
                @if (session('resent'))
                    <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-4">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif

                <p class="mb-4">
                    {{ __('Before proceeding, please check your email for a verification link.') }}
                </p>
                <p class="mb-6">
                    {{ __('If you did not receive the email') }},
                </p>

                <form class="inline-block" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit"
                        class="text-[#766FFF] hover:text-[#6858f2] font-medium focus:outline-none focus:underline">
                        {{ __('click here to request another') }}
                    </button>.
                </form>
            </div>
        </div>
    </div>
@endsection
