<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Doctor;
use App\Models\offer;
use App\Scopes\OfferScope;
use Imagick ;
use Facade\Ignition\DumpRecorder\Dump;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OfferController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function getoffers()
    {
        // $offer = offer::all() ;
        $offers = offer::select('id','name','price','details' ,'image')->get() ;
        return view ('offers.show' , ['data'=> $offers]) ;
    }

    public function insertoffers()
    {
        return view('offers.create') ;
    }

    public function storeoffers(OfferRequest $request)
    {
        // $file_extension = $request->image-> getClientOriginalExtension() ;
        // $file_name = time(). '.' .$file_extension ;
        
        $fileName = $request ->image->getClientOriginalName();
        // dd($file) ;
        // dd($file_extension,$fileName, $path) ;
        offer::create([

            'name' => request("name") , 
            'price' => request("price") ,
            'image' => $fileName,
            'details' => request ('details') ,
        ]) ;
        $path = 'images/offers' ;
        $request -> image -> move (public_path($path), $fileName) ;
        return redirect()->back()->with(['msg' => 'This Offer Inserted Successfully']);
    }

   
    public function editoffers($id)
    {
        $offer = offer::findorfail($id);
        return view('offers.edit' ,['data'=>$offer]) ;
    }

    public function updateoffers(OfferRequest $request , $id)
    {
        $offer = offer::findorfail($id);
        $offer ->update($request->all ()) ;
        return redirect()->back()->with(['msg' => 'This Offer Updated Successfully']);

        // [
        //     'name' => $request("name") , 
        //     'price' => $request("price") ,
        //     'details' => $request ('details') ,
        // ]
    }

    public function deleteoffer($id)
    {
        $offer = offer::findorfail($id) ;
        $offer->delete() ;
        return redirect()->back()->with(['msg' => 'This Offer Deleted ']);
    }


    
    public function getoffersbypagination()
    {
        $offers = offer::select('id','name','price','details','image')->paginate(2) ;
        return view ('offers.paginations' ,compact('offers'));
    }

    public function getOffersNotActivated()
    {
        // $offer = offer::all() ;
        // $offers = offer::select('id','name','price','status')->inactive()->get() ;
        // return view ('offers.show_inactives' , ['data'=> $offers]) ;

                                    // global scope
        $offers =  Offer::select('id','name','price','status')->get(); 
        return view ('offers.show_inactives' , ['data'=> $offers]) ; 
               
                                  // how to remove global scope
        // $offers  = Offer::select('id','name','price','status')->withoutGlobalScope(OfferScope::class)->get();
        // return view ('offers.show_inactives' , ['data'=> $offers]) ; 
    }
}
