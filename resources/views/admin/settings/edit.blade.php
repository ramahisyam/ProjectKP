@extends('layouts.app')

@section('content')
<!-- Sidebar -->
<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white" aria-haspopup="true" aria-expanded="false" v-pre>
    <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4">
            <a href="" class="list-group-item list-group-item-action py-2 ripple">
                <ion-icon name="bag-outline" class="me-2"></ion-icon><span>Customer</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action py-2 ripple">
                <ion-icon name="business-outline" class="me-2"></ion-icon><span>Backroom</span>
            </a>
            <hr>
            <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action py-2 ripple">
                <ion-icon name="people-outline" class="me-2"></ion-icon><span>Users</span>
            </a>
            <a href="{{ route('service.index') }}" class="list-group-item list-group-item-action py-2 ripple">
                <ion-icon name="pricetags-outline" class="me-2"></ion-icon><span>Services</span>
            </a>
            <a href="{{ route('backroom.index') }}" class="list-group-item list-group-item-action py-2 ripple aria-current="true">
                <ion-icon name="body-outline" class="me-2"></ion-icon><span>Backroom & Witel</span>
            </a>
            <a class="list-group-item list-group-item-action py-2 ripple active"
            data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-haspopup="true" aria-expanded="false" aria-controls="multiCollapseExample1">
                <ion-icon name="settings-outline" class="me-2"></ion-icon><span>Settings</span>
            </a>
            <!-- Collapsed content -->
            <ul
              id="multiCollapseExample1"
              class="collapse list-group list-group-flush ms-4"
              >
                <li class="list-group-item py-1">
                    <a href="{{ route('admin.edit') }}" class="dropdown-item">Edit Profile</a>
                </li>
                <li class="list-group-item py-1">
                    <a href="{{ route('changePassword') }}" class="dropdown-item">Ubah Password</a>
                </li>
            </ul>
            
        </div>
    </div>
</nav>
<!-- Sidebar -->

<div class="container main">

    <div class="panel-heading">
        <h1 class="panel-title text-center">Edit Profile Admin</h1>
        <hr>
    </div>
    <form action="{{ route('admin.update') }}" method="POST" enctype="multipart/form-data" class="form-group">
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