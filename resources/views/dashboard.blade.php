@extends('layouts.app')

@section('content')
<div class="container">
<table class="table table-bordered">
  <thead>
    
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Business Key</th>
      <th scope="col">Customer</th>
      <th scope="col">Service</th>
      <th scope="col">Bandwith</th>
      <th scope="col">Dates</th>
      <th scope="col">Long Lat</th>
      <th scope="col">Address</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>12345qwerty</td>
      <td>PT XL Axiata Tbk</td>
      <td>Astinet</td>
      <td>100 Mbps</td>
      <td>13-01-2022</td>
      <td>-6.232140225008921, 106.83176014567648</td>
      <td>JL. H. R. Rasuna Said X5 Kav. 11-12 Kuningan Timur, Setiabudi, Jakarta Selatan 12950 – Indonesia</td>
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
                  Status  : <span class="badge rounded-pill bg-success">OK</span>
                  <br>
                  Notes   : --
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
      </td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>MNI.OAM_RECTIFIER_1.GIN024.1637730508752</td>
      <td>PT Indosat Tbk</td>
      <td>NeuCentrIX</td>
      <td>100 Mbps</td>
      <td>14-01-2022</td>
      <td>-6.180163694701556, 106.8214288972833</td>
      <td>Jl. Medan Merdeka Barat No. 21 (Jln Budi Kemulyaan), Jakarta Pusat, Jakarta 10110, Indonesia </td>
      <td><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal2">Details</button>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >         
        <div class="modal-dialog modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Details</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              WITEL 3
              <br>
              Status  : <span class="badge rounded-pill bg-success">OK</span>
              <br>
              Notes   : --
              <hr>

              WITEL 4
              <br>
              Status  : <span class="badge rounded-pill bg-danger">NOT OK</span>
              <br>
              Notes   : Lakukan pemeriksaan kembali atas hasil integrasi network terminal (ONT/L2SW atau NTE lainnya) dengan NE Customer untuk memastikan data atau attachment pendukung telah dipenuhi. Lengkapi variable dan atau attachment pendukung yang dibutuhkan              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
            </div>
          </div>
        </div>
      </div>
      </td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>MNI.4G_L2100_10_MHz.DPR068.1613224255962</td>
      <td>PT Smartfren Telecom Tbk</td>
      <td>Link</td>
      <td>100 Mbps</td>
      <td>14-01-2022</td>
      <td>-6.184785661905374, 106.82481320082263</td>
      <td>Jl. H. Agus Salim No.32, RT.2/RW.1, Menteng, Kec. Menteng, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10340</td>
      <td><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal1">Details</button></td>
    </tr>
  </tbody>
</table>
</div>



@endsection
