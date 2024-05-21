@extends('layouts.user')
@section('content')
<div class="container d-flex flex-column align-items-center justify-content-center vh-100">
    <h1>Profile</h1>
    @if ($message = Session::get('success'))
    <div class="alert alert-success w-50" role="alert">
    {{ $message }}
    </div>
    @endif
    <form class="col-lg-8 col-sm-0" method="POST" action="{{ url('profile') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required value="{{ auth()->user()->name }}">
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" name="email" required value="{{ auth()->user()->email }}">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" aria-describedby="passwordHelp" name="password">
          <div id="passwordHelp" class="form-text text-white">Leave it blank if you don't want to update the password.</div>
        </div>
        <button type="submit" class="btn btn-primary w-100">Submit</button>
    </form>
</div>
@endsection