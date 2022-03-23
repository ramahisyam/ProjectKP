@extends('layouts.app')

@section('content')
<div class="container mb-5 ">
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
    <div class="row justify-content-center main">
        <div class="col-10">
          <br>
          <br>
          <div class="row">
            <div class="col">
              <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <a class="btn btn-primary me-md-2 btn-sm" type="button" href="{{ route('backroom.create') }}"><ion-icon name="add-circle-outline"></ion-icon> Add New Backroom</a>
              </div>
            </div>
            <div class="col">
              {{-- start of search form --}}
              <div class="row justify-content-end">
                <div class="col-md-12">
                  <form action="/backroom" method="GET">
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
                <th scope="col">@sortablelink('name', 'Name')</th>
                <th scope="col">@sortablelink('created_at', 'Created At')</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            <?php $no=1;?>
            @forelse ($backrooms as $index=>$backroom)
              <tr>
                <th scope="row">{{ $index + $backrooms->firstItem() }}</th>
                <td>{{ $backroom->name }}</td>
                <td>{{ $backroom->created_at }}</td>
                <td>
                  <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('backroom.destroy', $backroom->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                    <a class="btn btn-warning btn-primary-spacing btn-sm" href="{{ route('backroom.edit', $backroom->id) }}"><ion-icon name="create-outline"></ion-icon></a>
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
        {{-- pagination --}}
        {{ $backrooms->onEachSide(1)->links() }}
        Showing {{$backrooms->firstItem()}} to {{$backrooms->lastItem()}} of {{$backrooms->total()}} entries
        <br>
        <br>
        </div>
    </div>
</div>
@endsection