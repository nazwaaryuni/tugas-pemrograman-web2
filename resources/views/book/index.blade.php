<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    @session('success')
        <div class="alert alert-warning">
            {{ session('success') }}
        </div>
    @endsession

    <a class="btn btn-warning mb-3" href="{{ route('book.create') }}" role="button">Create</a>

    <ul class="list-group">
        @foreach ($books as $book)
            <li class="list-group-item">
                {{ $loop->iteration }}. {{ $book->title }} -- {{ $book->author }} --
                {{ $book->publisher }} --
                {{ $book->year }} -- {{ $book->isbn }} -- {{ $book->stock }}
                <a class="btn btn-warning btn-sm" href="{{ route('book.edit', $book) }}" role="button">Edit</a>
                <form action="{{ route('book.destroy', $book) }}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf

                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Data akan dihapus?')">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</x-app>
