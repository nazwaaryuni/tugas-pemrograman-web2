<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    <table class="table table-bordered">
        <tr>
            <th>Room Number</th>
            <td>{{ $room->room_number }}</td>
        </tr>
        <tr>
            <th>Type</th>
            <td>{{ $room->type }}</td>
        </tr>
        <tr>
            <th>Price</th>
            <td>Rp{{ number_format($room->price, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Capacity</th>
            <td>{{ $room->capacity }}</td>
        </tr>
        <tr>
            <th>Facilities</th>
            <td>{{ $room->facilities }}</td>
        </tr>
        <tr>
            <th>Hotel</th>
            <td>{{ $room->hotel->name }}</td>
        </tr>
    </table>

    <a href="{{ route('room.index') }}" class="btn btn-secondary">Back</a>
</x-app>
