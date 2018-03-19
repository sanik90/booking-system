@extends('layouts.main')

@section('content')
@include('includes.header-content')

<section class="bg-light">
  <div class="container">

    @include('includes.flash-message')

    <div class="row">
      <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Booking</h3>
            </div>
                <div class="box-body">
                    <div class="form-group">
                        <label class="control-label">Status</label>
                        <div>
                            @if ($booking->status == 0)
                            <button type="button" class="btn btn-warning btn-block">{{ $booking->status_human }}</button>
                            @elseif ($booking->status == 1)
                            <button type="button" class="btn btn-primary btn-block">{{ $booking->status_human }}</button>
                            @else
                            <button type="button" class="btn btn-danger btn-block">{{ $booking->status_human }}</button>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Organisation</label>
                        <div>
                            <input type="text" class="form-control" value="{{ $booking->organisation }}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <div>
                            <input type="email" class="form-control" value="{{ $booking->email }}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Date</label>
                        <div>
                            <input type="text" class="form-control" value="{{ $booking->date_start }}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Purpose</label>
                        <div>
                            <textarea row="4" class="form-control" disabled>{{ $booking->purpose }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Attachment(s)</label>
                        @foreach ($booking->attachments as $attachment)
                        <div class="mt-2"><a href="{{ \Storage::disk('public_attachments')->url($attachment->name) }}" type="button" class="btn btn-primary btn-block" target="_blank">{{ $attachment->name }}</a></div>
                        @endforeach
                    </div>

                    @if ($booking->status == 0)
                    <form action="{{ route('approve-booking', $booking->id) }}" method="post">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-primary btn-block">Approve</button>
                    </form>
                    <br>
                    <form action="{{ route('reject-booking', $booking->id) }}" method="post">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-block">Reject</button>
                    </form>
                    @elseif ($booking->status == 1)
                    <form action="{{ route('reject-booking', $booking->id) }}" method="post">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-block">Reject</button>
                    </form>
                    @else
                    <form action="{{ route('approve-booking', $booking->id) }}" method="post">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-primary btn-block">Approve</button>
                    </form>
                    @endif
                </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
