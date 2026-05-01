@extends('layouts.app')

@section('header')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                Daftar Aset Barang
            </h2>
        </div>
    </header>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6 flex justify-between items-center">
                <h3 class="text-xl font-bold text-gray-800">Manajemen Item</h3>
                <a href="{{ route('items.create') }}" 
                   class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    + Tambah Barang
                </a>
            </div>

            @include('components.alert-success')

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-100 border-b">
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Gambar</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Kode</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Nama</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Kategori</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Stok</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Brand</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Deskripsi</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-600 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @forelse($items as $item)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 text-center">
                                        <img src="{{ $item->image ? asset('storage/'.$item->image) : 'https://via.placeholder.com/100' }}"
                                             alt="Item Image"
                                             class="w-16 h-16 object-cover rounded border">
                                    </td>

                                    <td class="px-6 py-4 text-sm font-semibold text-gray-900">{{ $item->item_code }}</td>

                                    <td class="px-6 py-4 text-sm text-gray-700">{{ $item->item_name }}</td>

                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $item->category->name ?? 'N/A' }}</td>

                                    <td class="px-6 py-4 text-sm text-center text-gray-600">{{ $item->stock }}</td>

                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $item->brand ?? '-' }}</td>

                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $item->description ?? '-' }}</td>

                                    <td class="px-6 py-4 text-sm text-center">
                                        <a href="{{ route('items.edit', $item->id) }}" 
                                           class="text-indigo-600 hover:text-indigo-900 mr-4">
                                            Edit
                                        </a>

                                        <form action="{{ route('items.destroy', $item->id) }}" 
                                              method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" 
                                                    onclick="return confirm('Yakin mau hapus?')"
                                                    class="text-red-600 hover:text-red-900">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="px-6 py-4 text-center text-gray-400">
                                        Data tidak ditemukan
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection