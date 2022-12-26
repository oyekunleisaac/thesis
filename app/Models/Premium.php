<?php

namespace App\Models;
use Auth;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Premium extends Model
{
    use HasFactory;
    protected $table ='premia';
        protected $fillable = [
        'title',
        'author',
        'user_id',
        'description',
        'avb',
        'value',
        'image',
        'book'
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
