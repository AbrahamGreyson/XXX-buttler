@extends('elektra-webartisan::_layout')

@section('formTitle')
  <h2 class="bd-title" id="content">
    Make listener
  </h2>
  <p>
    Create a new event listener class.
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
        <small class="text-muted">
          Some inline text with a small tag looks like this.
        </small>
      </div>
    </div>
    <div class="form-group row {{ $formSign or null }}">
      <label for="event" class="col-sm-2 form-control-label">Event</label>
      <div class="col-sm-10">
        <input id="event" name="event" type="input" class="form-control" autocomplete="off">
        <small class="text-muted">
          The event class being listened for.
        </small>
      </div>
    </div>
    <div class="form-group">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="queued" value="1">
          Indicates the event listener should be queued.
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
@endsection
