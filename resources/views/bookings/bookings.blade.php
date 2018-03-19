@extends('layouts.main')

@section('content')
@include('includes.header-content')

<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 mx-auto">
        <h2>Bookings</h2>
        @if ($bookings)
          @foreach ($bookings as $booking)
          <p class="lead">Company/Entity: {{ $booking->organisation }}</p>
          <p>Status: {{ $booking->status_human }}</p>
          <p>Booked at: {{ $booking->created_at->format('d-m-Y') }}</p>
          <p><a href="{{ route('booking', $booking->id) }}">More...</a></p>
          @endforeach
          {{ $bookings->links("pagination::bootstrap-4") }}
        @else
          <p class="lead">No booking :(</p>
        @endif
      </div>
    </div>
  </div>
</section>
@endsection
