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
            <a href="{{ route('users') }}" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
                <ion-icon name="people-outline" class="me-2"></ion-icon><span>Users</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action py-2 ripple">
                <ion-icon name="pricetags-outline" class="me-2"></ion-icon><span>Services</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action py-2 ripple">
                <ion-icon name="settings-outline" class="me-2"></ion-icon><span>Settings</span>
            </a>
            
        </div>
    </div>
</nav>
<!-- Sidebar -->

<div class="row justify-content-end">
<div class="col-10">
<hr>
welcome
</div>
</div>
@endsection