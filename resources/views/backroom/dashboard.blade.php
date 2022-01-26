@extends('layouts.app')

@section('content')

<div class="container">
  <div class="container mt-5">
    <div class="row">
      <div class="card border-0 shadow rounded">
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Business Key</th>
                <th scope="col">Customer</th>
                <th scope="col">Service</th>
                <th scope="col">Bandwith</th>
                <th scope="col">Date and Time</th>
                <th scope="col">Latitude, Longitude</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
          <tbody>
            
          <tr>
            @forelse ($services as $service)
            <th scope="row">{{ $service->id }}</th>
            <td>bussinessKeyExample</td>
            <td>{{ $service->name }}</td>
            <td>{{ $service->service->name }}</td>
            <td>bandwithExample</td>
            <td>{{$service->created_at}}</td>
            <td>{{$service->latitude}}, {{$service->longitude}}</td>
            <td>{{$service->address}}</td>
            <td><button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">Edit</button>
            <td><button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal1">Delete</button>
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >         
              <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  
                  <div class="modal-body">
                  WITEL 1
                  <br>
                  Status  : <span class="badge rounded-pill bg-secondary">WAITING RESPONSE</span>
                  <br>
                  Notes   : Notes will be displayed here.
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
        </div>
      </div>
    </div>
  </td>
</tr>

@empty
<div class="alert alert-danger">
  Data Belum Tersedia
</div>

@endforelse
<script>
//message with toastr
@if(session()->has('success'))

toastr.success('{{ session('success') }}', 'BERHASIL');     

@elseif(session()->has('error'))
    
toastr.error('{{ session('error') }}', 'GAGAL!'); 
                
@endif
</script>
</tbody>
</table>
</div>

@endsection
