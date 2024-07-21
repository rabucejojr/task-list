@extends('layouts.app')
@section('content')
    {{-- <div class="bg-gray-100 flex items-center justify-center min-h-screen"> --}}
        <div class="text-center">
            <h1 class="text-6xl font-bold text-gray-800 mb-4">404</h1>
            <p class="text-2xl text-gray-600 mb-4">Page Not Found</p>
            <a href="{{ url('/') }}"
                class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Back to Home
            </a>
        </div>
    {{-- </div> --}}
@endsection
