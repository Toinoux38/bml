<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $table = 'currentloan';
    protected $primaryKey = 'reservationID';
    protected $fillable = ['reservationID', 'memberID', 'bookID','loan_date', 'due_date'];
}
