@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Salary Charges Head')
@section('content')
<div class="panel-body">
	@include('includes.alerts')
    <div class="row">
        <div class="col-lg-12">
            <h3>Add Salary Charges Head</h3>
            <form role="form" method="post" action="{{url('addSalaryChargHead')}}">
             {{ csrf_field() }}

                <div class="col-md-4"> 
                    <div class="form-group">
                    <label>Charges Head Name<span style="color: red" class="required">*</span></label>
                    <input name="salaryChargHead" class="form-control" required="required" placeholder="Enter Name">
                    </div>
                
                    <button type="submit" class="btn btn-default">Submit Button</button>
                    <button type="reset" class="btn btn-default">Reset Button</button>
                </div>
            </form>
        </div>
     </div>
</div>


@endsection