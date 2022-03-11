@extends('layouts.app')

@section('content')
<div class="container">
<!-- Sidebar -->
<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
    <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4">
            <a href="#" class="list-group-item list-group-item-action py-2 ripple">
                <ion-icon name="bag-outline" class="me-2"></ion-icon><span>Customer</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action py-2 ripple">
                <ion-icon name="business-outline" class="me-2"></ion-icon><span>Backroom</span>
            </a>
            <hr>
            <a href="{{ route('super.users') }}" class="list-group-item list-group-item-action py-2 ripple">
                <ion-icon name="people-outline" class="me-2"></ion-icon><span>Users</span>
            </a>
            <a href="{{ route('super.services') }}" class="list-group-item list-group-item-action py-2 ripple">
                <ion-icon name="pricetags-outline" class="me-2"></ion-icon><span>Services</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action py-2 ripple">
              <ion-icon name="body-outline" class="me-2"></ion-icon><span>Backrooms</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action py-2 ripple active" aria-current="true">
                <ion-icon name="settings-outline" class="me-2"></ion-icon><span>Settings</span>
            </a>
            
        </div>
    </div>
</nav>
<!-- Sidebar -->

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