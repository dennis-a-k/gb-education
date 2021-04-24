<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('admin.profile.update', ['user' => Auth::user()]);
    }

    public function update(UsersRequest $request)
    {
        $user = Auth::user();
        $password = $request->post('password');
        if (!empty($password)) {
            $user->password = Hash::make($password);
        }
        $user->name = $request->post('name');
        $user->email = $request->post('email');
        $user->save();
        return redirect()->route('profile::profile');
    }
}