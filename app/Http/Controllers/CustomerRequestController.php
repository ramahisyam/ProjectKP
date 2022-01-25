<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerRequest;
use App\Models\Service;

class CustomerRequestController extends Controller
{
    public function create() {
        $services = Service::all();

        return view('customer-request.add', compact('services'));

        //return view('dashboard', compact('services'));

        // $blogs = Service::latest()->paginate(10);
        // return view('dashboard', compact('blogs'));

        
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'phoneNumber' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'address' => 'required',
            'service_id' => 'required'
        ]);
        $customerRequest = CustomerRequest::create([
            'name' => $request->name,
            'phoneNumber' => $request->phoneNumber,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'address' => $request->address,
            'service_id' => $request->service_id
        ]);

        if ($customerRequest) {
            return redirect()->route('customer.create')->with(['success' => 'Data Berhasil Disimpan']);
        }else {
            return redirect()->route('customer.create')->with(['error' => 'Data Gagal Disimpan']);
        }
    }

    public function index() {
        $services = CustomerRequest::latest()->paginate(10);
        return view('dashboard', compact('services'));
    }
}
