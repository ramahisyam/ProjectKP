@extends('layouts.app')

@section('content')
@can('customer')
<br>
<div class="container">
  <div class="row">
    <div class="col">
      <h2 class="card-title">Dashboard Customer Request</h2>
    </div>
    <div class="col">
      {{-- start of search form --}}
      <div class="row justify-content-end">
        <div class="col-md-12">
          <form action="/" method="GET">
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
  <hr>
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
      <td id="bussinessKey{{ $index + $customers->firstItem() }}">MNI.4G_L2100_10_MHz.GIN114.1623318482865
        <button type="button" data-clipboard-target="#bussinessKey{{ $index + $customers->firstItem() }}" class="btn btn-outline-light btn-sm">Copy</button>
      </td> {{-- businessKeyExample --}}

      <td id="customerName{{ $index + $customers->firstItem() }}">{{ $customer->name }}
        <button type="button" data-clipboard-target="#customerName{{ $index + $customers->firstItem() }}" class="btn btn-outline-light btn-sm">Copy</button> 
      </td>

      <td id="phoneNumber{{ $index + $customers->firstItem() }}">{{ $customer->phoneNumber }}
        <button type="button" data-clipboard-target="#phoneNumber{{ $index + $customers->firstItem() }}" class="btn btn-outline-light btn-sm">Copy</button>
      </td>

      <td id="serviceName{{ $index + $customers->firstItem() }}">{{ $customer->service->name }}
        <button type="button" data-clipboard-target="#serviceName{{ $index + $customers->firstItem() }}" class="btn btn-outline-light btn-sm">Copy</button>
      </td>

      <td id="bandwith{{ $index + $customers->firstItem() }}">123 MBps
        <button type="button" data-clipboard-target="#bandwith{{ $index + $customers->firstItem() }}" class="btn btn-outline-light btn-sm">Copy</button>
      </td> {{-- bandwithExample --}}

      <td id="createdAt{{ $index + $customers->firstItem() }}">{{$customer->created_at}}
        <button type="button" data-clipboard-target="#createdAt{{ $index + $customers->firstItem() }}" class="btn btn-outline-light btn-sm">Copy</button>
      </td>

      <td id="latitudeLongitude{{ $index + $customers->firstItem() }}">{{$customer->latlong}}
        <button type="button" data-clipboard-target="#latitudeLongitude{{ $index + $customers->firstItem() }}" class="btn btn-outline-light btn-sm">Copy</button>
      </td>

      <td id="address{{ $index + $customers->firstItem() }}">{{$customer->address}}
        <button type="button" data-clipboard-target="#address{{ $index + $customers->firstItem() }}" class="btn btn-outline-light btn-sm">Copy</button>
      </td>
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
                  @foreach ($customer->service->backrooms as $backroom)
                    {{ $backroom->name }}
                    <br>
                    @foreach ($customer->statuses as $status)
                        @if ($status->backroom_id == $backroom->id)
                          @if ($status->name == 'Waiting to Process')
                            Status  : <span class="badge rounded-pill bg-secondary">{{ $status->name }}</span>
                          @elseif ($status->name == 'Not Ready')
                            Status  : <span class="badge rounded-pill bg-danger">{{ $status->name }}</span>
                          @elseif ($status->name == 'Ready')
                            Status  : <span class="badge rounded-pill bg-success">{{ $status->name }}</span>
                          @endif
                          <br>
                          Notes : {{ $status->information }}
                        @endif
                    @endforeach
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

  </tbody>
</table>

 

{{-- pagination --}}
{{ $customers->links() }}
Showing {{$customers->firstItem()}} to {{$customers->lastItem()}} of {{$customers->total()}} entries
<br>
<br>

</div>
@endcan
@endsection