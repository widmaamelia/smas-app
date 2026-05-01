<a href="{{ route('categories.edit', $category) }}" 
   class="text-indigo-600 hover:text-indigo-900">
    Edit
</a>

<form action="{{ route('categories.destroy', $category) }}" 
      method="POST" class="inline">
    @csrf
    @method('DELETE')

    <button type="submit" 
            class="ml-2 text-red-600 hover:text-red-900"
            onclick="return confirm('Yakin hapus?')">
        Delete
    </button>
</form>
