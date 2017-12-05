<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
use Alert;

class AuthorController extends Controller
{
    public function index(Request $request)
    {
        

        if ($request->has('keywords')){
            $query = $request->get('keywords');
            $authors = Author::where('name', 'LIKE', '%' . $query . '%')
            ->paginate((env('PER_PAGE')));

        } else {
            $authors = Author::latest()->paginate((env('PER_PAGE')));
        }
        

        return view('pages.authors.index',compact('authors'));
    }

    public function store(Request $request, Author $authors)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required',
            'website' => 'required',
            'address' => 'required'
        ]);

        Author::create([
            'name' => request('name'),
            'email' => request('email'),
            'website' => request('website'),
            'address' => request('address')
        ]);

        return ['status' => true, 'message' => 'new data author saved'];
    }

    public function edit(Author $author)
    {
        return $author->toArray();
    }


    public function update(Request $request, Author $author)
    {
        $data = [
            'name' => request('name'),
            'email' => request('email'),
            'website' => request('website'),
            'address' => request('address')
        ];

        $author->update($data);
        return redirect()->route('author.index');
    }

    public function delete(Author $author)
    {
        $author->delete();
        return response ()->json(['status' => true, 'message' => 'delete success']);
    }
    

}
