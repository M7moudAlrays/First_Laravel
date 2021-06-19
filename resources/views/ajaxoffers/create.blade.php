@extends('layouts.app') 
<!-- Contact Section-->

@section( 'content')
<section>
    <div class="container mt-3">
        <h3 class="text-center text-secondary mb-2">Add Offer By Ajax</h3>
        <div class="row">
            <div class="col-md-6 mx-auto">
               
                    <div class="alert alert-success mt-2 text-center" 
                         style="display: none" id="success-msg">
                        <h3> This Offer Inserted Successfully </h3> 
                    </div>   
                
                <form method="post" action="" enctype="" id="offerForm">
                    @csrf
                    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}" /> --}}
                    
                    <div class="control-group">
                        <div class="form-group mb-1">                           
                            <input class="form-control" name="name" type="text" placeholder="Name"/>
                        </div>
                        <small id="name_error" class="form-text text-danger mt-1 mb-1"></small>
                    </div>
                    <div class="control-group">
                        <div class="form-group mb-1">                          
                            <input class="form-control" name="price" type="text" placeholder="Price"/>           
                        </div>
                        <small id="price_error" class="form-text text-danger"></small>
                    </div>

                    <div class="control-group">
                        <div class="form-group mb-1">                          
                            <input class="form-control" name="image" type="file" />
                        </div>
                        <small id="image_error" class="form-text text-danger mt-1 mb-1"></small>
                    </div>

                    <div class="control-group">
                        <div class="form-group  mb-1">
                            <input class="form-control" name="details" type="text" placeholder="Details" autocomplete />
                        </div>
                        <small id="details_error" class="form-text text-danger mt-1 mb-1"></small>
                    </div>

                    <div class="form-group offset-5 ">
                        <button  id="save-offer" class="btn btn-primary pl-4 pr-4">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@stop 

@section('scripts')
<script>
    $(document).on('click' ,'#save-offer' , function(e)
    {
        e.preventDefault() ;
            
            $('#name_error').text('');
            $('#price_error').text('');
            $('#details_error').text('');
            $('#image_error').text('');
        var formData = new FormData($('#offerForm')[0]);
        $.ajax({
                type: 'POST',
                enctype: 'multipart/form-data',
                url: "{{route('ajax.offers.store')}}",
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
                error: function (reject) 
                {
                    // $('.error-msg').show() ;
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) 
                    {
                        $("#" + key + "_error").text(val[0]);
                    });
                } 
        }) ;
    }) ;
</script>
@stop

 