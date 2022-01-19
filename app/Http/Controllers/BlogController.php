<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /** 
     * index
     * 
     * @return void
    */
    public function index(){
        $blogs = Blog::latest()->paginate(10);
        return view('dashboard', compact('blogs'));
    }
    // public function search(Request $request)
    // {
    //     $keyword = $request->search;
    //     $users = User::where('name', 'like', "%" . $keyword . "%")->paginate(5);
    //     return view('users.index', compact('users'))->with('i', (request()->input('page', 1) - 1) * 5);
    // }
}
