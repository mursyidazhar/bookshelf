<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'judul', 'penulis', 'photo', 'categories_id', 'thn_terbit', 'tgl_beli', 'jml_halaman', 'ulasan', 'nilai'
    ];
    protected $hidden = [];

    public function categories() {
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }
}
