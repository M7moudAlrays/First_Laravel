<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
{
    
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return 
        [
            'name'=>'required|min:3|max:30' , 
            'price'=>'required|min:2' ,
            'details'=>'required|min:5' ,
            // 'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg
            //             |max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',  
        ] ;
    }
    
    public  function messages()
    {
        return 
         [
            'name.required'=>__('messages.offer name required') ,
            'name.min'=>'name Must greater than 3 chars ' ,
            'price.required'=>__('messages.offer price required') ,
            'details.required'=>'Must enter offer details' ,
            'image.image' => 'File Must be Image Type' ,
        ] ;   
    }
}
