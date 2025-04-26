<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Course extends Model
{
    //
     //
     use HasFactory;
     protected $table = 'courses';
     protected $fillable = [
         'image',
         'instructor_id',
         'course_name',
         'description',
         'level',
         'start_date',
         'end_date',
         'status'
         
     ];
     protected $casts = [
        'level' => 'string',
        'status' => 'string'
     ];
     public function instructor()
     {
        return $this->belongsTo(Instructor::class);
     }
     
}

