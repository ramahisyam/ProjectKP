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
            <a href="{{ route('super.services') }}" class="list-group-item list-group-item-action py-2 ripple active" aria-current="true">
                <ion-icon name="pricetags-outline" class="me-2"></ion-icon><span>Services</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action py-2 ripple">
                <ion-icon name="body-outline" class="me-2"></ion-icon><span>Backrooms</span>
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
        <br>
        <br>
        <div class="container mt-4 mb-5">
            <form action="#" method="POST" enctype="multipart/form-data" class="form-group">
                @csrf
                @method('PATCH')
                <div class="card-panel panel-default">
                    <div class="collapse show" id="col-task">
                        <div class="panel-heading">
                            <h1 class="panel-title text-center">Edit Services</h1>
                            <hr>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="p-2">Name</label>
                                    <input name="name" class="form-control" id="" value="#">
                                </div>
                                <div class="col-md-6">
                                    <label class="p-2">Backroom</label>
                                    <select class="form-select" name="service_id" id="">

                                    </select>
                                    <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-danger float-end">Delete</button>
                                    <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary float-end">Add New Backroom</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary float-end">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection