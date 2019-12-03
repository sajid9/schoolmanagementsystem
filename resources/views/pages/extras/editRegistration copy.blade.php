@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Edit Form')
@section('content')
<div class="panel-body">
	@include('includes.alerts')
    <div class="row">
        <div class="col-lg-12">
            <form role="form" method="POST" action="{{url('updateRegistration')}}">
            
                <div class="form-group">
                    <label>Name</label>
                    <input type="hidden" name="id" value="{{$reg->id}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input name="name" class="form-control" value="{{$reg->name}}" placeholder="Enter Name">
                    <p class="help-block color-red" >{{$errors->first('name')}}</p>
                </div>
                <div class="form-group">
                    <label>Father Name</label>
                    <input name="f_name" class="form-control" value="{{$reg->f_name}}" placeholder="Enter Father Name">
                    <p class="help-block color-red" >{{$errors->first('f_name')}}</p>
                </div>
                <div class="form-group">
                    <label>Phone No:</label>
                    <input name="phone" class="form-control" value="{{$reg->phone}}" placeholder="Enter Phone No">
                    <p class="help-block color-red" >{{$errors->first('phone')}}</p>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <p class="form-control-static">email@example.com</p>
                    <input name="email" class="form-control" value="{{$reg->email}}" placeholder="Enter Email">
                    <p class="help-block color-red" >{{$errors->first('email')}}</p>
                </div>
                
                <button type="submit" class="btn btn-default">Update</button>
                <button type="reset" class="btn btn-default">Reset</button>
            </form>
        </div>
     </div>
</div>
@endsection