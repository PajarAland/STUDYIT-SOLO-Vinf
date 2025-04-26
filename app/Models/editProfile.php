<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EditProfile extends Model
{
    use HasFactory;

    // Define the table name (optional if it follows convention)
    protected $table = 'edit_profiles';

    // Define fillable fields to allow mass assignment
    protected $fillable = [
        'user_id',
        'profile_picture',
        'bio',
    ];

    // Define relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
