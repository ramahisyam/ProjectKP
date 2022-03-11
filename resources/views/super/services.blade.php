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
    <div class="row">
      <div class="col">
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
          <a class="btn btn-primary me-md-2 btn-sm" type="button" href="{{ route('customer.create') }}"><ion-icon name="add-circle-outline"></ion-icon> Add New Customer</a>
        </div>
      </div>
      <div class="col">
        {{-- start of search form --}}
        <div class="row justify-content-end">
          <div class="col-md-12">
            <form action="/" method="GET">
              <div class="input-group mb-3">
                <input name="search" type="text" class="form-control" placeholder="Search here . . ." value="{{request('search')}}">
                <button class="btn btn-outline-primary" type="submit" >Search</button>
              </div>
            </form>
          </div>
        </div>
        {{-- end of search form --}}
      </div>
    </div>
    <table class="table table-striped table bordered">
      <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Name</th>
          <th scope="col">Backroom</th>
          <th scope="col">Created At</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>
            <span class="badge rounded-pill bg-dark">Witel 1</span>
            <span class="badge rounded-pill bg-dark">Witel 2</span>
            <span class="badge rounded-pill bg-dark">Witel 3</span>
          </td>
          <td>@mdo</td>
          <td>
            <a class="btn btn-warning btn-primary-spacing btn-sm" href="{{ route('super.edit') }}"><ion-icon name="create-outline"></ion-icon></a>
            <button type="submit" class="btn btn-danger btn-primary-spacing btn-sm"><ion-icon name="trash-outline"></ion-icon></button>
          </td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Jacob</td>
          <td>
            <span class="badge rounded-pill bg-dark">Witel 1</span>
            <span class="badge rounded-pill bg-dark">Witel 2</span>
            <span class="badge rounded-pill bg-dark">Witel 3</span>
          </td>
          <td>@fat</td>
          <td>
            <a class="btn btn-warning btn-primary-spacing btn-sm" href="{{ route('super.edit') }}"><ion-icon name="create-outline"></ion-icon></a>
            <button type="submit" class="btn btn-danger btn-primary-spacing btn-sm"><ion-icon name="trash-outline"></ion-icon></button>
          </td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Larry the Bird</td>
          <td>
            <span class="badge rounded-pill bg-dark">Witel 1</span>
            <span class="badge rounded-pill bg-dark">Witel 2</span>
            <span class="badge rounded-pill bg-dark">Witel 3</span>
          </td>
          <td>@twitter</td>
          <td>
            <a class="btn btn-warning btn-primary-spacing btn-sm" href="{{ route('super.edit') }}"><ion-icon name="create-outline"></ion-icon></a>
            <button type="submit" class="btn btn-danger btn-primary-spacing btn-sm"><ion-icon name="trash-outline"></ion-icon></button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection