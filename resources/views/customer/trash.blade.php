<x-app>
    <x-slot:title>{{ $title }}</x-slot>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Deleted At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($customers as $customer)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->gender }}</td>
                    <td>{{ $customer->deleted_at }}</td>
                    <td>
                        <form action="{{ route('customer.restore', $customer->id) }}" method="POST" class="d-inline">
                            @method('PUT')
                            @csrf
                            <button type="submit" class="btn btn-warning btn-sm"
                                onclick="return confirm('Anda Yakin Ingin Mengembalikan Data Ini?')">Restore</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Tidak ada data di Trash</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</x-app>
