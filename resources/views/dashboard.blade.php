@extends('layouts.app')

@section('content')
<div class="container">
<table class="table table-bordered">
  <thead>
    
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Business Key</th>
      <th scope="col">Customer</th>
      <th scope="col">Service</th>
      <th scope="col">Bandwith</th>
      <th scope="col">Dates</th>
      <th scope="col">Long Lat</th>
      <th scope="col">Address</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @forelse ($blogs as $blog)
      <th scope="row">{{ $blog->id }}</th>
      <td>{{ $blog->image }}</td>
      <td>{{ $blog->title }}</td>
      <td>{{ $blog->content }}</td>
      <td>100 Mbps</td>
      <td>13-01-2022</td>
      <td>-6.232140225008921, 106.83176014567648</td>
      <td>JL. H. R. Rasuna Said X5 Kav. 11-12 Kuningan Timur, Setiabudi, Jakarta Selatan 12950 – Indonesia</td>
      <td><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal1">Details</button>
          <!-- Modal -->
          <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >         
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Details</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  WITEL 1
                  <br>
                  Status  : <span class="badge rounded-pill bg-success">OK</span>
                  <br>
                  Notes   : --
                  <hr>

                  WITEL 2
                  <br>
                  Status  : <span class="badge rounded-pill bg-danger">NOT OK</span>
                  <br>
                  Notes   : Lakukan pemeriksaan kembali atas hasil integrasi network terminal (ONT/L2SW atau NTE lainnya) dengan NE Customer untuk memastikan data atau attachment pendukung telah dipenuhi. Lengkapi variable dan atau attachment pendukung yang dibutuhkan

                  <hr>
                  WITEL 3
                  <br>
                  Status  : <span class="badge rounded-pill bg-success">OK</span>
                  <br>
                  Notes   : --
                  
                  <hr>
                  WITEL 4
                  <br>
                  Status  : <span class="badge rounded-pill bg-success">OK</span>
                  <br>
                  Notes   : --
                  
                  <hr>
                  WITEL 5
                  <br>
                  Status  : <span class="badge rounded-pill bg-success">OK</span>
                  <br>
                  Notes   : --
                  
                  <hr>
                  MSO
                  <br>
                  Status  : <span class="badge rounded-pill bg-success">OK</span>
                  <br>
                  Notes   : --
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                </div>
              </div>
            </div>
          </div>
      </td>
    </tr>
    
    

    <h1></h1>

    @empty

    <div class="alert alert-danger">
      Data Blog belum Tersedia.
    </div>

    @endforelse

    <script>
      //message with toastr
      @if(session()->has('success'))
            
         toastr.success('{{ session('success') }}', 'BERHASIL!'); 
    
      @elseif(session()->has('error'))
    
         toastr.error('{{ session('error') }}', 'GAGAL!'); 
                
      @endif
    </script>
    {{-- <!-- Start kode untuk form pencarian -->
    <form class="form" method="get" action="{{ route('search') }}">
      <div class="form-group w-100 mb-3">
          <label for="search" class="d-block mr-2">Pencarian</label>
          <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan keyword">
          <button type="submit" class="btn btn-primary mb-1">Cari</button>
      </div>
    </form>
    <!-- Start kode untuk form pencarian -->
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
    @endif --}}

  </tbody>
</table>
</div>



@endsection
