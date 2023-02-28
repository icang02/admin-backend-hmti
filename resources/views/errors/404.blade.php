@extends('layouts.errors')

@section('children')
  <div class="text-center">
    <h1 class="error-number">404</h1>
    <h2>Sorry but we couldn't find this page</h2>
    <p>This page you are looking for does not exist <a href="{{ url()->previous() }}">Back to previous page?</a>
    </p>
    <div class="mid_center">
      <h3>Search</h3>
      <form action="{{ url('http://google.com') }}">
        <div class="form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-secondary" type="submit">Go!</button>
            </span>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
