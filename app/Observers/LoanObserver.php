<?php

namespace App\Observers;

use App\Loan;
use App\Book;
use App\User;

class LoanObserver
{
    /**
     * Listen to the User created event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function created(Loan $loan)
    {
        Book::find($loan->book_first_id)->update(['status' => '0']);
        Book::find($loan->book_second_id)->update(['status' => '0']);
    }

    /**
     * Listen to the User deleting event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function updated(Loan $loan)
    {
        Book::find($loan->book_first_id)->update(['status' => '1']);
        Book::find($loan->book_second_id)->update(['status' => '1']);
    }
}