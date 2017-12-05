<?php

namespace App;

use App\Category;
use App\User;
Use App\Author;
use App\Publisher;
use App\Gmd;
Use App\Subject;
use App\Location;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];
    
    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Loan()
    {
        return $this->hasMany(Loan::class);
    }

    public function Author()
    {
        return $this->belongsTo(Author::class);
    }

    public function Publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function Gmd()
    {
        return $this->belongsTo(Gmd::class);
    }

    public function Subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function Location()
    {
        return $this->belongsTo(Location::class);
    }
}
