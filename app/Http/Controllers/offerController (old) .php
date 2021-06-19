<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OfferController extends Controller
{
    public function getoffers()
    {
        return offer::get() ;
        // return offer::select('name','price')->get() ;
    }

    public function insertoffers()
    {
        return view('offers.create') ;
    }

    public function storeoffers(OfferRequest $request)
    {
        offer::create([

            'name' => request("name") , 
            'price' => request("price") ,
            'details' => request ('details') ,
        ]) ;

        $massage = 'This Offer Inserted Successfully';
        return redirect()->back()->with(['msg' => $massage]);





        // $request->validate 
        // ([
        //     'name'=>'required|min:3|max:30|unique' , 
        //     'price'=>'required|min:2' ,
        //     'details'=>'required|min:5' ,  
        //  ]) ;
       

        $msg = $this->messages() ;
        $rul = $this->rules() ;
        $validate = Validator::make($request->all() , $rul , $msg) ;
   
        if($validate->fails())
        {
            return redirect()->back()->withErrors($validate)->withInput($request->all()) ; 
        }
    }


 protected function rules()
    {
        return $ruls = 
        [
            'name'=>'required|min:3|max:30' , 
            'price'=>'required|min:2' ,
            'details'=>'required|min:5' ,  
        ] ;
    }
    
    protected  function messages()
    {
        return $messages = 
         [
            'name.required'=>__('messages.offer name required') ,
            'name.min'=>'name Must greater than 3 chars ' ,
            'price.required'=>__('messages.offer price required') ,
            'details.required'=>'pleaz Must enter offer details' ,
        ] ;   
    }

}
