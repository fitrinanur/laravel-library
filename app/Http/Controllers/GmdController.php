<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gmd;

class GmdController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('keywords')){
            $query = $request->get('keywords');
            $gmds = Gmd::where('gmd_type','LIKE','%' .$query. '%')->get();
        } else {
            $gmds = Gmd::all();
        }
       

        return view('pages.gmd.index',compact('gmds'));
    }

    public function store(Request $request, Gmd $gmd)
    {
        $this->validate(request(), [
            'gmd_type' => 'required'
        ]);

        Gmd::create([
            'gmd_type' => request('gmd_type')
        ]);

        return redirect()->route('gmd.index');
    }

    public function edit(Gmd $gmd)
    {
        return $gmd->toArray();
    }


    public function update(Request $request, Gmd $gmd)
    {
        $data = [
            'gmd_type' => request('gmd_type')
        ];

        $gmd->update($data);
       
    }

    public function delete(Gmd $gmd)
    {
        $gmd->delete();
        return response()->json(['status'=> true, 'message'=>'delete success']);
    }
}
