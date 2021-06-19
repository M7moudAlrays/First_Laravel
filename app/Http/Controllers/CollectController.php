<?php

namespace App\Http\Controllers;

use App\Models\offer;
use App\Scopes\OfferScope;
use Illuminate\Http\Request;

class CollectController extends Controller
{
    public function index()
    {
        $nums = collect([1,1,1,5,1,3]) ;
        // return $nums->avg() ;
        // return $nums->count() ;
        // return $nums->countBy() ;
        // return $nums->duplicates() ;

        // $members = collect(['name','age']) ;  
        // $combineNames = $members -> combine(['ali',23]) ;
        // return $combineNames ;
    }



    public function collectOffers()
    {
        $offers = offer::get() ;   
        
        $offers->each(function ($offer)
        {
            unset ($offer->details) ;
            $offer->newdetails = "Details by each" ;
        }) ;

        //  return $offers ; 
        return view ('offers.show' , ['data'=> $offers]) ;
    }
}
