@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5">
        <h2 class="card-title">Customer Request</h2>
        <hr>
        <form>
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                <input type="name" class="form-control" id="inputEmail3" placeholder="Nama Customer">
              </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">No Telp</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="inputEmail3" placeholder="08xxxxxxxxx">
                </div>
              </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Latitude</label>
                <div class="col-sm-10">
                  <input type="name" class="form-control" id="inputEmail3" placeholder="Latitude">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Longitude</label>
                <div class="col-sm-10">
                  <input type="name" class="form-control" id="inputEmail3" placeholder="Longitude">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                  <input type="name" class="form-control" id="inputEmail3" placeholder="Alamat">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Service</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                        <option value="1">Astinet</option>
                        <option value="2">NeucentrIX</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary float-end">Submit</button>
        </form>
    </div>
@endsection