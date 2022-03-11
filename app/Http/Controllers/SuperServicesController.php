<?php

namespace App\Http\Controllers;

use App\Models\SuperServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuperServicesController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        // $blogs = Blog::latest()->paginate(10);
        return view('super.services');
    }

}
