<?php

namespace App\Http\Controllers;

use App\Advertisement;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('advertisements.index')->with(['advertisements' => Advertisement::latest()->with('vendor')->get()]);
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
            'title' => 'required',
            'source' => 'required',
            'type' => 'required'
        ]);

        Advertisement::create([
            'title' => request('title'),
            'type' => request('type'),
            'source' => request('source')
        ]);

        return redirect('/advertisements');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advertisement $advertisement)
    {
        request()->validate([
            'title' => 'required',
            'source' => 'required',
            'type' => 'required'
        ]);

        $advertisement->update([
            'title' => request('title'),
            'type' => request('type'),
            'source' => request('source')
        ]);

        return redirect('/advertisements');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertisement $advertisement)
    {
        $advertisement->delete();

        return redirect('/advertisements');
    }
}
