@extends("admin.layouts.master")

@section("title", "Edit Bookings")

@section("content")
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Booking</h1>
        <a href="{{ route('bookings.index') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-eye fa-sm text-white-50"></i> View Bookings
        </a>
    </div>

    {{-- Alerts --}}
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <ul class="m-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- User --}}
                <div class="form-group row">
                    <label for="user_id" class="col-sm-3 col-form-label text-right font-weight-bold">User *</label>
                    <div class="col-sm-6">
                        <select class="form-control" disabled>
                            <option>Select User</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}"
                                    {{ $booking->user_id == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        <input type="hidden" name="user_id" value="{{ $booking->user_id }}">
                    </div>
                </div>

                {{-- Bookable ID --}}
                <div class="form-group row">
                    <label for="bookable_id" class="col-sm-3 col-form-label text-right font-weight-bold">Bookable ID *</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" value="{{ $booking->bookable_id }}" readonly>
                        <input type="hidden" name="bookable_id" value="{{ $booking->bookable_id }}">
                    </div>
                </div>

                {{-- Bookable Type --}}
                <div class="form-group row">
                    <label for="bookable_type" class="col-sm-3 col-form-label text-right font-weight-bold">Bookable Type *</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" value="{{ $booking->bookable_type }}" readonly>
                        <input type="hidden" name="bookable_type" value="{{ $booking->bookable_type }}">
                    </div>
                </div>

                {{-- Booking Date --}}
                <div class="form-group row">
                    <label for="booking_date" class="col-sm-3 col-form-label text-right font-weight-bold">Booking Date *</label>
                    <div class="col-sm-6">
                        <input type="date" class="form-control" value="{{ $booking->booking_date }}" readonly>
                        <input type="hidden" name="booking_date" value="{{ $booking->booking_date }}">
                    </div>
                </div>

                {{-- Booking Amount --}}
                <div class="form-group row">
                    <label for="booking_amount" class="col-sm-3 col-form-label text-right font-weight-bold">Booking Amount *</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" value="{{ $booking->booking_amount }}" readonly>
                        <input type="hidden" name="booking_amount" value="{{ $booking->booking_amount }}">
                    </div>
                </div>

                {{-- Notes --}}
                <div class="form-group row">
                    <label for="notes" class="col-sm-3 col-form-label text-right font-weight-bold">Notes</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" rows="3" readonly>{{ $booking->notes }}</textarea>
                        <input type="hidden" name="notes" value="{{ $booking->notes }}">
                    </div>
                </div>

                {{-- Status --}}
                <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label text-right font-weight-bold">Status *</label>
                    <div class="col-sm-6">
                        <input type="text" name="status" id="status" class="form-control" value="{{ old('status', $booking->status) }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="offset-3 col-sm-6">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
