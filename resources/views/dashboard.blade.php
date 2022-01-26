@extends('layouts.app')

@section('content')
<br>
<div class="container">

  {{-- start of search form --}}
  <div class="row justify-content-center">
    <div class="col-md-6">
      <form action="/" method="GET">
        <div class="input-group mb-3">
          <input name="search" type="text" class="form-control" placeholder="Search here . . ." name="search">
          <button class="btn btn-outline-primary" type="submit" >Search</button>
        </div>
      </form>
    </div>
  </div>
  {{-- end of search form --}}

  {{-- table --}}
<table class="table table-bordered">
  <thead>
    <br>
    <tr>

      {{-- start of column --}}
      <th scope="col">No.</th>
      <th scope="col">Business Key</th>
      <th scope="col">Customer</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Service</th>
      <th scope="col">Bandwith</th>
      <th scope="col">Created At</th>
      <th scope="col">Latitude, Longitude</th>
      <th scope="col">Address</th>
      <th scope="col">Action</th>
      {{-- end of column --}}

    </tr>
  </thead>
  <tbody>
    <tr>
      <?php $no=1;?>
      @forelse ($customers as $index=>$customer)
      <th scope="row"> {{ $index + $customers->firstItem() }} </th>
      <td>MNI.4G_L2100_10_MHz.GIN114.1623318482865</td> {{-- businessKeyExample --}}
      <td>{{ $customer->name }}</td>
      <td>{{ $customer->phoneNumber }}</td>
      <td>{{ $customer->service->name }}</td>
      <td>123 MBps</td> {{-- bandwithExample --}}
      <td>{{$customer->created_at}}</td>
      <td>{{$customer->latitude}}, {{$customer->longitude}}</td>
      <td>{{$customer->address}}</td>
      <td><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detailModal{{ $customer->id }}">Details</button>
          <!-- Modal -->
          <div class="modal fade" id="detailModal{{ $customer->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >         
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Details</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  @foreach ($customer->service->backrooms as $backroomStatus)
                    {{ $backroomStatus->name }}
                    <br>
                    Status  : <span class="badge rounded-pill bg-secondary">{{ $backroomStatus->status->status }}</span>
                    <br>
                    Notes : {{ $backroomStatus->status->information }}
                    <hr>
                  @endforeach
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
    
    {{-- <script>
      //message with toastr
      @if(session()->has('success'))
            
         toastr.success('{{ session('success') }}', 'BERHASIL!'); 
    
      @elseif(session()->has('error'))
    
         toastr.error('{{ session('error') }}', 'GAGAL!'); 
                
      @endif
    </script> --}}

  </tbody>
</table>

{{-- pagination --}}
{{ $customers->links() }}
Showing {{$customers->firstItem()}} to {{$customers->lastItem()}} of {{$customers->total()}} entries
<br>
<br>

</div>

@endsection