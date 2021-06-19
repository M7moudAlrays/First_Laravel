@extends('layouts.app')
@section('content')
    <div class="container">


        <div class="flex-center position-ref full-height">
            <div class="content">
                <table class="table">
                    <h2 class="alert alert-info text-center"> Doc Services </h2>
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                    </tr>
                    </thead>

                    <tbody>
                        @if(isset($services) && $services -> count() > 0 )
                            @foreach($services as $service)
                                <tr>
                                    <th scope="row">{{$service -> id}}</th>
                                    <td>{{$service -> name}}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table> <br><br>

                <form method="POST" action="{{route('save.services')}}">    
                    @csrf
                    {{-- <input name="_token" value="{{csrf_token()}}"> --}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">choose doctor</label>
                        <select class="form-control" name="doctor_id" >
                            @foreach($doctors as $doctor)
                                <option value="{{$doctor -> id}}">{{$doctor -> name}}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> choose services </label>
                        <select class="form-control" name="servicesIds[]" multiple>
                            @if(isset($allServices) && $allServices->count() > 0 )
                                @foreach($allServices as $allService)
                                    <option value="{{$allService -> id}}">{{$allService -> name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">{{__('Save Services')}}</button>
                </form>
            </div>
        </div>
    </div>
@stop

