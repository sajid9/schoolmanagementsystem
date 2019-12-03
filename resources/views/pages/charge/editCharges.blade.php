@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Edit charges')
@section('content')
<div class="panel-body">
	@include('includes.alerts')
    <div class="row">
        <div class="col-lg-12">
            <h3>Edit Charges</h3>

            <form role="form" method="POST" action="{{url('updateCharges')}}">
            
                <div class="form-group">
                    <label>Name</label>
                    <input type="hidden" name="id" value="{{$charge->id}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input name="name" class="form-control" value="{{$charge->name}}" placeholder="Enter Name">
                    <p class="help-block color-red" >{{$errors->first('name')}}</p>
                </div>
                <div class="form-group">
                    <label>Amount</label>
                    <input name="price" class="form-control" value="{{$charge->price}}" placeholder="Enter Amount">
                    <p class="help-block color-red" >{{$errors->first('price')}}</p>
                </div>
                
                <button type="submit" class="btn btn-default">Update</button>
                <button type="reset" class="btn btn-default">Reset</button>
            </form>
        </div>
     </div>
</div>
@endsection