@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Edit Teacher')
@section('content')
<div class="panel-body">
	@include('includes.alerts')
    <div class="row">
        <div class="col-lg-12">
            <h3>Edit Teacher</h3>
            <form role="form" method="POST" action="{{url('updateTeacher')}}">
            
                <div class="form-group">
                    <label>Name</label>
                    <input type="hidden" name="id" value="{{$teach->id}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input name="name" class="form-control" value="{{$teach->name}}" placeholder="Enter Name">
                    <p class="help-block color-red" >{{$errors->first('name')}}</p>
                </div>
                
                <div class="form-group">
                    <label>Phone No:</label>
                    <input name="phone" class="form-control" value="{{$teach->phone}}" placeholder="Enter Phone No">
                    <p class="help-block color-red" >{{$errors->first('phone')}}</p>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <p class="form-control-static">email@example.com</p>
                    <input name="email" class="form-control" value="{{$teach->email}}" placeholder="Enter Email">
                    <p class="help-block color-red" >{{$errors->first('email')}}</p>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <textarea name="address" class="form-control"  rows="3" placeholder="Enter Address">{{$teach->address}}</textarea>
                    <p class="help-block color-red">{{$errors->first('address')}}</p>
                </div>
                <div class="form-group">
                    <label>Qualification</label>
                    <input name="qualification" class="form-control" value="{{$teach->qualification}}" placeholder="Enter Qualification">
                    <p class="help-block color-red" >{{$errors->first('qualification')}}</p>
                </div>
                
                <button type="submit" class="btn btn-default">Update</button>
                <button type="reset" class="btn btn-default">Reset</button>
            </form>
        </div>
     </div>
</div>
@endsection