@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                    {{ __('Create Category') }}
                </h2>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @include('categories.form', ['category' => null, 'action' => 'store'])
                </div>
            </div>
        </div>
    </div>
@endsection