<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use Alert;


class LocationController extends Controller
{
    public function index(Request $request)
    {   
        if($request->has('keywords')){
            $query = $request->get('keywords');
            $location = Location::where('location','LIKE','%' .$query. '%')->paginate(env('PER_PAGE'));
        } else {
            $location = Location::first()->paginate(env('PER_PAGE'));
            
        }
       
        return view('pages.locations.index',compact('location'));
    }

    public function store(Request $request, Location $location)
    {
        $this->validate(request(), [
            'location' => 'required'
        ]);

        Location::create([
            'location' => request('location')
        ]);

        return redirect()->route('location.index');
    }

    public function edit(Location $location)
    {
        return $location->toArray();
    }


    public function update(Request $request, Location $location)
    {
        $data = [
            'location' => request('location')
        ];

        $location->update($data);
        return redirect()->route('location.index');
    }

    public function delete(Location $location)
    {
        $location->delete();
        return response()->json(['status'=>true,'message'=>'Data success delete']);
    }
}
