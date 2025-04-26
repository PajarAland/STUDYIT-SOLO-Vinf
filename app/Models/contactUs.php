<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class contactUs extends Model
{
    use HasFactory;
     protected $table = 'contact_us';
     protected $fillable = [
        'First_name',
        'Last_name',
        'Email',
        'Phone_number',
        'Message'
    ];
    
}
