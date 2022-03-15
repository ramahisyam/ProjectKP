@extends('layouts.app')

@section('content')
<div class="container">

<div class="row justify-content-end">
    <div class="col-10">
        <hr>
        <br>
        <div class="panel-heading">
            <h1 class="panel-title text-center">Super User Settings</h1>
            <hr>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><ion-icon name="chatbox-outline" class="me-1"></ion-icon>Name</span>
            <input type="text" class="form-control" placeholder="Lorem Ipsum" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><ion-icon name="call-outline" class="me-1"></ion-icon>Phone Number</span>
            <input type="text" class="form-control" placeholder="08xxx" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><ion-icon name="at-outline" class="me-1"></ion-icon>Email</span>
            <input type="text" class="form-control" placeholder="loremIpsum@telkom.co.id" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><ion-icon name="lock-closed-outline" class="me-1"></ion-icon>Password</span>
            <input type="text" class="form-control" placeholder="kthPdF32zsHRrZVb" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-primary" type="button"><ion-icon name="save-outline" class="me-1"></ion-icon>Submit</button>
        </div>
    </div>
</div>
@endsection