<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    <form action="{{ route('room.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Room Number</label>
            <input type="text" name="room_number" class="form-control" value="{{ old('room_number') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Type</label>
            <input type="text" name="type" class="form-control" value="{{ old('type') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" name="price" class="form-control" value="{{ old('price') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Capacity</label>
            <input type="number" name="capacity" class="form-control" value="{{ old('capacity') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Facilities</label>
            <textarea name="facilities" class="form-control">{{ old('facilities') }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Hotel</label>
            <select name="hotel_id" class="form-select">
                <option value="">-- Pilih Hotel --</option>
                @foreach ($hotels as $hotel)
                    <option value="{{ $hotel->id }}" {{ old('hotel_id') == $hotel->id ? 'selected' : '' }}>
                        {{ $hotel->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('room.index') }}" class="btn btn-secondary">Back</a>
    </form>
</x-app>
