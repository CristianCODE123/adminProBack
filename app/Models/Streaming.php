<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Streaming extends Model
{
    use HasFactory;

    protected $table = 'streamings';

    protected $fillable = [
        
        'id',
        'imagen',
        'chatStream',
        'user_id',
        'created_at',
        'updated_at',   

    ];

}
