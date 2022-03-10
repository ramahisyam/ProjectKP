<?php

namespace App\Http\Controllers;

use App\Models\Super;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuperController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        return view('super');
    }

}
