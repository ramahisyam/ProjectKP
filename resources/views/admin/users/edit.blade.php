@extends('layouts.app')

@section('content')
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