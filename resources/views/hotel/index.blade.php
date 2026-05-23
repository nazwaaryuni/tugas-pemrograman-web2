<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    @session('success')
        <div class="alert alert-warning">
            {{ session('success') }}
        </div>
    @endsession

    <a class="btn btn-primary mb-3" href="{{ route('hotel.create') }}" role="button">Create</a>

    <form action="">
        <div class="row g-3 mb-3">
            <div class="col-md-8">
                <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Search Hotel"
                    value="{{ request('keyword') }}">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-warning">Search</button>
            </div>
        </div>
    </form>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Hotel Name</th>
                <th class="text-center">Address</th>
                <th class="text-center">City</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($hotels as $hotel)
                <tr>
                    <td>{{ $hotels->firstItem() + $loop->index }}</td>
                    <td>{{ $hotel->name }}</td>
                    <td>{{ $hotel->address }}</td>
                    <td>{{ $hotel->city }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $hotels->links() }}
</x-app>
