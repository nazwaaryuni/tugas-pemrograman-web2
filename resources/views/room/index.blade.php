<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    @session('success')
        <div class="alert alert-warning">
            {{ session('success') }}
        </div>
    @endsession

    <a href="{{ route('room.create') }}" class="btn btn-primary mb-3">Create</a>

    <form action="">
        <div class="row g-3 mb-3">
            <div class="col-md-4">
                <select name="hotel_id" class="form-select">
                    <option value="">-- Filter Hotel --</option>
                    @foreach ($hotels as $hotel)
                        <option value="{{ $hotel->id }}" {{ request('hotel_id') == $hotel->id ? 'selected' : '' }}>
                            {{ $hotel->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="keyword" placeholder="Search Room"
                    value="{{ request('keyword') }}">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-warning">Search</button>
            </div>
        </div>
    </form>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Room Number</th>
                <th class="text-center">Type</th>
                <th class="text-center">Price</th>
                <th class="text-center">Capacity</th>
                <th class="text-center">Facilites</th>
                <th class="text-center">Hotel</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rooms as $room)
                <tr>
                    <td>{{ $rooms->firstItem() + $loop->index }}</td>
                    <td>{{ $room->room_number }}</td>
                    <td>{{ $room->type }}</td>
                    <td>Rp{{ number_format($room->price, 0, ',', '.') }}</td>
                    <td>{{ $room->capacity }}</td>
                    <td>{{ $room->facilities }}</td>
                    <td>{{ $room->hotel->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $rooms->links() }}
</x-app>
