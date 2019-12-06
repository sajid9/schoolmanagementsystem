@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Employees')
@section('content')
<div class="panel-body">
	@include('includes.alerts')
    <div class="row">
        <div class="col-lg-12">
            <h3>Add Employe</h3>
            <form role="form" method="post" action="{{url('addEmployees')}}">
             {{ csrf_field() }}

                <div class="col-md-4"> 
                    <div class="form-group">
                    <label>Employee Name<span style="color: red" class="required">*</span></label>
                    <input name="emp_name" class="form-control" required="required" placeholder="Enter Employe Name">
                    </div>

                    <div class="form-group">
                    <label>Employee Grade<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="employeeGrade_id" required="required">
                        <option value="">Select One</option>
                        @foreach($employeeGrades as $employeeGrade)
                        <option value="{{$employeeGrade->id}}">{{$employeeGrade->employeeGrade}}</option>
                        @endforeach
                    </select>
                    </div>
                    
                
                    <button type="submit" class="btn btn-default">Submit Button</button>
                    <button type="reset" class="btn btn-default">Reset Button</button>
                </div>
            </form>
        </div>
     </div>
</div>


@endsection