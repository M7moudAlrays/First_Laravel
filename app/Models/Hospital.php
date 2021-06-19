<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;
    protected $table = "hospitals" ;
    protected $fillable = ['name','address','country_id'] ;
    protected $hidden = ['updated_at','created_at'];

    public function doctors ()
    {
        return $this ->hasMany(Doctor::class,'hospital_id','id') ;
    }
}
