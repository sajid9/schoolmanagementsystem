@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Attendence')
@section('content')

        <div class="row">
          @include('includes.alerts')
          <div class="col-lg-12">
           <div class="panel panel-default">
             <div class="panel-heading">
              Students Attendence
              {{-- <a href="{{ url('/cEnrollments')}}" type="button" class="btn btn-primary btn-sm pull-right">Add New</a>       --}}
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
             <div class="table-responsive">
              
               <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                  <tr>
                    <th>Student</th>
                    <th>Father/Guardian</th>
                    <th>Roll Number</th>
                    <th>Today Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                 @foreach($data->batches->classenroll as $classroll)
                 <tr>
                  
                   <td>{{$classroll->admissions->registrations->firstName}}</td>
                   <td>{{$classroll->admissions->registrations->gfirstName}}</td>
                   <td>{{$classroll->admissions->rollnumber}}</td>
                  {{--  <td>{!!(@$data->is_active == 'yes')? '<span class="label label-primary">present</span>' :'<span class="label label-danger">absent</span>'!!}</td> --}}
                   <td>
                   <?php echo date("Y/m/d");?>
                   </td>
                   <td>
                    <input type="hidden" name="addmission_id" class="addmission_id" value="{{ $classroll->admissions->id }}">
                    <input type="hidden" name="timeTable_id" class="timeTable_id" value="{{ $classroll->id }}">
                    <div class="checkbox">
                    <label>
                    <input type="checkbox" class="checkboxval" id="checkbox" data-toggle="toggle" name="is_active"> Mark
                    </label>
                    </div>
                  
                   {{-- <a href="{{ route('markattendence',['addmission_id'=>$classroll->admissions->id,'timeTable_id'=>$data->id]) }}" class=" btn-xs btn-success btn" id="present">
                      <i class="fa fa-check"></i>
                      <a href="" class=" btn-xs btn-danger btn" id="absent">
                      <i class="fa fa-times"></i>  --}} 
                   </td>
                   
                  {{-- <td>
                     <a href="{{ route('student_profile', ['id'=>$admission->id]) }}">
                      <i class="fa fa-eye"></i>
                    </a>
                    <a href="{{ url('editcEnrollment/'.$cenroll->id)}}">
                      <i class="fa fa-edit"></i>
                    </a> 
                    <a href="{{ url('delcEnrollment/'.$cenroll->id)}}">
                      <i class="fa fa-trash"></i>
                    </a>
                    </td> --}}
                  </tr>
                  @endforeach
                  </tbody>
                </table>
                <div class="form-group col-md-4">
                    <label>Attendence Date<span style="color: red" class="required">*</span></label>
                    <input type="Date" name="attendenceDate"  class="attendenceDate" required="required" id="attendenceDate">
                </div>
                 <div class="form-group col-md-4">
                    <label>Lecture Type</label>
                    <input name="lec_type" class="lec_type" placeholder="Regular/Extra" id="lec_type">
                    <!-- <p class="help-block color-red" >{{$errors->first('lastName')}}</p>-->
                </div>

              </div>
              <!-- /.table-responsive -->
                      
            </div>
            <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
          <div class="col-lg-12" align="center">
                <button type="submit" id="submitAttendence" class="btn btn-default">Submit Button</button>
                <button type="reset" class="btn btn-default">Reset Button</button>
          </div>
        </div>
        <!-- /.col-lg-12 -->
      </div>


  @endsection
  @section('footer')
  @parent
  <script>

