<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerRequest;
use App\Models\Service;

class CustomerRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create() {
        $services = Service::all();

        return view('customer-request.add', compact('services'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:30',
            'phoneNumber' => 'required|digits_between:1,13',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'address' => 'required|max:255',
            'service_id' => 'required|exists:services,id'
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
        // dd('cooming soon');
    }
}
