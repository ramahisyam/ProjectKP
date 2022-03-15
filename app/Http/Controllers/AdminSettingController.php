<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Str;
use App\Models\User;

class AdminSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
        return view('admin.settings.edit');
    }

    public function update(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phoneNumber' => 'required|digits_between:1,13'
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phoneNumber' => $request->phoneNumber,
        ]);

        if ($user) {
            return redirect()->back()->with(['success' => 'Data Berhasil Diupdate']);
        } else {
            return redirect()->back()->with(['error' => 'Data Gagal Diupdate']);
        }
    }

    public function changePassword()
    {
        return view('admin.settings.change-password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        $user = User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        
        if ($user) {
            return redirect()->back()->with('success', 'Password berhasil diperbarui');
        } else {
            return redirect()->back()->with('error', 'Password berhasil diperbarui');
        }
    }
}
