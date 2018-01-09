<?php

namespace App\Http\Controllers;

use Excel;
use App\User;
use App\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Request $request)
    {
        $lastShift = auth()->user()->shifts()->latest()->first();
        $lastShift->update(['adsCount' => $request->adsCount + $lastShift->adsCount]);

        return 'adsCount updated';
    }

    public function show($id)
    {
        $driver = User::role('Driver')->findOrFail($id);

        Excel::create($driver->name.' '.now()->toDateString(), function ($excel) use ($driver) {
            $excel->sheet($driver->name, function ($sheet) use ($driver) {
                $sheet->fromModel($driver->shifts()->get(['adsCount', 'minutes', 'loggedIn', 'loggedOut']));
            });
        })->export('xls');

        return back();
    }
}
