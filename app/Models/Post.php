<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'title',
    //     'description',
    //     'photo',
    //     'is_active',
    // ];

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

