@extends('layouts.app')

@section('content')
<div id="app">
        
</div>
<br>
<div class="container">
  <div class="row">
    <div class="col">
      <h2 class="card-title">Dashboard Backroom</h2>
    </div>
    <div class="col">
      {{-- start of search form --}}
      <div class="row justify-content-end">
        <div class="col-md-12">
          <form action="/backroom/task" method="GET">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Search here . . ." name="search">
              <button class="btn btn-outline-primary" type="submit" ><ion-icon name="search-outline"></ion-icon></button>
            </div>
          </form>
        </div>
      </div>
      {{-- end of search form --}}
    </div>
  </div>
  <hr>
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
      <th scope="col">Kapasitas</th>
      <th scope="col">@sortablelink('created_at', 'Created At')</th>
      <th scope="col">@sortablelink('latlong', 'Latitude, Longitude')</th>
      <th scope="col">@sortablelink('address', 'Address')</th>
      <th scope="col">@sortablelink('created_at', 'Created At')</th>
      <th scope="col" colspan="2">Action</th>
      {{-- end of column --}}

    </tr>
  </thead>
  <tbody>
    <tr>
      <?php $no=1;?>
      @forelse ($customers as $index=>$customer)
      <th scope="row"> {{ $index + $customers->firstItem() }} </th>
      <td id="bussinessKey{{ $index + $customers->firstItem() }}">{{ $customer->business_key }}
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

      <td id="capacity{{ $index + $customers->firstItem() }}">{{ $customer->capacity }}
        <button type="button" data-clipboard-target="#capacity{{ $index + $customers->firstItem() }}" class="btn btn-outline-light btn-sm"><ion-icon name="clipboard-outline"></ion-icon></button>
      </td>

      <td id="assignee{{ $index + $customers->firstItem() }}">
        {{ $customer->user->name }}
        <span class="badge rounded-pill bg-light text-dark">{{ $customer->user->phoneNumber }}</span>
        <button type="button" data-clipboard-target="#assignee{{ $index + $customers->firstItem() }}" class="btn btn-outline-light btn-sm"><ion-icon name="clipboard-outline"></ion-icon></button>
      </td>

      <td id="latitudeLongitude{{ $index + $customers->firstItem() }}"><a href="{{ url('http://www.google.com/maps/place/' . $customer->latlong) }}" target="_blank" rel="noopener noreferrer">{{$customer->latlong}}</a>
        <button type="button" data-clipboard-target="#latitudeLongitude{{ $index + $customers->firstItem() }}" class="btn btn-outline-light btn-sm"><ion-icon name="clipboard-outline"></ion-icon></button>
      </td>

      <td id="address{{ $index + $customers->firstItem() }}">{{$customer->address}}
        <button type="button" data-clipboard-target="#address{{ $index + $customers->firstItem() }}" class="btn btn-outline-light btn-sm"><ion-icon name="clipboard-outline"></ion-icon></button>
      </td>

      <td id="createdAt{{ $index + $customers->firstItem() }}">{{$customer->created_at}}
        <button type="button" data-clipboard-target="#createdAt{{ $index + $customers->firstItem() }}" class="btn btn-outline-light btn-sm"><ion-icon name="clipboard-outline"></ion-icon></button>
      </td>
      
      <td>
        {{-- <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detailModal{{ $customer->id }}"><ion-icon name="information-circle-outline"></ion-icon></button> --}}
        @foreach ($customer->statuses as $status)
          <div class="container">
            <div class="row">
              <div class="col">
                <a href="{{ route('backroomtask.edit', $status->id) }}" class="btn btn-warning align-middle rounded-pill btn-sm"><ion-icon name="create-outline"></ion-icon> Edit</a>
              </div>
            </div>
            <div class="row">
              <div class="col">
                @if ($status->name == 'Waiting to Process')
                <span class="badge rounded-pill bg-secondary"><ion-icon name="hourglass-outline" class="me-1"></ion-icon>{{ $status->name }}</span>
                @elseif ($status->name == 'Not Ready')
                <span class="badge rounded-pill bg-danger"><ion-icon name="alert-circle-outline" class="me-1"></ion-icon>{{ $status->name }}</span>
                @elseif ($status->name == 'Ready')
                <span class="badge rounded-pill bg-success"><ion-icon name="checkmark-done-outline" class="me-1"></ion-icon>{{ $status->name }}</span>
                @endif
              </div>
            </div>
          </div>
        @endforeach
      </td>
          <!-- Modal -->
          <div class="modal fade" id="detailModal{{ $customer->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >         
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Details</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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

@endsection