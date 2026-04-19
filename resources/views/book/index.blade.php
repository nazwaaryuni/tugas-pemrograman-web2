<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    <ul class="list-group">
        @foreach ($books as $book)
            <li class="list-group-item">{{ $loop->iteration }}. {{ $book->title }} -- {{ $book->author }} --
                {{ $book->publisher }} --
                {{ $book->year }} -- {{ $book->isbn }} -- {{ $book->stock }}</li>
        @endforeach
    </ul>
</x-app>
