@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Teachers Form')
@section('content')
<div class="panel-body">
    @include('includes.alerts')
    <div class="row">
        <div class="col-lg-12">
            <h3>Add Teacher</h3>
            <form role="form" method="post" action="{{url('addTeachers')}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Name</label>
                    <input name="name" class="form-control" placeholder="Enter Name">
                    <p class="help-block color-red" >{{$errors->first('name')}}</p>
                </div>
                
                <div class="form-group">
                    <label>Phone No:</label>
                    <input name="phone" class="form-control" placeholder="Enter Phone No">
                    <p class="help-block color-red" >{{$errors->first('phone')}}</p>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <p class="form-control-static">email@example.com</p>
                    <input name="email" class="form-control" placeholder="Enter Email">
                    <p class="help-block color-red" >{{$errors->first('email')}}</p>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <textarea name="address" class="form-control" rows="3" placeholder="Enter Address"></textarea>
                    <p class="help-block color-red">{{$errors->first('address')}}</p>
                </div>
                <div class="form-group">
                    <label>Qualification</label>
                    <input name="qualification" class="form-control" placeholder="Enter Qualification">
                    <p class="help-block color-red" >{{$errors->first('qualification')}}</p>
                </div>

                
                <button type="submit" class="btn btn-default">Submit Button</button>
                <button type="reset" class="btn btn-default">Reset Button</button>
            </form>
        </div>
     </div>
</div>
@endsection