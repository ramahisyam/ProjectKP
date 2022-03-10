<?php

namespace App\Http\Controllers;

use App\Models\SuperUsers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuperUsersController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $users = User::latest()->paginate(10);
        // return view('blog.index', compact('blogs'));
        return view('super.users');
    }

}
