<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();
        
        $errors = [];
        if ($request->isMethod('post')) {
            $password = $request->post('password');
            if (\Hash::check($request->post('current_password'), $user->password)) {
                if ($this->validate($request, $this->validateRules())) {
                    if (!empty($password)) {
                        $user->password = \Hash::make($password);
                    }
                    $user->name = $request->post('name');
                    $user->email = $request->post('email'); 
                    $user->save();
                }
            } else {
                $errors['current_password'][] = 'Пароль указан неверно';
            }
            return redirect()->route('profile::update')
                ->withErrors($errors);
        }

        return view('admin.profile.update', ['user' => $user]);
    }

    protected function validateRules()
    {
        return [
            'name' => 'required|string|max:10',
            'email' => 'required|email|unique:users,email',
            'password' => 'string|min:3',
            'current_password' => 'required',
        ];
    }
}
