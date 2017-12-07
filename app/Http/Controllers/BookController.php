<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Category;
Use App\Author;
use App\Publisher;
use App\Gmd;
Use App\Subject;
use App\Location;
use App\Library\BookImport;
use Maatwebsite\Excel\Facades\Excel;


class BookController extends Controller
{
    private $books;
    public function index(Request $request){
        $category = Category::all();
        $author = Author::all();
        $publisher = Publisher::all();
        $gmd = Gmd::all();
        $subject = Subject::all();
        $location = Location::all();

        if($request->has('keywords')){
            $query = $request->get('keywords');
            $books = Book::where('title','LIKE','%'.$request.'%')->paginate(env('PER_PAGE'));
        } else {
            $books = Book::first()->paginate(env('PER_PAGE'));
        }
        
        return view('pages.books.index',compact('books','category','author','publisher','gmd','subject','location'));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'inventory_number' => 'required',
            'title' => 'required',
            'author_id' => 'required',
            'category_id' => 'required',
            'publisher_id' => 'required',
            'publish_place' => 'required',
            'location_id' => 'required',
            'year' => 'required',
            'gmd_id' => 'required',
            'subject_id' => 'required',
            'edition' => 'required',
            'class' => 'required',
            'language' => 'required',
            'isbn' => 'required',
            'synopsis' => 'required',
        ]);

        Book::create([
            'inventory_number' => request('inventory_number'),
            'title' => request('title'),
            'author_id' => request('author_id'),
            'category_id' => request('category_id'),
            'publisher_id' => request('publisher_id'),
            'publish_place' => request('publish_place'),
            'location_id' => request('location_id'),
            'year' => request('year'),
            'gmd_id' => request('gmd_id'),
            'subject_id' => request('subject_id'),
            'edition' => request('edition'),
            'class' => request('class'),
            'language' => request('language'),
            'isbn' => request('isbn'),
            'synopsis' => request('synopsis'),
        ]);

        return response()->json(['status'=>true,'message'=>'data has been added']);
    }

    public function show(Book $books)
    {
        return view('pages.books.show',compact('books'));
    }

    public function edit(Book $books)
    {
        $result = $books->toArray();
    }
    
    public function delete(Request $request, Book $books)
    {
        $books->delete();
        return response ()->json(['status' => true, 'message' => 'delete success']);
    }

    public function import()
    {
        return view('pages.books.book-import');
    }

    public function doImport(BookImport $import)
    {
        $results = $import->get();
        Book::insert($results->toArray());
        return redirect('books')->with('status', 'Import buku berhasil');
    }
    public function export()
    {
        $datas =  Book::All()->toArray();
        return Excel::create('Layout Book', function($excel) use ($datas) {
            $excel->sheet('book', function($sheet) use ($datas) {
                $sheet->fromArray($datas);
            });
        })->export('csv');
    }
}
