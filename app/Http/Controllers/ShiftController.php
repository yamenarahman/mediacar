<?php

namespace App\Http\Controllers;

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
}
