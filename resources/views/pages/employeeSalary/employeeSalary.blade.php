@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Employee Salary')
@section('content')
<div class="panel-body">
	@include('includes.alerts')
    <div class="row">
        <div class="col-lg-12">
            <h3>Add Employee Salary</h3>
            <form role="form" method="post" action="{{url('addEmployeeSalary')}}">
             {{ csrf_field() }}

                <div class="col-md-4">
                    <div class="form-group">
                    <label>Employee Total Salary Id<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="empTotalSalary_id" id="" required="required">
                        <option value="">Select One</option>
                        @foreach($empTotalSalaries as $empTotalSalary)
                        <option value="{{$empTotalSalary->id}}"> {{ $empTotalSalary->employees->emp_name }} / {{ $empTotalSalary->employees->employeeGrades->employeeGrade }} / {{ $empTotalSalary->months->month_name }} / {{$empTotalSalary->totalAmount}} </option>
                        @endforeach
                    </select>
                    </div>

                   
                    <div class="form-group">
                    <label>Charges Head <span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="chargHead_id" id="chargHead" required="required">
                        <option value="">Select One</option>
                        @foreach($chargHeads as $chargHead)
                        <option value="{{$chargHead->id}}">{{$chargHead->salaryChargHead}} </option>
                        @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Amount<span style="color: red" class="required">*</span></label>
                    <input name="salaryAmount" id="salaryAmount" class="form-control"  required="required" placeholder="Enter Amount">
                    </div>
                    
                   <div class="form-group">
                    <label>Charges Type<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="chargType_id" required="required">
                        <option value="">Select One</option>
                        @foreach($chargTypes as $chargType)
                        <option value="{{$chargType->id}}">{{$chargType->salaryChargType}}</option>
                        @endforeach
                    </select>
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

@section('footer')
@parent

<script>
    $(document).on('change','#chargHead',function(){
        var std= $(this).val();
        var token=$('input[name="_token"]').val();
        var request = $.ajax({
          url: "{{url('salaryHeadAmount')}}",
          type: "POST",
          data:{amount:std,_token:token},
          dataType: "json"
        });
        request.done(function(msg) {
            console.log(msg);
         $('#salaryAmount').val(msg[0].salaryAmount);
        });
        request.fail(function(jqXHR, textStatus) {
         console.log("fail");
        });
   
    });
</script>
@endsection