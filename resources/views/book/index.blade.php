<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    @session('success')
        <div class="alert alert-danger">
            {{ session('success') }}
        </div>
    @endsession

    <a class="btn btn-warning mb-3" href="{{ route('book.create') }}" role="button">Create</a>

    <ul class="list-group">
        @foreach ($books as $book)
            <li class="list-group-item">{{ $loop->iteration }}. {{ $book->title }} -- {{ $book->author }} --
                {{ $book->publisher }} --
                {{ $book->year }} -- {{ $book->isbn }} -- {{ $book->stock }}</li>
        @endforeach
    </ul>
</x-app>
