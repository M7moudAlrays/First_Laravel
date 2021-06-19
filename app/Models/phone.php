<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phone extends Model
{
    use HasFactory;

    protected $table = "phones" ;
    protected $fillable = ['code','phone_number','user_id'];
    protected $hidden = ['user_id'] ;
    public $timestamps = false ;

     ############################ Begin Relations ############################

     public function user()
     {
         return $this ->belongsTo(user::class) ; 
     }
 
     ########################### End Relations ###############################
    
}
