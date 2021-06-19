<?php

namespace App\Models;

use App\Scopes\OfferScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class offer extends Model
{
    use HasFactory;
    protected $table = "offers" ; 
    protected $fillable = ['name','price','image','details'] ;
    protected $hidden = ['created_at','updated_at'] ;

    // This variable To Making (created_at','updated_at) at Null Value
    // public $timestamps = false ;

    //register Local Scope
    public function scopeinactive ($query)
    {
        return $query->where('status',0)->wherenotNull('details') ;
    }

    //register Global Scope
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new OfferScope);
    }

    // Mutator

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value) ;
    }

    
}
