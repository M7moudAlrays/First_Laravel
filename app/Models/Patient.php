<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $table = "patients" ;
    protected $fillable = ['name','age'] ;
    protected $hidden = ['updated_at','created_at','laravel_through_key'];

    public function doctor()
    {
        return $this->hasOneThrough(Doctor::class , Medicalprofile::class,'patient_id','medicalprofile_id') ;
    }

}
