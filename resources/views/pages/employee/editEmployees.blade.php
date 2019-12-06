@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Edit Employee')
@section('content')
<div class="panel-body">
	@include('includes.alerts')
    <div class="row">
        <div class="col-lg-12">
            <h3>Edit Employee</h3>
            <form role="form" method="POST" action="{{url('updateEmployees')}}">
                <div class="col-md-4">
            
                    <div class="form-group">
                        <label>Employee Name<span style="color: red" class="required">*</span></label>
                        <input type="hidden" name="id" value="{{$employees->id}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input name="emp_name" class="form-control" value="{{$employees->emp_name}}" required="required" placeholder="Enter Name">
                        
                    </div>
                    <div class="form-group">
                    <label>Employee Grade<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="employeeGrade_id" required="required">
                        <option value="">Select One</option>
                        @foreach($employeeGrades as $employeeGrade)
                        <option {{ ($employees->employeeGrade_id == $employeeGrade->id) ? 'selected' : '' }} value="{{$employeeGrade->id}}">{{$employeeGrade->employeeGrade}}</option>
                        @endforeach
                    </select>
                    </div>
                    
                    <button type="submit" class="btn btn-default">Update</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>
            </form>
        </div>
     </div>
</div>
@endsection