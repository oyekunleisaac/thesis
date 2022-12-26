<?php

namespace App\Models;
use Auth;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verify extends Model
{
    use HasFactory;
    protected $table ='verifies';
        protected $fillable = [
        'sub',
        'dur',
        'free',
        'copy',
        'share',       
        'user_id', 
        'user_role', 
        'role'      
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function Verifications(){
        return $this->belongsTo(Verification::class);
    }
    
}
