@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Student Fee')
@section('content')
<div class="panel-body">
	@include('includes.alerts')
    <div class="row">
        <div class="col-lg-12">
            <h3>Add Student Fee</h3>
            
<form role="form" method="post" action="{{url('addStudentFee')}}">
             {{ csrf_field() }}

             <input type="hidden" name="month_id" id="month_id">
                <div class="col-md-4">
                    <div class="form-group">
                    <label>Student Total Fee Id<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="stdTotalFee_id" id="stdTotalFee_id"  required="required">
                        <option value="">Select One</option>
                        @foreach($stdTotalFees as $stdTotalFee)
                        <option data-grade="{{$stdTotalFee->enrollments->batches->classes->id}}" value="{{$stdTotalFee->enrollments->id}}" month-Id="{{$stdTotalFee->month_id}}"> {{ $stdTotalFee->enrollments->admissions->registrations->firstName }} /  {{ $stdTotalFee->enrollments->admissions->registrations->gfirstName }} / {{ $stdTotalFee->enrollments->batches->classes->C_name }} / {{ $stdTotalFee->months->month_name }} / {{$stdTotalFee->totalAmount}}  

                         </option>   
                      
                        @endforeach 
                    </select>
                    </div>

                   
                    <div class="form-group">
                    <label>Charges Head <span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="chargHead_id" id="chargHead" required="required">
                        <option value="">Select One</option>
                        @foreach($chargHeads as $chargHead)
                        <option value="{{$chargHead->id}}">{{$chargHead->feeChargHead}} </option>
                        @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Amount<span style="color: red" class="required">*</span></label>
                    <input name="feeAmount" id="feeAmount" class="form-control"  required="required" placeholder="Enter Amount">
                    </div>
                    
                   <div class="form-group">
                    <label>Charges Type<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="chargType_id" required="required">
                        <option value="">Select One</option>
                        @foreach($chargTypes as $chargType)
                        <option value="{{$chargType->id}}">{{$chargType->feeChargType}}</option>
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

                    <div class="form-group">
                    <label>Remarks</label>
                    <input name="remarks" id="remarks" class="form-control" placeholder="Enter Remarks">
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

    var  stdTotalFee_id=$('#stdTotalFee_id :selected').val();
     var  chargHead=$('#chargHead :selected').val();

    
     $(document).on('change','#stdTotalFee_id',function(){
       stdTotalFee_id=$('#stdTotalFee_id :selected').data('grade');
       // console.log(stdTotalFee_id);
      var  month_id=$('#stdTotalFee_id :selected').attr("month-Id");

  

       $('#month_id').val(month_id);
    
      chargHead=$('#chargHead :selected').val();
    
      
     if (chargHead=='' || stdTotalFee_id=='' ) {
  // alert(empTotalSalary_id+"AND"+chargHead)
        //alert("Select Related option and option should not be empty")
     }else{

          var request = $.ajax({
          url: "{{url('feeHeadAmount')}}",
          type: "POST", 
          data:{chargHead:chargHead,stdTotalFee_id:stdTotalFee_id,_token:"{{ csrf_token() }}"},
          dataType: "json"
        });
        request.done(function(msg) {
            console.log(msg);
           if (msg.length==0) {
          $('#feeAmount').val(0);
            }else{
               $('#feeAmount').val(msg[0].feeAmount);   
            }
        });
        request.fail(function(jqXHR, textStatus) {
         console.log("fail");
        });

     }


      });

    
     $(document).on('change','#chargHead',function(){
       chargHead=$(this).val();
        stdTotalFee_id=$('#stdTotalFee_id :selected').data('grade');

        console.log(chargHead+stdTotalFee_id)
        // alert(stdTotalFee_id+"AND"+ chargHead)
       if (chargHead=='' || stdTotalFee_id=='' ) {

      //alert("Select Related option and option should not be empty")
     }else{

       

    var request = $.ajax({
          url: "{{url('feeHeadAmount')}}",
          type: "POST",
          data:{chargHead:chargHead,stdTotalFee_id:stdTotalFee_id,_token:"{{ csrf_token() }}"},
          dataType: "json"
        });
        request.done(function(msg) {
            console.log(msg);
            if (msg.length==0) {
          $('#feeAmount').val(0);
            }else{
               $('#feeAmount').val(msg[0].feeAmount);   
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