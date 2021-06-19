@extends('layouts.app') 
<!-- Contact Section-->
@section( 'content')

<section>
    <div class="container mt-3">
        <h3 class="text-center text-secondary mb-2">Edit Offe By Ajax</h3>
     
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="alert alert-success mt-2 text-center" 
                         style="display: none" id="success-msg">
                        <h3> This Offer Updated Successfully </h3> 
                    </div>  
                <form method="POST" action="" enctype="" id="offerForm">
                    @csrf
                    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}" /> --}}
                    <div class="control-group">
                        <div class="form-group mb-1">                           
                            <input class="form-control" name="id" type="hidden" 
                                    placeholder="New Name" value="{{$data->id}}"/>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group mb-1">                           
                            <input class="form-control" name="name" type="text" 
                                    placeholder="New Name" value="{{$data->name}}"/>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="form-group mb-1">                          
                            <input class="form-control" name="price" type="text"
                              placeholder="New Price" value="{{$data->price}}" />
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="form-group  mb-1">
                            <input class="form-control" name="image" type="file" />
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="form-group  mb-1">
                            <input class="form-control" name="details" type="text" 
                            placeholder="New Details" value="{{$data->details}}"/>
                        </div>
                    </div>

                    <div class="form-group offset-5 ">
                        <button class="btn btn-primary pl-4 pr-4" id="update-offer"type="submit"> Update </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
@stop 

@section('scripts')
<script>
    $(document).on('click' ,'#update-offer' , function(e)
    {
        e.preventDefault() ;
        var formData = new FormData($('#offerForm')[0]);
        $.ajax({
                type: 'POST',
                enctype: 'multipart/form-data',
                url: "{{route('ajax.offers.update')}}",
                data:  formData , 
                //    { '_token' : "{{csrf_token()}}" ,
                //     'name': $("input[name='name']").val() ,
                //     'price': $("input[name='price']").val() , 
                //     'details': $("input[name='details']").val() ,
                //     'image': $("input[name='image']").val() ,
                //     } ,  
                processData: false ,
                contentType: false ,
                cache: false , 
                success: function(data)
                {
                    if(data.status == true) 
                    {
                        $('#success-msg').show() ;
                    }
                } ,
                error: function(reject){},
                })  ;
    }) ;
</script>
@stop

 