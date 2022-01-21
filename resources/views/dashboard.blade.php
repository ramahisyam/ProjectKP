@extends('layouts.app')

@section('content')
<div class="container">
<table class="table table-bordered">
  <thead>
    <br>
    <tr>
      {{-- start of column --}}
      <th scope="col">No.</th>
      <th scope="col">Business Key</th>
      <th scope="col">Customer</th>
      <th scope="col">Service</th>
      <th scope="col">Bandwith</th>
      <th scope="col">Date and Time</th>
      <th scope="col">Latitude, Longitude</th>
      <th scope="col">Address</th>
      <th scope="col">Action</th>
      {{-- end of column --}}
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php $no=1;?>
      @forelse ($services as $index=>$service)
      <th scope="row"> {{ $index + $services->firstItem() }} </th>
      <td>MNI.4G_L2100_10_MHz.GIN114.1623318482865</td> {{-- businessKeyExample --}}
      <td>{{ $service->name }}</td>
      <td>{{ $service->service->name }}</td>
      <td>123 MBps</td> {{-- bandwithExample --}}
      <td>{{$service->created_at}}</td>
      <td>{{$service->latitude}}, {{$service->longitude}}</td>
      <td>{{$service->address}}</td>
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
          {{-- end of modal --}}
      </td>
      <?php $no++ ;?>
     
    </tr>

    @empty
    {{-- if empty or data not exist --}}
    <div class="alert alert-danger">
      Data belum tersedia.
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

  </tbody>
</table>

{{-- pagination --}}
{{ $services->links() }}
Showing {{$services->firstItem()}} to {{$services->lastItem()}} of {{$services->total()}} entries

</div>

@endsection