@extends('layouts.app')

@section('content')
<div class="container mt-4 mb-5">
  <form action="{{ route('customer.update', $customer->id) }}" method="POST" enctype="multipart/form-data" class="form-group">
    @csrf
    @method('PATCH')
    <div class="card-panel panel-default">
      <div class="collapse show" id="col-task">
        <div class="panel-heading">
          <h1 class="panel-title text-center">Edit Customer Request</h1>
          <hr>
        </div>
        
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <label class="p-2">Bussiness Key</label>
              <input class="form-control" id="" value="MNI.4G_L2100_10_MHz.GIN114.1623318482865">
              <label class="p-2">Customer</label>
              <input name="name" class="form-control" id="" value="{{ $customer->name }}">
              {{-- <label class="p-2">Service</label>
              <select class="form-select" name="service_id" id="">
                @foreach ($services as $service)
                  <option value="{{ $service->id }}" 
                    @if ($service->id === $customer->service_id)
                        selected
                    @endif>
                    {{ $service->name }}
                  </option>
                @endforeach
              </select> --}}
              <label class="p-2">Address</label>
              <input name="address" class="form-control" id="" value="{{ $customer->address }}">
            </div>
            
            <div class="col-md-6">
              <label class="p-2">Bandwith</label>
              <input class="form-control" id="" value="123 MBps">
              <label class="p-2">Latlong</label>
              <input name="latlong" class="form-control" id="" value="{{ $customer->latlong }}">
              <label class="p-2">Phone Number</label>
              <input name="phoneNumber" class="form-control" id="" value="{{ $customer->phoneNumber }}">
            </div>
          </div>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary float-end">Submit</button>
  </form>
</div>
@endsection