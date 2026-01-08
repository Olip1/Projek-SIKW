<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class banner extends Model
{
    protected $fillable = [
        'title',
        'image',
        'is_active'
    ];
}

