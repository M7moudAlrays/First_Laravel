<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\offer;
use Illuminate\Http\Request;

class OfferController2 extends Controller
{
   public function showbyajax()
   {
        $offer = offer::select('id','name','price','details' ,'image')->get() ;
        return view ('ajaxoffers.show' , ['data'=> $offer]) ;
   }


    public function create()
    {
        return view('ajaxoffers.create') ;
    }

    public function storebyajax(OfferRequest $request)
    {
        $fileName = $request ->image->getClientOriginalName();
       $newoffer = offer::create([

            'name' => request("name") , 
            'price' => request("price") ,
            'image' => $fileName ,
            'details' => request ('details') ,
        ]) ;
        $path = 'images/offers' ;
        $request -> image -> move (public_path($path), $fileName) ;
        
        if($newoffer)
        {
        return response()->json
        ([
            'status'=>true ,
            'msg' => 'This Offer Inserted Successfully'
        ]) ;
        }
        else
        {
            return response()->json
        ([
            'status'=>false ,
            'msg' => 'This Offer Failed Inserted' 
        ]) ;  
        }
        
    }

    public function ajaxedit($id)
    {
        $offer = offer::findorfail($id);
        return view('ajaxoffers.edit')->with(['data'=> $offer]) ;
    }
    public function ajaxupdate(OfferRequest $request)
    {
        $offer = offer::find($request ->id);
        $offer ->update($request->all ()) ;
      
         return response()->json
         ([
               'status'=>true , 
               'msg' => 'This Offer Updated Successfully'
          ]);
    }


    public function ajaxdelete(Request $request)
    {
        $offer = offer::find($request->id) ;
        $offer->delete() ;
        return response()->json
        ([
            'status'=>true ,
            'msg' => 'This Offer deleted Successfully' , 
        ]) ;
    }
}

