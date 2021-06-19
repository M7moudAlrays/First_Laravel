@extends('layouts.app') 
<!-- Contact Section-->
@section( 'content')
<section class=" mt-3">
    <div class="ml-2 mb-1">
        <a href="{{route('ajax.create')}}" class="btn btn-primary"><i class="fas fa-folder-plus"></i> New Offer   </a>
    </div>
    <h4 class="alert alert-info text-center mb-0">{{__('messages.title of table')}}<h4>
    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col" class="text-primary">#</th>
            <th scope="col" class="text-primary">{{__('messages.offer_name')}}</th>
            <th scope="col" class="text-primary">{{__('messages.offer_price')}}</th>
            <th scope="col" class="text-primary">{{__('messages.offer_details')}}</th>
            <th scope="col" class="text-primary"> Offer Image </th>
            <th scope="col" class="text-primary"> {{__('messages.offer_control')}}</th>
          </tr>
        </thead>
        <tbody>
         @foreach($data as $offer)
            <tr class="offer-row{{$offer->id}}">
                <th scope="row">{{$offer->id}}</th>
                <td>{{$offer->name}}</td>
                <td>{{$offer->price}}</td>
                <td>{{$offer->details}}</td>
                <td> <img src="{{asset('images/offers')}}/{{$offer->image}}" 
                     alt="Card image" class="rounded" height="50px"  width="150px">
                </td>
                <td>
                    <a href="{{route('edit' ,$offer->id)}}"class="btn btn-info"> {{__('messages.update')}} </a>
                    <a href="{{route('delete' ,$offer->id)}}"class="btn btn-danger"> {{__('messages.delete')}}   </a>
                    <a href="{{route('ajax-edit',$offer->id)}}" class="btn btn-danger btn-edit"> update by ajax   </a>
                    <a offer_id ="{{$offer->id}}" href="" class="btn btn-danger btn-delete"> Delete by ajax   </a>
                </td>
            </tr>
         @endforeach 
        </tbody>
      </table>
      <div class="alert alert-success mt-2 text-center" 
           style="display: none" id="success-msg">
            <h3> This Offer deleted Successfully </h3> 
      </div> 
</section>
@stop

@section('scripts')
<script>
     $(document).on('click' ,'.btn-delete' , function(e)
    {
        e.preventDefault() ;
        var OfId = $(this).attr('offer_id')
        $.ajax({
                type: 'POST',
                url: "{{route('ajax-delete')}}",
                data:  
                   { 
                       '_token' : "{{csrf_token()}}" ,
                        'id': OfId ,
                   }, 
                success: function(data)
                {
                    if(data.status == true) 
                    {
                        $('#success-msg').show() ;
                    }
                    $('.offer-row'+OfId).remove() ;
                } ,
                error: function(reject){},
                })  ;
    }) ;

    
</script>
@stop