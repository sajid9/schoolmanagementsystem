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
            <h3>Edit Employee Salary</h3>
            <form class="form-group row" role="form" method="post" action="{{url('updateEmployeeSalary')}}"  enctype="multipart/form-data">

                <div class="col-md-4"> 

                    
                    
                    <div class="form-group">
                    <label>Employee Name<span style="color: red" class="required">*</span></label>
                    <input type="hidden" name="id" value="{{$employeeSalaries->id}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <select custom class="form-control" name="employee_id" id="" required="required">
                        <option value="">Select One</option>
                        @foreach($employees as $employee)
                        <option {{ ($employeeSalaries->employee_id == $employee->id) ? 'selected' : '' }} value="{{$employee->id}}"> {{ $employee->emp_name }} </option>
                        @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                    <label>CNIC<span style="color: red" class="required">*</span></label>
                    <input name="emp_cnic" value="{{$employeeSalaries->emp_cnic }}" class="form-control" placeholder="Enter CNIC Num">
            
                    </div>
                    
                    <div class="form-group">
                    <label>Charges Head <span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="chargHead_id" required="required">
                        <option value="">Select One</option>
                        @foreach($chargHeads as $chargHead)
                        <option {{ ($employeeSalaries->chargHead_id == $chargHead->id) ? 'selected' : '' }} value="{{$chargHead->id}}">{{$chargHead->salaryChargHead}}</option>
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
                    <label>Date<span style="color: red" class="required">*</span></label>
                    <input type="Date" name="salary_date" value="{{$employeeSalaries->salary_date}}" class="form-control" placeholder="Enter Date" required="required">
                    </div>

                    <div class="form-group">
                    <label>Amount<span style="color: red" class="required">*</span></label>
                    <input name="salaryAmount" class="form-control" value="{{$employeeSalaries->salaryAmount}}" required="required" placeholder="Enter Amount">
                    </div>

                   <div class="form-group">
                    <label>Transaction Type<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="transactionType" id="transactionType" placeholder="Enter Recept Type">
                        <option value="">Select One</option>
                        <option {{($employeeSalaries->transactionType == 'credit') ? 'selected': ''}} value="credit" >Credit</option>
                        <option {{($employeeSalaries->transactionType == 'debit') ? 'selected': ''}} value="debit" >Debit</option>
                    </select>
                    </div>

                    <button type="submit" class="btn btn-default">Update Button</button>
                    <button type="reset" class="btn btn-default">Reset Button</button>
                </div>
            </form>
        </div>
     </div>
</div>


@endsection