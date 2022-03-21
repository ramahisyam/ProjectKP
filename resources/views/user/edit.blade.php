@extends('layouts.app')

@section('content')

<div class="container">
    <div class="panel-heading">
        <h1 class="panel-title text-center">Edit Profile</h1>
        <hr>
    </div>
    <form action="{{ route('user.settings.update') }}" method="POST" enctype="multipart/form-data" class="form-group">
    @method('PUT')
    @csrf
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><ion-icon name="chatbox-outline" class="me-1"></ion-icon>Name</span>
            <input name="name" type="text" class="form-control" value="{{ auth()->user()->name }}" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><ion-icon name="at-outline" class="me-1"></ion-icon>Email</span>
            <input name="email" type="email" class="form-control"  value="{{ auth()->user()->email }}" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><ion-icon name="call-outline" class="me-1"></ion-icon>Phone Number</span>
            <input name="phoneNumber" type="tel" class="form-control" value="{{ auth()->user()->phoneNumber }}" required>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-primary"><ion-icon name="save-outline" class="me-1"></ion-icon>Submit</button> 
        </div>
    </form>
</div>
@endsection