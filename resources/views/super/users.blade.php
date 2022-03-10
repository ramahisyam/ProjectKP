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
            <a href="{{ route('users') }}" class="list-group-item list-group-item-action py-2 ripple active" aria-current="true">
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
<br>
<br>

{{-- start of search form --}}
<div class="row justify-content-end">
  <div class="col-6">
    <form action="/" method="GET">
      <div class="input-group mb-3">
        <input name="search" type="text" class="form-control" placeholder="Search here . . ." value="{{request('search')}}">
        <button class="btn btn-outline-primary" type="submit" >Search</button>
      </div>
    </form>
  </div>
</div>
{{-- end of search form --}}

<table class="table table-striped table bordered">
    <thead>
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Name</th>
        <th scope="col">Phone Number</th>
        <th scope="col">Email</th>
        <th scope="col">Created At</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        <td>1</td>
        <td>
          <a class="btn btn-warning btn-primary-spacing btn-sm" href="#"><ion-icon name="create-outline"></ion-icon></a>
          <button type="submit" class="btn btn-danger btn-primary-spacing btn-sm"><ion-icon name="trash-outline"></ion-icon></button>
        </td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
        <td>2</td>
        <td>
          <a class="btn btn-warning btn-primary-spacing btn-sm" href="#"><ion-icon name="create-outline"></ion-icon></a>
          <button type="submit" class="btn btn-danger btn-primary-spacing btn-sm"><ion-icon name="trash-outline"></ion-icon></button>
        </td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Larry the Bird</td>
        <td>q</td>
        <td>@twitter</td>
        <td>3</td>
        <td>
          <a class="btn btn-warning btn-primary-spacing btn-sm" href="#"><ion-icon name="create-outline"></ion-icon></a>
          <button type="submit" class="btn btn-danger btn-primary-spacing btn-sm"><ion-icon name="trash-outline"></ion-icon></button>
        </td>
      </tr>
    </tbody>
  </table>
</div>
</div>
</div>
@endsection