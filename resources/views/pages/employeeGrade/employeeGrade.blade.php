@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Employee Grade')
@section('content')
<div class="panel-body">
	@include('includes.alerts')
    <div class="row">
        <div class="col-lg-12">
            <h3>Add Employee Grade</h3>
            <form role="form" method="post" action="{{url('addEmployeeGrade')}}">
             {{ csrf_field() }}

                <div class="col-md-4"> 
                    <div class="form-group">
                    <label>Employee Grade<span style="color: red" class="required">*</span></label>
                    <input name="employeeGrade" class="form-control" required="required" placeholder="Enter Name">
                    </div>
                
                    <button type="submit" class="btn btn-default">Submit Button</button>
                    <button type="reset" class="btn btn-default">Reset Button</button>
                </div>
            </form>
        </div>
     </div>
</div>


@endsection