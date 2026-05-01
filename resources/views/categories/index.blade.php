@extends('layouts.main')

@section('content')
    <div class="py-10 max-w-7xl mx-auto">
        <div class="mb-6">
            <h2 class="text-2xl font-bold mb-6">
                Categories
            </h2>
            <a href="{{ route('categories.create') }}"
               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Add New Category
            </a>
        </div>

        @include('components.alert-success')

        @include('categories.table', ['categories' => $categories])
    </div>
@endsection