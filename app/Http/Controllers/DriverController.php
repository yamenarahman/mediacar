<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = User::role('Driver')->orderBy('name')->with('information')->get();

        return view('drivers.index', compact('drivers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name'        => 'required',
            'phone'       => 'required|unique:users',
            'national-id' => 'nullable',
            'city'        => 'nullable'
        ]);

        $driver = User::create([
            'name'     => request('name'),
            'phone'    => request('phone'),
            'email'    => request('phone').'@mediacar.com',
            'password' => bcrypt(request('phone'))
        ]);

        $driver->assignRole('Driver');

        $driver->information()->updateOrCreate([
            'nationalId' => request('national-id'),
            'city'       => request('city')
        ]);

        return redirect('/drivers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $driver = User::role('Driver')->findOrFail($id);
        $driver->with('shifts');

        return view('drivers.show', compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $driver = User::findOrFail($id);

        if (request('reset')) {
            $driver->update(['password' => bcrypt($driver->phone)]);
        } else {
            request()->validate([
                'name'        => 'required',
                'phone'       => 'required|unique:users,phone,'.$driver->id,
                'national-id' => 'nullable',
                'city'        => 'nullable'
            ]);

            $driver->update([
                'name'     => request('name'),
                'phone'    => request('phone'),
                'email'    => request('phone').'@mediacar.com',
                'password' => bcrypt(request('phone'))
            ]);

            $driver->information->update([
                'nationalId' => request('national-id'),
                'city'       => request('city')
            ]);
        }


        return redirect('/drivers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect('/drivers');
    }
}
