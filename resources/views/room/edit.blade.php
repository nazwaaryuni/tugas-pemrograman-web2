<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    <form action="{{ route('room.update', $room->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Room Number</label>
            <input type="text" name="room_number" class="form-control"
                value="{{ old('room_number', $room->room_number) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Type</label>
            <input type="text" name="type" class="form-control" value="{{ old('type', $room->type) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" name="price" class="form-control" value="{{ old('price', $room->price) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Capacity</label>
            <input type="number" name="capacity" class="form-control" value="{{ old('capacity', $room->capacity) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Facilities</label>
            <textarea name="facilities" class="form-control">{{ old('facilities', $room->facilities) }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Hotel</label>
            <select name="hotel_id" class="form-select">
                @foreach ($hotels as $hotel)
                    <option value="{{ $hotel->id }}"
                        {{ old('hotel_id', $room->hotel_id) == $hotel->id ? 'selected' : '' }}>
                        {{ $hotel->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <a href="{{ route('room.index') }}" class="btn btn-warning">Cancel</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-app>
