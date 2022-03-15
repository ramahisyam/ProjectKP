@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5 main">
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
        <h2 class="card-title">Input Service</h2>
        <hr>
        <form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Service</label>
              <div class="col-sm-10">
                <input id="search" name="name" type="name" class="form-control @error('name') is-invalid @enderror" id="inputEmail3" placeholder="Nama Service" value="{{ old('name') }}">
                @error('name')
                  <div class="alert alert-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            
            <h5>Backroom</h5>
            <hr>
            <div id="backroom">
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Backroom A</label>
                <div class="col-sm-10">
                  <select name="backroom[]" class="form-select @error('backroom') is-invalid @enderror">
                    <option>-----Pilih Backroom-----</option>  
                    @foreach ($backrooms as $backroom)
                      @if (old('witel'))
                        <option value="{{ $backroom->id }}" {{ in_array($backroom->id, old('backroom')) ? 'selected' : '' }}>{{ $backroom->name }}</option>
                      @else
                        <option value="{{ $backroom->id }}">{{ $backroom->name }}</option>  
                      @endif
                    @endforeach
                  </select>
                  @error('backroom')
                    <div class="alert alert-danger mt-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col">
                <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary float-end">Tambahkan Backroom</button>
              </div>
            </div>
            <hr>
          <button type="submit" class="btn btn-primary float-end">Submit</button>
        </form>
    </div>
    <script type="text/javascript">
      var i = 0;
      $("#dynamic-ar").click(function () {
          ++i;
          $("#backroom").append('<div id="div" class="row mb-3"><label class="col-sm-2 col-form-label">Backroom '+ String.fromCharCode(65 + i) +'</label><div class="col-sm-8"><select name="backroom[]" class="form-select"><option>-----Pilih Witel-----</option>@foreach ($backrooms as $backroom)<option value="{{ $backroom->id }}">{{ $backroom->name }}</option>@endforeach</select></div><div class="col-sm-2"><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></div></div>');                
      });
      $(document).on('click', '.remove-input-field', function () {
          $(this).parents('#div').remove();
          --i;
      });
  </script>
@endsection