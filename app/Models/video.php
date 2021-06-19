<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    protected $table = "videos_viewers" ;
    protected $fillable = ['name','viewers'] ;
    protected $hidden = ['created_at','updated_at'] ;
    use HasFactory;
}
