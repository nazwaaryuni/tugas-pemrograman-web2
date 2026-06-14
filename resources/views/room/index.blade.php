<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    @session('success')
        <div class="alert alert-warning">
            {{ session('success') }}
        </div>
    @endsession

    <a class="btn btn-primary mb-3" href="{{ route('room.create') }}" role="button">Create</a>

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
        <thead class="table-success text-center">
            <tr>
                <th class="text-center align-middle"style="width: 2%">No</th>
                <th class="text-center align-middle"style="width: 4%">Room Number</th>
                <th class="text-center align-middle"style="width: 5%">Type</th>
                <th class="text-center align-middle"style="width: 10%">Price</th>
                <th class="text-center align-middle"style="width: 8%">Capacity</th>
                <th class="text-center align-middle"style="width: 20%">Facilites</th>
                <th class="text-center align-middle"style="width: 15%">Hotel Name</th>
                <th class="text-center align-middle"style="width: 10%">Aksi</th>
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
                    <td>
                        <div class="row g-1">
                            <div class="col-6">
                                <a href="{{ route('room.edit', $room->id) }}"
                                    class="btn btn-warning btn-sm w-100">Edit</a>
                            </div>
                            <div class="col-6">
                                <form action="{{ route('room.destroy', $room->id) }}" method="POST"
                                    onsubmit="return confirm('Anda Yakin Ingin Menghapus Data Ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm w-100">Delete</button>
                                </form>
                            </div>

                            <div class="col-12 mt-1">
                                <a href="{{ route('room.show', $room->id) }}"
                                    class="btn btn-info btn-sm w-100">Detail</a>
                            </div>
                        </div>
                    </td>


                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $rooms->links() }}
</x-app>
