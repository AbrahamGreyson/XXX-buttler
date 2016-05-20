@extends('elektra-webartisan::_layout')

@section('formTitle')
  <h2 class="bd-title" id="content">
    Make request
  </h2>
  <p>
    Create a new form request class.
  </p>
@endsection

@section('content')
    <?php
    if (session()->has('errors')) {
      $formSign = ' has-danger';
    }
    ?>
    <div class="form-group row {{ $formSign or null }}">
      <label for="name" class="col-sm-2 form-control-label">Name</label>
      <div class="col-sm-10">
        <input id="name" name="name" type="input" class="form-control" autocomplete="off">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-12">
        <button type="submit" class="btn btn-md btn-primary center-block">
          Submit
        </button>
      </div>
    </div>
@endsection
