<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerRequest;
use App\Models\Service;
use App\Models\BackroomStatus;
use Axiom\Rules\LocationCoordinates;

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
            'latlong' => ['required', new LocationCoordinates],
            'address' => 'required|max:255',
            'service_id' => 'required|exists:services,id'
        ]);

        $customerRequest = CustomerRequest::create([
            'name' => $request->name,
            'phoneNumber' => $request->phoneNumber,
            'latlong' => $request->latlong,
            'address' => $request->address,
            'service_id' => $request->service_id
        ]);

        $customers = $customerRequest->service->backrooms;

        foreach ($customers as $customer) {
            BackroomStatus::create([
                'customer_request_id' => $customerRequest->id,
                'backroom_id' => $customer->id,
                'name' => 'Waiting to Process',
                'information' => 'No info'
            ]);
        }

        if ($customer) {
            return redirect()->route('customer.create')->with(['success' => 'Data Berhasil Disimpan']);
        }else {
            return redirect()->route('customer.create')->with(['error' => 'Data Gagal Disimpan']);
        }
    }

    public function edit(CustomerRequest $customer)
    {
        $services = Service::all();
        return view('customer-request.edit', compact('customer', 'services'));
    }
    
    public function update(Request $request, CustomerRequest $customer)
    {
        $customer = CustomerRequest::findOrFail($customer->id);

        $customer->update([
            'name' => $request->name,
            'phoneNumber' => $request->phoneNumber,
            'latlong' => $request->latlong,
            'address' => $request->address,
        ]);

        if ($customer) {
            return redirect()->route('home')->with(['success' => 'Data Berhasil Disimpan']);
        }else {
            return redirect()->route('home')->with(['error' => 'Data Gagal Disimpan']);
        }
    }
}
