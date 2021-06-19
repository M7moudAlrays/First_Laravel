@extends('offers.index') 

@section('offer_content')
<!-- Contact Section-->
<section class=" mt-3">
  <div class="ml-2 mb-1">
    <a href="{{route('addoffer')}}" class="btn btn-success"> <i class="fas fa-folder-plus"></i> New Offer   </a>
  </div>
    <h4 class="alert alert-info text-center mb-0">{{__(' Offers Not Activated ')}}<h4>
    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col" class="text-primary text-center">#</th>
            <th scope="col" class="text-primary text-center">{{__('messages.offer_name')}}</th>
            <th scope="col" class="text-primary text-center">{{__('messages.offer_price')}}</th>
            <th scope="col" class="text-primary text-center">{{__('Offer Status')}}</th>
            <th scope="col" class="text-primary text-center"> {{__('messages.offer_control')}}</th>
          </tr>
        </thead>
        <tbody>
         @foreach($data as $offer)
            <tr>
                <th scope="row"  class="text-center">{{$offer->id}}</th>
                <td class="text-center">{{$offer->name}}</td>
                <td  class="text-center">{{$offer->price}}</td>
                <td  class="text-center">{{$offer->status}}</td>
                <td  class="text-center">
                    <a href="{{route('edit' ,$offer->id)}}"class="btn btn-info"> {{__('messages.update')}} </a>
                    <a href="{{route('delete' ,$offer->id)}}"class="btn btn-danger"> {{__('messages.delete')}}   </a>
                </td>
            </tr>
         @endforeach 
        </tbody>
      </table>
      @if(session()->has('msg'))
        <div class="alert alert-success mt-2 text-center">
          <h6>{{session()->get('msg')}}</h6> 
        </div>    
      @endif
</section>

@endsection

