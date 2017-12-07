<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publisher;
use Alert;

class PublisherController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('keywords')){
            $query = $request->get('keywords');
            $publishers = Publisher::where('name','LIKE','%'.$query.'%')
            ->paginate((env('PER_PAGE')));
        } else {
        $publishers = Publisher::latest()->paginate((env('PER_PAGE')));
        }
        return view('pages.publishers.index',compact('publishers'));
    }

    public function store(Request $request, Publisher $publishers)
    {
        $this->validate(request(), [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required'
        ]);

        Publisher::create([
            'name' => request('name'),
            'phone' => request('phone'),
            'email' => request('email'),
            'address' => request('address')
        ]);

        return ['status' => true, 'message' => 'new data publisher saved'];
    }

    public function edit(Publisher $publisher)
    {
        return $publisher->toArray();
    }


    public function update(Request $request, Publisher $publisher)
    {
        $data = [
            'name' => request('name'),
            'phone' => request('phone'),
            'email' => request('email'),
            'address' => request('address')
        ];

        $publisher->update($data);
        return redirect()->route('publisher.index');
    }

    public function delete(Publisher $publisher)
    {
        $publisher->delete();
        return response ()->json(['status' => true, 'message' => 'delete success']);
    }

}
