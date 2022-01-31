<?php

namespace App\Http\Controllers;

use App\Models\BackroomStatus;
use App\Models\CustomerRequest;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    

    public function index()
    {
        $user = auth()->user();
        $customers = CustomerRequest::sortable()
        ->filter(request(['search']))
        ->with('service.backrooms')
        ->with('statuses')
        ->paginate(10);

        if ($user->hasRole('AM')) {
            return view('dashboard', compact('customers'));
        } else {
            return redirect()->route('backroom.index');
        }
    }
}
