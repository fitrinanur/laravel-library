<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = [
        'user_id','book_first_id','book_second_id','borrow','duedate','return','fine'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'borrow',
        'duedate',
        'return'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book_first()
    {
        return $this->belongsTo(Book::class, 'book_first_id', 'id');
    }

    public function book_second()
    {
        return $this->belongsTo(Book::class, 'book_second_id', 'id');
    }

}
