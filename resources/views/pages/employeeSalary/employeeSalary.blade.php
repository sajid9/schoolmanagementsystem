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

             <input type="hidden" name="month_id" id="month_id">
                <div class="col-md-4">
                    <div class="form-group">
                    <label>Employee Total Salary Id<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="empTotalSalary_id" id="empTotalSalary_id"  required="required">
                        <option value="">Select One</option>
                        @foreach($empTotalSalaries as $empTotalSalary)
                        <option data-grade="{{$empTotalSalary->employees->employeeGrades->id}}" value="{{$empTotalSalary->employees->id}}" month-Id="{{$empTotalSalary->month_id}}"> {{ $empTotalSalary->employees->emp_name }} / {{ $empTotalSalary->employees->employeeGrades->employeeGrade }} / {{ $empTotalSalary->months->month_name }} / {{$empTotalSalary->totalAmount}}  

                         </option>   
                      
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

    var  empTotalSalary_id=$('#empTotalSalary_id :selected').val();
     var  chargHead=$('#chargHead :selected').val();

    
     $(document).on('change','#empTotalSalary_id',function(){
       empTotalSalary_id=$('#empTotalSalary_id :selected').data('grade');
       // console.log(empTotalSalary_id);
      var  month_id=$('#empTotalSalary_id :selected').attr("month-Id");

  

       $('#month_id').val(month_id);
    
      chargHead=$('#chargHead :selected').val();
    
      
     if (chargHead=='' || empTotalSalary_id=='' ) {
  // alert(empTotalSalary_id+"AND"+chargHead)
        //alert("Select Related option and option should not be empty")
     }else{

          var request = $.ajax({
          url: "{{url('salaryHeadAmount')}}",
          type: "POST", 
          data:{chargHead:chargHead,empTotalSalary_id:empTotalSalary_id,_token:"{{ csrf_token() }}"},
          dataType: "json"
        });
        request.done(function(msg) {
            console.log(msg);
           if (msg.length==0) {
          $('#salaryAmount').val(0);
            }else{
               $('#salaryAmount').val(msg[0].salaryAmount);   
            }
        });
        request.fail(function(jqXHR, textStatus) {
         console.log("fail");
        });

     }


      });

    
     $(document).on('change','#chargHead',function(){
       chargHead=$(this).val();
        empTotalSalary_id=$('#empTotalSalary_id :selected').data('grade');

        console.log(chargHead+empTotalSalary_id)
        // alert(empTotalSalary_id+"AND"+ chargHead)
       if (chargHead=='' || empTotalSalary_id=='' ) {

      //alert("Select Related option and option should not be empty")
     }else{

       

    var request = $.ajax({
          url: "{{url('salaryHeadAmount')}}",
          type: "POST",
          data:{chargHead:chargHead,empTotalSalary_id:empTotalSalary_id,_token:"{{ csrf_token() }}"},
          dataType: "json"
        });
        request.done(function(msg) {
            console.log(msg);
            if (msg.length==0) {
          $('#salaryAmount').val(0);
            }else{
               $('#salaryAmount').val(msg[0].salaryAmount);   
            }
        
        });
        request.fail(function(jqXHR, textStatus) {
         console.log("fail");
        });



     }

      });


  
    // $(document).on('change','#chargHead',function(){
    //     var std= $(this).val();
    //     var token=$('input[name="_token"]').val();
    //     var request = $.ajax({
    //       url: "{{url('salaryHeadAmount')}}",
    //       type: "POST",
    //       data:{amount:std,_token:token},
    //       dataType: "json"
    //     });
    //     request.done(function(msg) {
    //         console.log(msg);
    //      $('#salaryAmount').val(msg[0].salaryAmount);
    //     });
    //     request.fail(function(jqXHR, textStatus) {
    //      console.log("fail");
    //     });
   
    // });
</script>
@endsection