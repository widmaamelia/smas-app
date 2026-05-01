<form action="{{ $action === 'store' ? route('items.store') : route('items.update', $item) }}" 
      method="POST" enctype="multipart/form-data">
    @csrf
    @if($action === 'update')
        @method('PUT')
    @endif

    {{-- Kode Barang --}}
    <div class="mb-4">
        <label class="block font-semibold mb-2 text-gray-700">Kode Barang</label>
        <input type="text" name="item_code" 
               value="{{ old('item_code', $item?->item_code ?? '') }}"
               class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
               required>
        @error('item_code')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Nama Barang --}}
    <div class="mb-4">
        <label class="block font-semibold mb-2 text-gray-700">Nama Barang</label>
        <input type="text" name="item_name" 
               value="{{ old('item_name', $item?->item_name ?? '') }}"
               class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
               required>
        @error('item_name')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Kategori --}}
    <div class="mb-4">
        <label class="block font-semibold mb-2 text-gray-700">Kategori</label>
        <select name="category_id" 
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                required>
            @if($action === 'store')
                <option value="">-- Pilih Kategori --</option>
            @endif
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    {{ ($item?->category_id ?? old('category_id')) == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Stok --}}
    <div class="mb-4">
        <label class="block font-semibold mb-2 text-gray-700">Stok</label>
        <input type="number" name="stock" 
               value="{{ old('stock', $item?->stock ?? '') }}"
               class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
               required>
        @error('stock')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Brand --}}
    <div class="mb-4">
        <label class="block font-semibold mb-2 text-gray-700">Brand</label>
        <input type="text" name="brand" 
               value="{{ old('brand', $item?->brand ?? '') }}"
               class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
        @error('brand')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Deskripsi --}}
    <div class="mb-4">
        <label class="block font-semibold mb-2 text-gray-700">Deskripsi</label>
        <textarea name="description" 
                  class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                  rows="4">{{ old('description', $item?->description ?? '') }}</textarea>
        @error('description')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Gambar Lama (untuk update) --}}
    @if($action === 'update' && $item?->image)
        <div class="mb-4">
            <label class="block font-semibold mb-2 text-gray-700">Gambar Saat Ini</label>
            <img src="{{ asset('storage/' . $item->image) }}" 
                 alt="Item Image"
                 class="w-32 h-32 object-cover rounded border">
        </div>
    @endif

    {{-- Upload Gambar --}}
    <div class="mb-6">
        <label class="block font-semibold mb-2 text-gray-700">
            {{ $action === 'update' ? 'Ganti Gambar' : 'Upload Gambar' }}
        </label>
        <input type="file" name="image" 
               class="w-full border border-gray-300 rounded px-3 py-2"
               {{ $action === 'store' ? 'required' : '' }}>
        @error('image')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Tombol --}}
    <div class="flex justify-between gap-4">
        <a href="{{ route('items.index') }}" 
           class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded">
            Kembali
        </a>

        <button type="submit" 
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
            {{ $action === 'store' ? 'Simpan' : 'Update' }}
        </button>
    </div>

</form>
