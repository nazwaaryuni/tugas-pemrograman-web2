<x-app>
    <x-slot:title>{{ $title }}</x-slot>
    @session('success')
        <div class="alert alert-warning">
            {{ session('success') }}
        </div>
    @endsession

    <a class="btn btn-success mb-3" href="{{ route('customer.create') }}" role="button">
        Create
    </a>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">

            <thead class="table-light text-center">
                <tr>
                    <th style="width: 2%">No</th>
                    <th style="width: 20%">Name</th>
                    <th style="width: 7%">Email</th>
                    <th style="width: 20%">Phone</th>
                    <th style="width: 18%">Birth Date</th>
                    <th style="width: 25%">Address</th>
                    <th style="width: 10%">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>
                            {{ \Carbon\Carbon::parse($customer->birth_date)->translatedFormat('d F Y') }}
                        </td>
                        <td>{{ $customer->address }}</td>
                        <td>
                            <div class="d-grid gap-2">

                                <a class="btn btn-warning btn-sm"
                                    href="{{ route('customer.edit', $customer) }}"role="button">Edit</a>
                                <form action="{{ route('customer.destroy', $customer) }}" method="POST">

                                    @method('DELETE')
                                    @csrf

                                    <button type="submit"
                                        class="btn btn-danger btn-sm w-100"onclick="return confirm('Data akan dihapus?')">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app>
