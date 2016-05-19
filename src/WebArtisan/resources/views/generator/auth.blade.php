@extends('elektra-webartisan::_layout')

@section('formTitle')
  <h2 class="bd-title" id="content">
    Make auth
  </h2>
  <p>
    Scaffold basic login and registration views and routes.
  </p>
@endsection

@section('content')
  <?php
  if (session()->has('errors')) {
    $formSign = ' has-danger';
  }
  ?>
  <div class="form-group">
    <div class="checkbox">
      <label>
        <input type="checkbox" name="views" value="1">
        Only scaffold the authentication views.
      </label>
    </div>
  </div>
  {{-- // todo @see Command::makeAuth method. --}}
  {{--<div class="form-group">--}}
    {{--<div class="checkbox">--}}
      {{--<label>--}}
        {{--<input type="checkbox" name="overwrite" value="1">--}}
        {{--Overwrite if file already exists.--}}
      {{--</label>--}}
    {{--</div>--}}
  {{--</div>--}}
  <div class="form-group">
    <div class="col-sm-12">
      <button type="submit" class="btn btn-md btn-primary center-block">
        Submit
      </button>
    </div>
  </div>
@endsection
