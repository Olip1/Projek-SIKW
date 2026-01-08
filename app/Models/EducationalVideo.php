<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationalVideo extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'thumbnail',
        'youtube_url',
        'description',
        'is_active'
    ];
}
