@extends('layouts.app')

@section('content')
<div class="container mt-4 mb-5">
  <form action="{{ route('backroom.update', $status->id) }}" method="POST" enctype="multipart/form-data" class="form-group">
    @csrf
    @method('PUT')
    <div class="card-panel panel-default">
      <div class="collapse show" id="col-task">
        <div class="panel-heading">
          <h1 class="panel-title"><center>Task Information</center></h1>
        </div>
        
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <label>Bussiness Key</label>
              <input class="form-control" id="" readonly="" value="MNI.4G_L2100_10_MHz.GIN114.1623318482865">
              <label>Customer</label>
              <input name="" class="form-control" id="" readonly="" value="{{ $status->customerRequests->name }}">
              <label>Service</label>
              <input name="service" class="form-control" id="" readonly="" value="{{ $status->customerRequests->service->name }}">
              <label>Notes</label>
              <textarea name="information" class="form-control" id="" rows="4">{{ $status->information }}</textarea>
            </div>
            
            <div class="col-md-6">
              <label>Bandwith</label>
              <input class="form-control" id="" readonly="" value="123 MBps">
              <label>Long Lat</label>
              <input name="longlat" class="form-control" id="" readonly="" value="{{ $status->customerRequests->latlong }}"><br>
          
              <div class="input-group">
                <select class="form-control" name="name">
                @foreach (["Waiting to Process" => "Waiting to Process", "Not Ready" => "Not Ready", "Ready" => "Ready" ] as $statuses => $name)
                  <option value="{{ $statuses }}" {{ old("status", $status->name)}}>{{ $name }}</option>
                @endforeach
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary float-end">Complete Task</button>
  </form>
</div>
@endsection