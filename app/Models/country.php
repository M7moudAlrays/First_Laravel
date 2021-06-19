<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    use HasFactory;
    protected $table = "countries" ;
    protected $fillable = ['name'] ;
    protected $hidden = ['updated_at','created_at'];

    public function doctors()
    {
        return $this->hasManyThrough(Doctor::class,Hospital::class ,'country_id','hospital_id') ;
    }
}
