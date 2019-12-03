@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Charges')
@section('content')
<div class="panel-body">
	@include('includes.alerts')
    <div class="row">
        <div class="col-lg-12">
            <h3>Add Charges</h3>
            <form class="form-group row" role="form" method="post" action="{{url('addCharges')}}">
             {{ csrf_field() }}

                <div class="col-sm-4">
                    <label>Name</label>
                    <select custom class="form-control" name="name">
                        <option value="">Select Category</option>
                        <option>Admission</option>
                        <option>Security</option>
                        <option>Trafic</option>
                        <option>Library</option>
                        <option>Computer lab</option>
                        <option>Uniform</option>
                    </select>
                    <p class="help-block color-red" >{{$errors->first('name')}}</p>
                </div>
               <!-- <div class="form-group">
                    <label>Name</label>
                    <input name="name" class="form-control">
                    <p class="help-block color-red" >{{$errors->first('name')}}</p>
                </div> -->
                <div class="col-sm-4">
                    <label>Amount</label>
                    <input name="price" class="form-control" placeholder="Enter Amount">
                    <p class="help-block color-red" >{{$errors->first('price')}}</p>
                </div>
                <div class="col-sm-4">
                    <label>Amount</label>
                    <input name="price" class="form-control" placeholder="Enter Amount">
                    <p class="help-block color-red" >{{$errors->first('price')}}</p>
                </div>
                <div class="col-sm-4">
                    <label>Amount</label>
                    <input name="price" class="form-control" placeholder="Enter Amount">
                    <p class="help-block color-red" >{{$errors->first('price')}}</p>
                </div>
                <div class="col-sm-4">
                    <label>Amount</label>
                    <input name="price" class="form-control" placeholder="Enter Amount">
                    <p class="help-block color-red" >{{$errors->first('price')}}</p>
                </div>
             
                
                <button type="submit" class="btn btn-default">Submit Button</button>
                <button type="reset" class="btn btn-default">Reset Button</button>
            </form>
        </div>
     </div>
</div>
@endsection