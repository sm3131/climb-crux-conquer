<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Climb extends Model
{
    use HasFactory;

    protected $fillable = [
        'climb_name',
        'climb_location',
        'climb_style',
        'climb_grade',
        'climb_description',
        'climb_image',
        'climb_status',
        'likes'
    ];

    public function comments ()
    {
        return $this->hasMany(Comment::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
