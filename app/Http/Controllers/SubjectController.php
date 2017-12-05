<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;

class SubjectController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('keywords')){
            $query = $request->get('keywords');
            $subject = Subject::where('name','LIKE','%'.$query.'%')->get();
        }else{
            $subject = Subject::all();
        }
       
        return view('pages.subjects.index',compact('subject'));
    }

    public function store(Request $request, Subject $subject)
    {
        $this->validate(request(), [
            'name' => 'required'
        ]);

        Subject::create([
            'name' => request('name')
        ]);

        return ['status' => true, 'message' => 'new data subject saved'];
    }

    public function edit(Subject $subject)
    {
        return $subject->toArray();
    }


    public function update(Request $request, Subject $subject)
    {
        $data = [
            'name' => request('name')
        ];

        $subject->update($data);
        return redirect()->route('subject.index');
    }

    public function delete(Subject $subject)
    {
        $subject->delete();
        return response()->json(['status'=>true,'message'=>'data success']);
    }
}