$(document).ready(function(){
 $('#submitAttendence').click(function(){
  var lec_type=$('#lec_type').val();
  var attendenceDate=$('#attendenceDate').val();
  if(lec_type=='' || attendenceDate=='' ){
alert("please fill the required filed");
  }else{


    var mydata=[];
   $('.checkboxval').each(function(e){

    if($(this).prop("checked") == true)
    {

   var addmissionId = $(this).closest('tr').find('.addmission_id').val();
  var timeTableId = $(this).closest('tr').find('.timeTable_id').val();
 
  var attendence=$(this).val();
 
     mydata.push({addmission_id:addmissionId,attendence:'yes',timeTable_id:timeTableId,attendenceDate:attendenceDate,lec_type:lec_type});
    }else{

       var addmissionId = $(this).closest('tr').find('.addmission_id').val();
  var timeTableId = $(this).closest('tr').find('.timeTable_id').val();
 
  var attendence=$(this).val();
 
     mydata.push({addmission_id:addmissionId,attendence:'no',timeTable_id:timeTableId,attendenceDate:attendenceDate,lec_type:lec_type});
    }
   });
console.log(mydata);
    $.ajax({
    url:"{{ url('/markAttendence') }}",
    type:"POST",
    dataType:'JSON',
   data:{mydata:mydata,_token:"{{ csrf_token() }}"},
    success:function(res){
console.log(res);
    }
  });

  }

 

  
 });
});

//   $(document).ready(function() {
//  $(".checkboxval").click(function(e){
//   var addmissionId = $(e.target).closest('tr').find('.addmission_id').val();
//   var timeTableId = $(e.target).closest('tr').find('.timeTable_id').val();
//   var attendenceDate=$('#attendenceDate').val();
//   var lec_type=$('#lec_type').val();
//   if ($(this).is(':checked')) {
//     var attendence = 'yes';
//   }else{
//     var attendence = 'no';
//   }
//   // var attendenceDate = $(e.target).closest('tr').find('.attendenceDate').val();
//   // var lecType = $(e.target).closest('tr').find('.lec_type').val();
// var data=[];
// data.push()
// console.log(data);
//   $.ajax({
//     url:"",
//     type:"post",
//     data:{addmission_id:addmissionId,attendence:attendence,timeTable_id:timeTableId,attendenceDate:attendenceDate,lec_type:lec_type,_token:""},
//     dataType:"json",
//     success:function(res){

//     }
//   });
  /* var attendence = [];
     var students = [];
  $.each($("input[name='is_active']:checked"), function(){
      attendence.push($(this).val());
       
                  
   });
  students.push($(this).parent('.addmission_id').val());

   alert("Attendence: " + students.join(", "));*/
 
  // });
        // $("button").click(function(){
        //     var attendence = [];
        //     var students = [];
        //     $.each($("input[name='is_active']:checked"), function(){
        //         attendence.push($(this).val());
                  
        //           console.log($(this).closest('.addmission_id').val());
        //           // students.push($(this).parent('.addmission_id').val());
        //     });
          
        //       alert("Attendence: " + attendence.join(", "));
        
        //     // alert("Attendence: " + attendence.join(", "));
        // });
    // });


    //  $(document).ready(function(){
    //     $('input[type="checkbox"]').click(function(){
    //         if($(this).prop("checked") == true){
    //             alert("Checkbox is checked.");
    //         }
    //         else if($(this).prop("checked") == false){
    //             alert("Checkbox is unchecked.");
    //         }
    //     });
    // });



    // $(document).on('checked','#checkbox',function(){
    //     var std= $(this).val();
    //     var token=$('input[name="_token"]').val();
    //     var request = $.ajax({
    //       url: "http://localhost/integrate/public/fetch",
    //       type: "POST",
    //        data:{stdid:std,_token:token},
    //       dataType: "json"
    //     });
    //     request.done(function(msg) {
    //      $('#gfirstName').val(msg.gfirstName);
    //      $('#dateBirth').val(msg.dateBirth);
    //     });
    //     request.fail(function(jqXHR, textStatus) {
    //      console.log("fail");
    //     });
   
    // });
</script>
  <script>
  	// $(document).ready(function() {
   //                $('#dataTables-example').DataTable({
   //                        responsive: true
   //                });
   //            });
  </script>

  @endsection