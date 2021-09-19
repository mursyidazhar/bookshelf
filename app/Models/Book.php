<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'user_id', 'judul', 'penulis', 'photo', 'categories_id', 'thn_terbit', 'tgl_beli', 'jml_halaman', 'ulasan', 'nilai'
    ];
    protected $hidden = [];

    public function users() {
        return $this->belongsTo('user_id', 'id');
    }
    public function categories() {
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }
    public static function getRecords() {
        $records = DB::table('books')->select('id', 'user_id', 'judul', 'penulis', 'categories_id', 'thn_terbit', 'tgl_beli', 'jml_halaman', 'ulasan', 'nilai')->get()->toArray();
        return $records;
    }
}
