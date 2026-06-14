<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    <h6>Data Hotel</h6>
    <ul class="list-group mb-3">
        <li class="list-group-item">Name: {{ $hotel->name }}</li>
        <li class="list-group-item">Address: {{ $hotel->address }}</li>
        <li class="list-group-item">City: {{ $hotel->city }}</li>
        <li class="list-group-item">Created At: {{ $hotel->created_at->format('d F Y H:i:s') }}</li>
        <li class="list-group-item">Last Update: {{ $hotel->updated_at->diffForHumans() }}</li>
    </ul>

    <h6>Data Rooms</h6>
    <ul class="list-group">
        @forelse ($hotel->rooms as $room)
            <li class="list-group-item">
                Room: {{ $room->room_number }} | Type: {{ $room->type }} | Price:
                Rp{{ number_format($room->price, 0, ',', '.') }} | Capacity: {{ $room->capacity }} Orang
                <br>
                Facilities: {{ $room->facilities }}
            </li>
        @empty
            <li class="list-group-item">Belum Ada Kamar Terdaftar</li>
        @endforelse
    </ul>

    <div class="d-flex justify-content-start my-3">
        <a class="btn btn-warning mb-3" href="{{ route('hotel.index') }}" role="button">Back</a>
    </div>

</x-app>
