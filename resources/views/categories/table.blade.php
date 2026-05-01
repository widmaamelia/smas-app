<div class="mt-6 overflow-x-auto">
    <table class="min-w-full border">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>

        <tbody class="bg-white divide-y">
            @forelse($categories as $category)
                <tr>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">
                        {{ $category->id }}
                    </td>

                    <td class="px-6 py-4 text-sm text-gray-500">
                        {{ $category->name }}
                    </td>

                    <td class="px-6 py-4 text-sm">
                        @include('categories.actions', ['category' => $category])
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center py-4 text-gray-400">
                        Data tidak ditemukan
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
