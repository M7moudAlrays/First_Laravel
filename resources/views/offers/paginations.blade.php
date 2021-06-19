@extends('offers.index') 

@section('offer_content')
<!-- Contact Section-->
<section class=" mt-3">
  <div class="ml-2 mb-1">
    <a href="{{route('addoffer')}}" class="btn btn-success"> <i class="fas fa-folder-plus"></i> New Offer   </a>
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
         @foreach($offers as $offer)
            <tr>
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
                </td>
            </tr>
         @endforeach 
        </tbody>
      </table>
</section>

<div class="d-flex justify-content-center">
    {!! $offers -> links() !!}
</div>

@endsection


