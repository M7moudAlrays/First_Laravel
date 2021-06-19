<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $table = "doctors" ;
    protected $fillable = ['name','title','hospital_id','medicalprofile_id'] ;
    protected $hidden = ['updated_at','created_at','pivot','laravel_through_key'];

    public function hospital ()
    {
        return $this ->belongsTo(Hospital::class ,'hospital_id','id') ;
    }

    public function services()
    {
        return $this -> belongsToMany(Service::class,'doc_services','doc_id','service_id','id');
    }

    // Accessors
    public function getGenderAttribute($value)
    {
       return  $value == 1 ? 'Male' : 'Fmale' ;
    }
}
