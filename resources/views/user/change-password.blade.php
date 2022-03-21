@extends('layouts.app')

@section('content')

<div class="container">
    <div class="panel-heading">
        <h1 class="panel-title text-center">Ubah Password</h1>
        <hr>
    </div>
    <form action="{{ route('user.settings.updatePassword') }}" method="POST" enctype="multipart/form-data" class="form-group">
    @csrf
        <div class="input-group mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Current Password</label>
            <input name="current_password" type="password" class="form-control" placeholder="Current Password" required>
        </div>
        <div class="input-group mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">New Password</label>
            <input name="new_password" type="password" class="form-control" placeholder="New Password" required>
        </div>
        <div class="input-group mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Confirm Password</label>
            <input name="new_confirm_password" type="password" class="form-control" placeholder="Confirm Password" required>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-primary"><ion-icon name="save-outline" class="me-1"></ion-icon>Submit</button> 
        </div>
    </form>
</div>
@endsection