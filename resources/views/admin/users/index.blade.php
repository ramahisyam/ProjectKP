@extends('layouts.app')

@section('content')

<div class="container pt-4 mt-5 main">

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
<div class="table-responsive">
  <table class="table table-striped table bordered">
    <thead>
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Name</th>
        <th scope="col">Phone Number</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Created At</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1;?>
      @forelse ($users as $index=>$user)
        <tr>
          <th scope="row">{{ $index + $users->firstItem() }}</th>
          <td>{{ $user->name }}</td>
          <td>{{ $user->phoneNumber }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->getRoleNames()[0] }}</td>
          <td>{{ $user->created_at }}</td>
          <td>
            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('user.destroy', $user->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <a class="btn btn-warning btn-primary-spacing btn-sm" href="{{ route('user.edit', $user->id) }}"><ion-icon name="create-outline"></ion-icon></a>
              <button type="submit" class="btn btn-danger btn-primary-spacing btn-sm"><ion-icon name="trash-outline"></ion-icon></button>
            </form>
          </td>
          <?php $no++ ;?>
        </tr>
      @empty

      {{-- if empty or data not exist --}}
      <div class="alert alert-danger">
        Data belum tersedia.
      </div>
      
      @endforelse
    </tbody>
  </table>
</div>
</div>
</div>
@endsection