<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModulComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'ModulID',
        'UserID',
        'username',
        'comment',
    ];

    // public function modul()
    // {
    //     return $this->belongsTo(Modul::class);
    // }
}
