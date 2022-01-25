<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerRequest;
use App\Models\Service;
use App\Models\BackroomStatus;

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

        $customers = $customerRequest->service->backrooms;

        foreach ($customers as $customer) {
            BackroomStatus::create([
                'customer_request_id' => $customerRequest->id,
                'backroom_id' => $customer->id,
                'status' => 'Waiting to Process',
                'information' => 'No info'
            ]);
        }

        if ($customer) {
            return redirect()->route('customer.create')->with(['success' => 'Data Berhasil Disimpan']);
        }else {
            return redirect()->route('customer.create')->with(['error' => 'Data Gagal Disimpan']);
        }
    }
    
}
