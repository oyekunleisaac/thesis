<?php

namespace App\Models;
use DB;
use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;
    protected $table ='libraries';
    protected $fillable = [
    'title',
    'author',
    'user_id',
    'description',
    'avb',
    'value',
    'image',
    'book',
    'category',
    'book_id'
];
public function premia()
{
    return $this->hasMany(Premium::class);
}
}
