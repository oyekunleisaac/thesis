<?php

namespace App\Models;
use Auth;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $table ='quizzes';
    protected $fillable = [
    'user_id',
    'book_id',
    'q1',
    'q2',
    'q3',
    'q4',
    'q5',
    'a1',
    'a2',
    'a3',
    'a4',
    'a5'
            
];

public function user(){
    return $this->belongsTo(User::class);
}
}
