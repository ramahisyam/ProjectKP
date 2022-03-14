<?php

namespace App\Http\Controllers;

use App\Models\Backroom;
use App\Models\BackroomStatus;
use App\Models\CustomerRequest;
use App\Events\BackroomNotification;
use App\Models\User;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
        ->latest()
        ->filter(request(['search']))
        ->with('statuses')
        ->paginate(10);

        if ($user->hasRole('AM')) {
            return view('dashboard', compact('customers'));
        } else if ($user->hasRole('backroom')) {
            return redirect()->route('backroom.index');
        } else if ($user->hasRole('superAdmin')) {
            return redirect()->route('user.index');
        }
    }
    
    
}