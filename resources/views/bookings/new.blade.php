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
              <h3 class="box-title">New Booking</h3>
            </div>
            <form action="{{ route('create-booking') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        <label class="control-label">Organisation</label>
                        <div>
                            <input type="text" name="organisation" class="form-control" value="Apple Inc." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <div>
                            <input type="email" name="email" class="form-control" value="apple@apple.my" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Date</label>
                        <div>
                            <input type="date" name="date_start" class="form-control" value="2018-01-01" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Purpose</label>
                        <div>
                            <textarea name="purpose" row="4" class="form-control">World Tour</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Attachment
                          <a href="" id="add-button" class="btn btn-primary btn-sm" aria-label="Settings">
                              <i class="fas fa-plus" aria-hidden="true"></i>
                          </a>
                          <span id="remove-all"></span>
                        </label>
                        <div id="alert-exceed" class="row">
                            <div class="col-lg-12">
                                <p class="alert alert-danger">Max only 5</p>
                            </div>
                        </div>
                        <div id="more-file" class="mt-2">
                            <input type="file" name="attachment[]" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="btn-group btn-group-justified btn-block">
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

@section('jquery')
<script>
    $(document).ready(function() {
        $("#alert-exceed").hide();
        var max_fields = 5;
        var x = 1;
        $("#add-button").click(function(e) {
            e.preventDefault();
            if (x < max_fields) {
                x++;
                $("#more-file").append('<div class="mt-2 input-group margin-bottom-sm"><input type="file" name="attachment[]" class="form-control"><a href="" id="remove-button" class="input-group-addon btn btn-primary btn-sm" aria-label="Remove All"><i class="fas fa-times" aria-hidden="true"></i></a></div>');
                $("#remove-all").html('<a href="" id="remove-all-button" class="btn btn-primary btn-sm" aria-label="Remove All"><i class="fas fa-times" aria-hidden="true"> Remove All</i></a>');
            } else if (x = max_fields) {
                $("#alert-exceed").show();
            }
        });

        $("#remove-all-button").click(function(e) {
            e.preventDefault();
            $("#more-file").html('<input type="file" name="attachment[]" class="form-control">');
            $("#alert-exceed").hide();
        });

        $("#more-file").on("click","#remove-button", function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
            if (x == 1) {
                $("#alert-exceed").hide();
                $("#remove-all").html('');
            }
        })
    });
</script>
@endsection
