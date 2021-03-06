@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Salary Charges')
@section('content')
<div class="panel-body">
	@include('includes.alerts')
    <div class="row">
        <div class="col-lg-12">
            <h3>Add Salary Charges</h3>
            <form role="form" method="post" action="{{url('addSalaryCharges')}}">
             {{ csrf_field() }}

                <div class="col-md-4">

                    <div class="form-group">
                    <label>Charges Category <span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="chargCategory_id" required="required">
                        <option value="">Select One</option>
                        @foreach($chargCategories as $chargCategory)
                        <option value="{{$chargCategory->id}}">{{$chargCategory->salaryChargCategory}}</option>
                        @endforeach
                    </select>
                    </div>
                    
                    <div class="form-group">
                    <label>Charges Head <span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="chargHead_id" required="required">
                        <option value="">Select One</option>
                        @foreach($chargHeads as $chargHead)
                        <option value="{{$chargHead->id}}">{{$chargHead->salaryChargHead}}</option>
                        @endforeach
                    </select>
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

                    <div class="form-group">
                    <label>Amount<span style="color: red" class="required">*</span></label>
                    <input name="salaryAmount" class="form-control"  required="required" placeholder="Enter Amount">
                    </div>

                    <div class="form-group">
                    <label>Transaction Type<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="transactionType" id="transactionType" placeholder="Enter Recept Type">
                        <option value="">Select One</option>
                        <option value="credit" >Credit</option>
                        <option value="debit" >Debit</option>
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