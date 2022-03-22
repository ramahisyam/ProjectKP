<?php

namespace App\Http\Controllers;

use App\Models\Backroom;
use Illuminate\Http\Request;
use App\Models\CustomerRequest;
use App\Models\Service;
use App\Models\BackroomStatus;
use App\Models\User;
use App\Notifications\BackroomNotification;
use Axiom\Rules\LocationCoordinates;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rule;

class CustomerRequestController extends Controller
{
    public function index()
    {
        $customers = CustomerRequest::sortable()
        ->latest()
        ->filter(request(['search']))
        ->with('statuses')
        ->paginate(10);

        return view('customer-request.index', compact('customers'));
    }

    public function create() {
        $services = Service::all();
        $witels = Backroom::where('name', 'LIKE', 'Witel%')->get();

        return view('customer-request.add', compact('services', 'witels'));

    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:30',
            'phoneNumber' => 'required|digits_between:1,13',
            'latlong' => ['required', new LocationCoordinates],
            'address' => 'required|max:255',
            'service_id' => 'required|exists:services,id',
            'capacity' => 'required|digits_between:1,3',
            // 'witel' => [
            //     'required',
            //     Rule::exists('statuses')->where(function ($query) {
            //         return $query->where('backroom_id', 2);
            //     })
            //     ]
        ]);

        $businessKey = 'OLO/' . random_int(100000, 999999);

        $customerRequest = CustomerRequest::create([
            'business_key' => $businessKey,
            'name' => $request->name,
            'phoneNumber' => $request->phoneNumber,
            'latlong' => $request->latlong,
            'address' => $request->address,
            'service_id' => $request->service_id,
            'capacity' => $request->capacity . ' ' . $request->unit,
            'user_id' => auth()->user()->id
        ]);

        foreach ($request->witel as $item => $value) {
            BackroomStatus::create([
                'customer_request_id' => $customerRequest->id,
                'backroom_id' => $value,
                'name' => 'Waiting to Process',
            ]);
            $backroom = Backroom::where('id', $value)->first();
            $user = User::whereHas('roles', function($query) use ($backroom) {
                $query->where('name', $backroom->name);
            })->get();
            Notification::send($user, new BackroomNotification($request->name, $businessKey));
        }

        $customers = $customerRequest->service->backrooms;
    
        foreach ($customers as $customer) {
            BackroomStatus::create([
                'customer_request_id' => $customerRequest->id,
                'backroom_id' => $customer->id,
                'name' => 'Waiting to Process',
            ]);
            $backroom = Backroom::where('id', $customer->id)->first();
            $user = User::whereHas('roles', function($query) use ($backroom) {
                $query->where('name', $backroom->name);
            })->get();
            Notification::send($user, new BackroomNotification($request->name, $businessKey));
        }
        // Notification::send($user, new BackroomNotification($request->name));

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
