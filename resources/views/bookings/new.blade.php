@extends('layouts.main')

@section('content')
<header class="bg-primary text-white">
  <div class="container text-center">
    <h1>New Booking</h1>
    <p class="lead">THis is form for new booking</p>
  </div>
</header>

<section class="bg-light">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">New Booking</h3>
            </div>
            <form action="{{ route('create-booking') }}" method="post">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        <label class="control-label">Organisation</label>
                        <div>
                            <input type="text" name="organisation" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Date</label>
                        <div>
                            <input type="date" name="date" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Purpose</label>
                        <div>
                            <textarea name="purpose" row="4" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="btn-group btn-group-justified">
                        <div class="btn-group">
                            <button type="submit" class="btn btn-primary">Book</button>
                        </div>
                        <div class="btn-group">
                            <button type="reset" class="btn btn-danger">Clear</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
