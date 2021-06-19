<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicalprofile extends Model
{
    use HasFactory;
    protected $table = "medicalprofiles" ;
    protected $fillable = ['report','patient_id'] ;
    protected $hidden = ['updated_at','created_at'];
}
