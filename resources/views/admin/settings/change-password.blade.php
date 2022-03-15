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
                    <a href="" class="dropdown-item">Ubah Password</a>
                </li>
            </ul>
            
        </div>
    </div>
</nav>
<!-- Sidebar -->
<div class="panel-heading">
    <h1 class="panel-title text-center">Ubah Password Admin</h1>
    <hr>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('updatePassword') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">Current Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required autofocus>

                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required autocomplete="new-password">

                                @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="new_confirm_password" required>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection