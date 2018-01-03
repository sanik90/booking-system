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
                            <input type="text" class="form-control" value="{{ $booking->date }}" disabled>
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
                        <div class="mt-2"><a href="{{url('/')}}/{{ \Storage::disk('public')->url($attachment->name) }}" type="button" class="btn btn-primary btn-block">{{ $attachment->name }}</a></div>
                        @endforeach
                    </div>
                </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
