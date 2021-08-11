<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['nama'];
    protected $hidden = [];

    public function books() {
        return $this->hasOne(Book::class, 'categories_id', 'id');
    }
}
