@extends('layouts.app')

@section('content')
@can('accountManager')
<br>
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
          <form action="/customer" method="GET">
            <div class="input-group mb-3">
              <input name="search" type="text" class="form-control" placeholder="Search here . . ." value="{{request('search')}}">
              <button class="btn btn-outline-primary" type="submit" ><ion-icon name="search-outline"></ion-icon></button>
            </div>
          </form>
        </div>
      </div>
      {{-- end of search form --}}
    </div>
  </div>
  <hr>

  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a class="btn btn-primary me-md-2 btn-sm" type="button" href="{{ route('customer.create') }}"><ion-icon name="add-circle-outline"></ion-icon> Add New Customer</a>
  </div>

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
      <th scope="col">@sortablelink('capacity', 'Capacity')</th>
      <th scope="col">@sortablelink('created_at', 'Created At')</th>
      <th scope="col">@sortablelink('latlong', 'Latitude, Longitude')</th>
      <th scope="col">@sortablelink('address', 'Address')</th>
      <th scope="col">@sortablelink('created_at', 'Created At')</th>
      <th scope="col">Action</th>
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
        {{-- <!-- Button trigger modal -->
        <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#mapModal{{ $customer->id }}"><ion-icon name="locate-outline"></ion-icon></button>

        <!-- Modal -->
        <div class="modal fade" id="mapModal{{ $customer->id }}" tabindex="-1" aria-labelledby="mapModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="mapModalLabel">Map Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <iframe src="https://www.google.com/maps/embed/v1/view?key=AIzaSyAD7NT9H6NnUXf8jN7w0jd4ZnoibDWMy-o&center={{$customer->latlong}}&zoom=18" width="450" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div> --}}

      </td>

      <td id="address{{ $index + $customers->firstItem() }}">{{$customer->address}}
        <button type="button" data-clipboard-target="#address{{ $index + $customers->firstItem() }}" class="btn btn-outline-light btn-sm"><ion-icon name="clipboard-outline"></ion-icon></button>
      </td>

      <td id="createdAt{{ $index + $customers->firstItem() }}">{{$customer->created_at}}
        <button type="button" data-clipboard-target="#createdAt{{ $index + $customers->firstItem() }}" class="btn btn-outline-light btn-sm"><ion-icon name="clipboard-outline"></ion-icon></button>
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
                  @foreach ($customer->statuses as $backroom)
                    {{ $backroom->backroom->name }}
                    <br>
                    @if ($backroom->customer_request_id == $customer->id)
                      @if ($backroom->name == 'Waiting to Process')
                      <ion-icon name="stats-chart-outline" class="me-1"></ion-icon>Status  : <span class="badge rounded-pill bg-secondary"><ion-icon name="hourglass-outline" class="me-1"></ion-icon>{{ $backroom->name }}</span>
                      @elseif ($backroom->name == 'Not Ready')
                      <ion-icon name="stats-chart-outline" class="me-1"></ion-icon>Status  : <span class="badge rounded-pill bg-danger"><ion-icon name="alert-circle-outline" class="me-1"></ion-icon>{{ $backroom->name }}</span>
                      @elseif ($backroom->name == 'Ready')
                      <ion-icon name="stats-chart-outline" class="me-1"></ion-icon>Status  : <span class="badge rounded-pill bg-success"><ion-icon name="checkmark-done-outline" class="me-1"></ion-icon>{{ $backroom->name }}</span>
                      @endif
                      <br>
                      <ion-icon name="book-outline" class="me-1"></ion-icon>Notes : {{ $backroom->information }}
                      <br>
                      {{-- <button type="button" class="btn btn-primary" data-toggle="popover" title="User Info">Popover with Title</button> --}}
                      @if ($backroom->image == NULL)
                        Image : <a class="btn btn-info btn-sm rounded-pill disabled">No Image</a>
                      @else
                        Image : <a class="btn btn-info btn-sm rounded-pill" data-toggle="popover" data-img="{{ Storage::url('public/backroomStatuses/'.$backroom->image) }}" title="Evidence" >Show Image</a>
                        <a href="{{ Storage::url('public/backroomStatuses/'.$backroom->image) }}" download class="btn btn-light btn-sm rounded-pill" target="_blank" rel="noopener noreferrer"><ion-icon name="download-outline"></ion-icon></a>
                      @endif
                    @endif
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
          @foreach ($customer->statuses as $backroom)
            @if ($backroom->customer_request_id == $customer->id)
              @if ($backroom->name == 'Waiting to Process')
                <span class="badge rounded-pill bg-secondary"><ion-icon name="hourglass-outline" class="me-1"></ion-icon>{{ $backroom->backroom->name }}</span>
              @elseif ($backroom->name == 'Not Ready')
                <span class="badge rounded-pill bg-danger"><ion-icon name="alert-circle-outline" class="me-1"></ion-icon>{{ $backroom->backroom->name }}</span>
              @elseif ($backroom->name == 'Ready')
                <span class="badge rounded-pill bg-success"><ion-icon name="checkmark-done-outline" class="me-1"></ion-icon>{{ $backroom->backroom->name }}</span>
              @endif
            @endif
          @endforeach
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
