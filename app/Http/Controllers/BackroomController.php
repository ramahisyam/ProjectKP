<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerRequest;
use Illuminate\Database\Eloquent\Builder;

class BackroomController extends Controller
{
    public function index()
    {
        $customers = CustomerRequest::latest()->with('service.backrooms.status')->paginate(10);
        // dd($customers);
        return view('backroom.edit', compact('customers'));
    }
}
