<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loan;
use App\Book;
use PDF;
use App\User;
use Carbon\Carbon;

class LoanController extends Controller
{
    public function index(Loan $loans)
    {   
        $user  = User::all();
        $book = Book::all();
        $loans = Loan::all();
        return view('pages.loans.index',compact('loans','book','user'));
    }

    public function store(Loan $loans, Request $request)
    {
        Loan::create([
            'user_id' => request('user_id'),
            'book_first_id' => request('book_first_id'),
            'book_second_id' => request('book_second_id'),
            'borrow' => request('borrow'),
            'duedate' => request('duedate'),
        ]);

        return ['status' => true, 'message' => 'new data author saved'];
    }

    public function edit(Loan $loans){
        $result = $loans->toArray();
    }

    public function update(Request $request , Loan $loans){
        $loans->update([
            'user_id' => request('user_id'),
            'book_first_id' => request('book_first_id'),
            'book_second_id' => request('book_second_id'),
            'borrow' => request('borrow'),
            'duedate' => request('duedate'),
        ]);
        return ['status' => true, 'message' => 'new data loan updated'];
    }

    public function returnbook(Loan $loans){
        

        $result = $loans->toArray();
        $result['user_id']= $loans->user->name;
        $result['book_first_id'] = $loans->book_first->title;
        $result['book_second_id'] = $loans->book_second->title;
        $result['borrow'] = $loans->borrow->format('Y-m-d');
        $result['duedate'] = $loans->duedate->format('Y-m-d');
       
        return $result;
    }

    public function returnupdate(Request $request)
    {
        $priceFine = 500;
        $loans = Loan::find($request->input('id'));
        
        $duedate = Carbon::createFromFormat('Y-m-d',$loans->duedate->format('Y-m-d'));
        $return = Carbon::createFromFormat('Y-m-d',$request->input('return'));

        $lengthOfAd = $return->diffInDays($duedate);
        // print_r($lengthOfAd);
        $fine = $lengthOfAd * $priceFine;
       
        $data = [
            'return' => request('return'),
            'fine' => $fine,
        ];

        
        
        $loans->update($data);
       
        return response ()->json(['status' => true, 'message' => 'update success']);
    }

    public function delete(Loans $loans)
    {
        $loans->delete();
        return response ()->json(['status' => true, 'message' => 'delete success']);
    }

    public function report(Loan $loans) {
        
        $loans = Loan::all();
       
        view()->share('loans.pdf',$loans);
        print_r($loans);
        exit();
        
        $pdf = PDF::loadView('pages.loans.pdf',compact('loans'));

        return $pdf->download('Loans Trasaction');
        return view('pdf');
    }
}
