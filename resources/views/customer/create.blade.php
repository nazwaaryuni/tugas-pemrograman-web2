<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    <div class="row justify-content-center">
        <div class="col-md-8">

            <form method="POST" action="{{ route('customer.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Customer Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name') }}">

                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select name="gender" id="gender" class="form-select @error('gender') is-invalid @enderror">

                        <option value="">-- Select Gender --</option>
                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>
                            Male
                        </option>
                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>
                            Female
                        </option>
                    </select>

                    @error('gender')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ old('email') }}">

                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                        name="phone" value="{{ old('phone') }}">

                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="birth_date" class="form-label">Birth Date</label>
                    <input type="date" class="form-control @error('birth_date') is-invalid @enderror" id="birth_date"
                        name="birth_date" value="{{ old('birth_date') }}">

                    @error('birth_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="4">{{ old('address') }}</textarea>

                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <a class="btn btn-warning" href="{{ route('customer.index') }}">
                        Cancel
                    </a>

                    <button type="submit" class="btn btn-success">
                        Submit
                    </button>
                </div>

            </form>

        </div>
    </div>

</x-app>
