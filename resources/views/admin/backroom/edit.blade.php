@extends('layouts.app')

@section('content')
<!-- Sidebar -->
<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white position-fixed" aria-haspopup="true" aria-expanded="false" v-pre>
    <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4">
            <a href="{{ route('customer.admin') }}" class="list-group-item list-group-item-action py-2 ripple">
                <ion-icon name="bag-outline" class="me-2"></ion-icon><span>Customer</span>
            </a>
            <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
                <ion-icon name="people-outline" class="me-2"></ion-icon><span>Users</span>
            </a>
            <a href="{{ route('service.index') }}" class="list-group-item list-group-item-action py-2 ripple">
                <ion-icon name="pricetags-outline" class="me-2"></ion-icon><span>Services</span>
            </a>
            <a href="{{ route('backroom.index') }}" class="list-group-item list-group-item-action py-2 ripple active aria-current="true">
                <ion-icon name="body-outline" class="me-2"></ion-icon><span>Backroom & Witel</span>
            </a>
            <a class="list-group-item list-group-item-action py-2 ripple"
            data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
                <ion-icon name="settings-outline" class="me-2"></ion-icon><span>Settings</span>
            </a>
            <ul
                id="multiCollapseExample1"
                class="collapse list-group list-group-flush ms-4"
                >
            <li class="list-group-item py-1">
                <a href="{{ route('admin.edit') }}" class="dropdown-item">Edit Profile</a>
            </li>
            <li class="list-group-item py-1">
                <a href="{{ route('updatePassword') }}" class="dropdown-item">Ubah Password</a>
            </li>
            </ul>     
        </div>
    </div>
</nav>
<!-- Sidebar -->

<div class="container mt-5 mb-5 main">
    <h2 class="card-title">Edit Backroom / Witel</h2>
    <hr>
    <form action="{{ route('backroom.update', $backroom->id) }}" method="POST" enctype="multipart/form-data" class="form-group">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Backroom / Witel</label>
            <div class="col-sm-10">
            <input id="search" name="name" type="name" class="form-control @error('name') is-invalid @enderror" id="inputEmail3" placeholder="Nama Service" value="{{ $backroom->name }}">
            @error('name')
                <div class="alert alert-danger mt-2">
                {{ $message }}
                </div>
            @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary float-end">Submit</button>
    </form>
</div>
@endsection