<?php

namespace App\Http\Controllers;

use App\Models\Backroom;
use Illuminate\Http\Request;
use App\Models\CustomerRequest;
use App\Models\Service;
use App\Models\BackroomStatus;
use Axiom\Rules\LocationCoordinates;
use Illuminate\Support\Facades\DB;

class CustomerRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create() {
        $services = Service::all();
        $witels = Backroom::where('name', 'like', 'Witel%')->get();

        return view('customer-request.add', compact('services', 'witels'));

    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:30',
            'phoneNumber' => 'required|digits_between:1,13',
            'latlong' => ['required', new LocationCoordinates],
            'address' => 'required|max:255',
            'service_id' => 'required|exists:services,id',
            'bandwidth' => 'required|digits_between:1,3',
        ]);

        $customer = CustomerRequest::create([
            'business_key' => 'OLO/' . random_int(100000, 999999),
            'name' => $request->name,
            'phoneNumber' => $request->phoneNumber,
            'latlong' => $request->latlong,
            'address' => $request->address,
            'service_id' => $request->service_id,
            'bandwidth' => $request->bandwidth . ' ' . $request->unit,
            'user_id' => auth()->user()->id
        ]);

        foreach ($request->witel as $item => $value) {
            BackroomStatus::create([
                'customer_request_id' => $customer->id,
                'backroom_id' => $value,
                'name' => 'Waiting to Process',
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

    /**
     * * destroy
     * *
     * * @param  mixed $id
     * * @return void
     * */
    
    public function destroy($id)
    {
        $customers = CustomerRequest::findOrFail($id);
        $customers->delete();
        
        if($customers){
            //redirect dengan pesan sukses
            return redirect()->route('home')->with(['success' => 'Data Berhasil Dihapus!']);
       }else{
           //redirect dengan pesan error
           return redirect()->route('home')->with(['error' => 'Data Gagal Dihapus!']);
       }
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
