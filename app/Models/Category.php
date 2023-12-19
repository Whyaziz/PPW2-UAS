<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['book_id','name'];

    public function bukus()
    {
        return $this->belongsToMany(Buku::class, 'buku_category', 'category_id', 'buku_id');
    }
}
