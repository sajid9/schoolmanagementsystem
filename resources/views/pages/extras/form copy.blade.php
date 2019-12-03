@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Admission Form')
@section('content')
<div class="panel-body">
	@include('includes.alerts')
    <div class="row">
        <h3>Personal Details</h3>
        <div class="col-lg-12">
            <form role="form" method="post" action="{{url('addRegistration')}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>First Name</label>
                    <input name="first-name" class="form-control" placeholder="Enter First Name">
                    <p class="help-block color-red" >{{$errors->first('first-name')}}</p>
                </div>
                <div class="form-group">
                    <label>Middle Name</label>
                    <input name="middle-name" class="form-control" placeholder="Enter Middle Name">
                    <p class="help-block color-red" >{{$errors->first('middle-name')}}</p>
                </div>
                <div class="form-group">
                    <label>Last-Name</label>
                    <input name="last-name" class="form-control" placeholder="Enter Last Name">
                    <p class="help-block color-red" >{{$errors->first('last-name')}}</p>
                </div>
                <div class="form-group">
                    <label>Date of Birth</label>
                    <input type="Date" name="date-birth" class="form-control" placeholder="Enter Date of Birth">
                    <p class="help-block color-red" >{{$errors->first('date-birth')}}</p>
                </div>
                <div class="form-group">
                    <label >Gender</label>
                <div class="form-check-inline">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="optradio">Male
                 </label>
            
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="optradio">Female
                  </label>
                </div>
            </div>
                <div class="form-group">
                    <label>Email</label>
                    <p class="form-control-static">email@example.com</p>
                    <input name="email" class="form-control" placeholder="Enter Email">
                    <p class="help-block color-red" >{{$errors->first('email')}}</p>
                </div>
                
                <button type="submit" class="btn btn-default">Submit Button</button>
                <button type="reset" class="btn btn-default">Reset Button</button>
            </form>
        </div>
     </div>
</div>
@endsection