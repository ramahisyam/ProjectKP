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

  @can('input customer request')
  
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
      <a class="btn btn-primary me-md-2 btn-sm" type="button" href="{{ route('customer.create') }}"><ion-icon name="add-circle-outline"></ion-icon> Add New Customer</a>
    </div>
                            
  @endcan

  {{-- table --}}
<table class="table table-striped table-bordered">
  <thead>
    <br>
    <tr>

      {{-- start of column --}}
      <th scope="col">No.</th>
      <th scope="col">@sortablelink('id', 'Business Key')</th>
      <th scope="col">@sortablelink('name', 'Customer')</th>
      <th scope="col">@sortablelink('phoneNumber', 'Phone Number')</th>
      <th scope="col">@sortablelink('service_id', 'Service')</th>
      <th scope="col">Bandwith</th>
      <th scope="col">@sortablelink('created_at', 'Created At')</th>
      <th scope="col">@sortablelink('latlong', 'Latitude, Longitude')</th>
      <th scope="col">@sortablelink('address', 'Address')</th>
      <th scope="col">Action</th>
      {{-- end of column --}}

    </tr>
  </thead>
  <tbody>
    <tr>
      <?php $no=1;?>
      @forelse ($customers as $index=>$customer)
      <th scope="row"> {{ $index + $customers->firstItem() }} </th>
      <td id="bussinessKey{{ $index + $customers->firstItem() }}">OLO{{$customer->id}}
        <button type="button" data-clipboard-target="#bussinessKey{{ $index + $customers->firstItem() }}" class="btn btn-outline-light btn-sm"><ion-icon name="clipboard-outline"></ion-icon></button>
      </td> {{-- businessKeyExample --}}

      <td id="customerName{{ $index + $customers->firstItem() }}">{{ $customer->name }}
        <button type="button" data-clipboard-target="#customerName{{ $index + $customers->firstItem() }}" class="btn btn-outline-light btn-sm"><ion-icon name="clipboard-outline"></ion-icon></button> 
      </td>

      <td id="phoneNumber{{ $index + $customers->firstItem() }}">{{ $customer->phoneNumber }}
        <button type="button" data-clipboard-target="#phoneNumber{{ $index + $customers->firstItem() }}" class="btn btn-outline-light btn-sm"><ion-icon name="clipboard-outline"></ion-icon></button>
      </td>

      <td id="serviceName{{ $index + $customers->firstItem() }}">{{ $customer->service->name }}
        <button type="button" data-clipboard-target="#serviceName{{ $index + $customers->firstItem() }}" class="btn btn-outline-light btn-sm"><ion-icon name="clipboard-outline"></ion-icon></button>
      </td>

      <td id="bandwith{{ $index + $customers->firstItem() }}">123 MBps
        <button type="button" data-clipboard-target="#bandwith{{ $index + $customers->firstItem() }}" class="btn btn-outline-light btn-sm"><ion-icon name="clipboard-outline"></ion-icon></button>
      </td> {{-- bandwithExample --}}

      <td id="createdAt{{ $index + $customers->firstItem() }}">{{$customer->created_at}}
        <button type="button" data-clipboard-target="#createdAt{{ $index + $customers->firstItem() }}" class="btn btn-outline-light btn-sm"><ion-icon name="clipboard-outline"></ion-icon></button>
      </td>

      <td id="latitudeLongitude{{ $index + $customers->firstItem() }}">{{$customer->latlong}}
        <button type="button" data-clipboard-target="#latitudeLongitude{{ $index + $customers->firstItem() }}" class="btn btn-outline-light btn-sm"><ion-icon name="clipboard-outline"></ion-icon></button>
      </td>

      <td id="address{{ $index + $customers->firstItem() }}">{{$customer->address}}
        <button type="button" data-clipboard-target="#address{{ $index + $customers->firstItem() }}" class="btn btn-outline-light btn-sm"><ion-icon name="clipboard-outline"></ion-icon></button>
      </td>
      <td width=200px>
        <div class="flex-parent jc-center">
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
                          <br>
                          Evidence  : <a class="btn btn-info btn-sm rounded-pill" data-toggle="popover" data-img="https://i.pinimg.com/originals/d0/5b/e1/d05be16718dd01da9acb911e32d4136d.jpg" title="Evidence" >Show Evidence</a>
                          <a href="https://i.pinimg.com/originals/d0/5b/e1/d05be16718dd01da9acb911e32d4136d.jpg" download class="btn btn-light btn-sm rounded-pill" target="_blank" rel="noopener noreferrer"><ion-icon name="download-outline"></ion-icon></a>
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
          <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('customer.destroy', $customer->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <a type="button" class="btn btn-info btn-sm btn-primary-spacing" data-bs-toggle="modal" data-bs-target="#detailModal{{ $customer->id }}"><ion-icon name="information-circle-outline"></ion-icon></a>
          <a class="btn btn-warning btn-primary-spacing btn-sm" href="{{ route('customer.edit', $customer->id) }}"><ion-icon name="create-outline"></ion-icon></a>
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
{{ $customers->onEachSide(1)->links() }}
Showing {{$customers->firstItem()}} to {{$customers->lastItem()}} of {{$customers->total()}} entries
<br>
<br>

</div>
@endcan
@endsection
