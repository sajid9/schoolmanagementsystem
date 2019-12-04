@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Edit Salary Charges Type')
@section('content')
<div class="panel-body">
	@include('includes.alerts')
    <div class="row">
        <div class="col-lg-12">
            <h3>Edit Salary Charges Type</h3>
            <form role="form" method="POST" action="{{url('updateSalaryChargType')}}">
                <div class="col-md-4">
            
                    <div class="form-group">
                        <label>Charges Type Name<span style="color: red" class="required">*</span></label>
                        <input type="hidden" name="id" value="{{$chargTypes->id}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input name="salaryChargType" class="form-control" value="{{$chargTypes->salaryChargType}}" required="required" placeholder="Enter Name">
                        
                    </div>
                    
                    <button type="submit" class="btn btn-default">Update</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>
            </form>
        </div>
     </div>
</div>
@endsection