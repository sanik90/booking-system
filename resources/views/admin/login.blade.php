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
              <h3 class="box-title">Admin Login</h3>
            </div>
            <form action="{{ route('post-login') }}" method="post">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <div>
                            <input type="email" name="email" class="form-control" value="jdoe@mail.my"  required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Password</label>
                        <div>
                            <input type="password" name="password" class="form-control" value="secret" required>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="btn-group btn-group-justified">
                        <div class="btn-group">
                            <button type="submit" class="btn btn-primary">Login</button>
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
