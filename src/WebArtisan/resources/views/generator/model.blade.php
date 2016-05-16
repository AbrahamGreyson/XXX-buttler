@extends('elektra-webartisan::_layout')

@section('content')
  @include('flash::message')
  <form method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
      <div class="checkbox">
        <label>
          <input type="checkbox" name="migration" value="1">
          Create a new migration file for the model.
        </label>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-12">
        <button type="submit" class="btn btn-md btn-primary center-block">
          Submit
        </button>
      </div>
    </div>
  </form>

@endsection
