@extends('layouts.errors')

@section('children')
  <div class="text-center">
    <h1 class="error-number">403</h1>
    <h2>Access denied</h2>
    <p>Full authentication is required to access this resource. <a href="{{ url()->previous() }}">Back to
        previous page?</a>
    </p>
    <div class="mid_center">
      <h3>Search</h3>
      <form>
        <div class="  form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-secondary" type="button">Go!</button>
            </span>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
