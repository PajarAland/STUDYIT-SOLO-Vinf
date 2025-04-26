<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Instructor extends Model
{
    //
    use HasFactory;
    protected $table = 'instructors';
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone_number',
        
    ];
    public function courses()
{
    return $this->hasMany(Course::class);
}

}
