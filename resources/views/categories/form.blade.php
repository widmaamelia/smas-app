<form method="POST" action="{{ $action === 'store' ? route('categories.store') : route('categories.update', $category) }}">
    @csrf
    @if($action === 'update')
        @method('PUT')
    @endif

    <div class="mb-6">
        <label for="name" class="block text-sm font-medium text-gray-700">
            {{ __('Name') }}
        </label>
        <input id="name" type="text" name="name" 
               value="{{ old('name', $category?->name ?? '') }}"
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 border px-3 py-2"
               required autofocus />
        @error('name')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex items-center justify-end gap-4">
        <a href="{{ route('categories.index') }}"
           class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            {{ __('Cancel') }}
        </a>

        <button type="submit"
                class="bg-indigo-600 text-white font-medium py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            {{ $action === 'store' ? __('Create Category') : __('Update Category') }}
        </button>
    </div>
</form>
