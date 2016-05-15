@extends('elektra-webartisan::_layout')

@section('content')
  <form action="" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group row">
      <label for="name" class="sm-col-2 form-control-label">Name</label>
      <div class="sm-col-10">
        <input id="name" name="name" type="input" class="form-control">
      </div>
    </div>
    <div class="form-group row">
      <div class="sm-col-12 text-center">
        <button type="submit" class="btn btn-md btn-primary">Submit</button>
      </div>
    </div>
  </form>
@endsection
