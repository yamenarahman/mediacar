<?php

namespace App\Http\Controllers;

use App\User;
use JavaScript;
use App\Advertisement;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('filter') == 'videos') {
            $advertisements = Advertisement::latest()->type('video')->with('vendor')->get();
            $type = 'videos';

            JavaScript::put([
                'vids' => $advertisements->pluck('source')
            ]);
        } else {
            $advertisements = Advertisement::latest()->type('banner')->with('vendor')->get();
            $type = 'banners';
        }


        return view('home', [
            'ads'      => $advertisements,
            'drivers'  => User::role('Driver')->count(),
            'adsCount' => Advertisement::count(),
            'type'     => $type
        ]);
    }
}
