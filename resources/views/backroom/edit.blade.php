@extends('layouts.app')

@section('content')
<div class="container mt-4 mb-5">
  <div class="card-panel panel-default">
    <div class="collapse show" id="col-task">
      <div class="panel-heading">
        <h1 class="panel-title"><center>Task Information</center></h1>
      </div>
      
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <label>Bussiness Key</label>
            <input class="form-control" id="" readonly="">
            <label>Customer</label>
            <input class="form-control" id="" readonly="">
            <label>Service</label>
            <input class="form-control" id="" readonly="">
            <label>Notes</label>
            <textarea class="form-control" id="" rows="4"></textarea>
          </div>
          
          <div class="col-md-6">
            <label>Bandwith</label>
            <input class="form-control" id="" readonly="">
            <label>Long Lat</label>
            <input class="form-control" id="" readonly=""><br>
         
            <div class="input-group">
              <select class="form-control" id="actionoption">
              <option value="">-- Status --</option>
              <option value="Process Variable">OK</option>
              <option value="Process Variable">NOT OK</option>></select>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group">
  <button type="submit" class="btn btn-primary float-end">Complete Task</button>
  </div>
</div>
@endsection