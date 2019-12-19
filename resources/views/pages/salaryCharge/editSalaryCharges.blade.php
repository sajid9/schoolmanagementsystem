@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Edit Salary Charges')
@section('content')
<div class="panel-body">
	@include('includes.alerts')
    <div class="row">
        <div class="col-lg-12">
            <h3>Edit Salary Charges</h3>
            <form class="form-group row" role="form" method="post" action="{{url('updateSalaryCharges')}}"  enctype="multipart/form-data">

                <div class="col-md-4"> 


                    <div class="form-group">
                    <label>Charges Category <span style="color: red" class="required">*</span></label>
                    <input type="hidden" name="id" value="{{$salaryCharges->id}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <select custom class="form-control" name="chargCategory_id" required="required">
                        <option value="">Select One</option>
                        @foreach($chargCategories as $chargCategory)
                        <option {{ ($salaryCharges->chargCategory_id == $chargCategory->id) ? 'selected' : '' }} value="{{$chargCategory->id}}">{{$chargCategory->salaryChargCategory}}</option>
                        @endforeach
                    </select>
                    </div>
                    
                    <div class="form-group">
                    <label>Charges Head <span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="chargHead_id" required="required">
                        <option value="">Select One</option>
                        @foreach($chargHeads as $chargHead)
                        <option {{ ($salaryCharges->chargHead_id == $chargHead->id) ? 'selected' : '' }} value="{{$chargHead->id}}">{{$chargHead->salaryChargHead}}</option>
                        @endforeach
                    </select>
                    </div>
                    
                   <div class="form-group">
                    <label>Employee Grade<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="employeeGrade_id" required="required">
                        <option value="">Select One</option>
                        @foreach($employeeGrades as $employeeGrade)
                        <option {{ ($salaryCharges->employeeGrade_id == $employeeGrade->id) ? 'selected' : '' }} value="{{$employeeGrade->id}}">{{$employeeGrade->employeeGrade}}</option>
                        @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Amount<span style="color: red" class="required">*</span></label>
                    <input name="salaryAmount" class="form-control" value="{{$salaryCharges->salaryAmount }}" required="required" placeholder="Enter Amount">
                    </div>

                    <div class="form-group">
                    <label>Transaction Type<span style="color: red" class="required">*</span></label>
                    <input name="transactionType" class="form-control" value="{{$salaryCharges->transactionType}}" placeholder="Enter Transaction Type">
                    </div>

                    <button type="submit" class="btn btn-default">Update Button</button>
                    <button type="reset" class="btn btn-default">Reset Button</button>
                </div>
            </form>
        </div>
     </div>
</div>


@endsection