<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'climb_id',
        'is_beta'
    ];
    
    public function climb()
    {
        return $this->belongsTo(Climb::class);
    }
}
