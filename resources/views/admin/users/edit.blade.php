@extends('layouts.app')

@section('content')
<!-- Sidebar -->
<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white position-fixed" aria-haspopup="true" aria-expanded="false" v-pre>
    <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4">
            <a href="" class="list-group-item list-group-item-action py-2 ripple">
                <ion-icon name="bag-outline" class="me-2"></ion-icon><span>Customer</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action py-2 ripple">
                <ion-icon name="business-outline" class="me-2"></ion-icon><span>Backroom</span>
            </a>
            <hr>
            <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
                <ion-icon name="people-outline" class="me-2"></ion-icon><span>Users</span>
            </a>
            <a href="{{ route('service.index') }}" class="list-group-item list-group-item-action py-2 ripple active">
                <ion-icon name="pricetags-outline" class="me-2"></ion-icon><span>Services</span>
            </a>
            <a href="{{ route('backroom.index') }}" class="list-group-item list-group-item-action py-2 ripple aria-current="true">
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

<div class="container pt-4 mb-5 main">
  <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data" class="form-group">
    @csrf
    @method('PUT')
    <div class="card-panel panel-default">
      <div class="collapse show" id="col-task">
        <div class="panel-heading">
          <h1 class="panel-title text-center">Edit User</h1>
          <hr>
        </div>
        
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
                <label class="p-2">Nama</label>
                <input name="name" class="form-control @error('name') is-invalid @enderror" id="" value="{{ $user->name }}" required>
                @error('name')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
                <label class="p-2">Email</label>
                <input name="email" class="form-control @error('email') is-invalid @enderror" id="" value="{{ $user->email }}" required>
                @error('email')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="col-md-6">
                <label class="p-2">Phone Number</label>
                <input name="phoneNumber" class="form-control @error('email') is-invalid @enderror" id="" value="{{ $user->phoneNumber }}" required>
                @error('email')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
                <label class="p-2">Role</label>
                <select class="form-select" name="role" id="">
                    @foreach ($roles as $role)
                    <option value="{{ $role->id }}" 
                        @if ($role->name === $user->getRoleNames()[0])
                            selected
                        @endif>
                        {{ $role->name }}
                    </option>
                    @endforeach
                </select>
            </div>
          </div>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary float-end">Submit</button>
  </form>
</div>
@endsection