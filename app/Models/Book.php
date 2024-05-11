<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'book';
    protected $primaryKey = 'bookID';
    protected $fillable = ['title', 'publication_date', 'ISBN','category', 'author'];

    public function reservations()
    {
        return $this->hasOne(Reservation::class, 'bookID', 'bookID');
    }
}
