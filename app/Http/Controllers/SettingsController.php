<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        return view('settings');
    }

    public function update()
    {
        request()->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|min:10|max:20|unique:users,phone,'.auth()->id(),
            'password' => 'nullable|string|min:6|confirmed'
        ]);

        auth()->user()->update([
            'name' => request('name'),
            'phone' => request('phone')
        ]);

        if (request('password')) {
            auth()->user()->update(['password' => bcrypt(request('password'))]);
        }

        return redirect('/settings');
    }
}
