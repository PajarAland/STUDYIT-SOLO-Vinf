<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class enroll extends Model
{
    //
    use HasFactory;
    protected $table = 'enrolls';
    protected $fillable = [
        'user_id',
        'amount',
        'payment_date'
    ];
}
