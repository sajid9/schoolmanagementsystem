@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Edit Employee Salary')
@section('content')
<div class="panel-body">
	@include('includes.alerts')
    <div class="row">
        <div class="col-lg-12">
            <h3>Edit Employee Total Salary</h3>
            <form class="form-group row" role="form" method="post" action="{{url('updateEmployeeTotalSalary')}}"  enctype="multipart/form-data">

                <div class="col-md-4"> 

                    
                    
                    <div class="form-group">
                    <label>Employee Name<span style="color: red" class="required">*</span></label>
                    <input type="hidden" name="id" value="{{$employeeSalaries->id}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <select custom class="form-control" name="employee_id" id="" required="required">
                        <option value="">Select One</option>
                        @foreach($employees as $employee)
                        <option {{ ($employeeSalaries->employee_id == $employee->id) ? 'selected' : '' }} value="{{$employee->id}}"> {{ $employee->emp_name }} / {{ $employee->employeeGrades->employeeGrade }} </option>
                        @endforeach
                    </select>
                    </div>

                   <div class="form-group">
                    <label>Month<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="month_id" required="required">
                        <option value="">Select One</option>
                        @foreach($months as $month)
                        <option {{ ($employeeSalaries->month_id == $month->id) ? 'selected' : '' }} value="{{$month->id}}">{{$month->month_name}}</option>
                        @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Amount<span style="color: red" class="required">*</span></label>
                    <input name="totalAmount" class="form-control" value="{{$employeeSalaries->totalAmount}}" required="required" placeholder="Enter Amount">
                    </div>

                    <button type="submit" class="btn btn-default">Update Button</button>
                    <button type="reset" class="btn btn-default">Reset Button</button>
                </div>
            </form>
        </div>
     </div>
</div>


@endsection