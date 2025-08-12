@extends('user.layouts.app')

@section('title', __('User Booking'))

@section('content')

<main id="main">
    <section class="profile-dashboard">
        <div class="inner-header mb-40">
            <h3 class="title">{{ __('My Booking') }}</h3>
            <p class="des">{{ __('There are many variations of passages of Lorem Ipsum') }}</p>
        </div>

        <div class="my-booking-wrap">
            <ul class="booking-table-title flex-three">
                <li><p>{{ __('Description') }}</p></li>
                <li><p>{{ __('Status') }}</p></li>
                <li><p>{{ __('Booking Date') }}</p></li>
                {{-- <li><p>{{ __('Guests') }}</p></li> --}}
                <li><p>{{ __('Action') }}</p></li>
            </ul>

            <ul class="booking-table-content mb-60">
                @forelse($bookings as $booking)
                    <li class="flex-three">
                        <div class="booking-list flex-three">
                            <div class="content">
                                <h6 class="title-booking">
                                    <a href="#">{{ class_basename($booking->bookable_type) }}</a>
                                </h6>
                                <p class="price">{{ number_format($booking->booking_amount, 2) }}</p>
                            </div>
                        </div>

                        <div class="booking-list-table">
                            <p class="status">
                                @php
                                    $statusClass = match ($booking->status) {
                                        'successful' => 'text-light',
                                        'pending' => 'text-light',
                                        'cancelled' => 'text-light',
                                        default => 'text-light'
                                    };
                                @endphp
                                <span class="badge {{ $statusClass }}">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </p>
                        </div>

                        <div class="booking-list-table">
                            <p class="date-gues">
                                {{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}
                            </p>
                        </div>
{{--
                        <div class="booking-list-table">
                            <p class="date-gues">
                                {{ $booking->guests_count ?? 'N/A' }} {{ __('People') }}
                            </p>
                        </div> --}}

                       <div class="flex-five action-wrap">
                        <div class="action flex-five">
                            {{-- <form action="{{ route('userDestroy', $booking->id) }}"
                                method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this booking?');"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn  btn-sm" title="{{ __('Delete') }}">
                                    <i class="icon-Vector-17"></i>
                                </button>
                            </form> --}}


                            <form action="{{ route('userDestroy', $booking->id) }}"
      method="POST"
      onsubmit="return confirm('Are you sure you want to delete this booking?');"
      style="display: inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm" title="{{ __('Delete') }}">
        <i class="icon-Vector-17"></i>
    </button>
</form>

                        </div>
                    </div>

                    </li>
                @empty
                    <li>{{ __('No bookings found.') }}</li>
                @endforelse
            </ul>

            <div class="row">
                <div class="col-md-12">
                    {{ $bookings->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
