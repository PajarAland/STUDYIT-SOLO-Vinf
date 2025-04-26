<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class task extends Model
{
    //
    use HasFactory;
    protected $table = 'tasks';
    protected $fillable = [
        'ModulID',
        'UserID',
        'FileTask',
        'Status',
    ];

    public function instructor()
    {
       return $this->belongsTo(Instructor::class);
    }
}