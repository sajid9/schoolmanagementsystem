<?php $__env->startSection('title','Attendence'); ?>
<?php $__env->startSection('content'); ?>

        <div class="row">
          <?php echo $__env->make('includes.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <div class="col-lg-12">
           <div class="panel panel-default">
             <div class="panel-heading">
              Students Attendence
              
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
                 <?php $__currentLoopData = $data->batches->classenroll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classroll): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <tr>
                  
                   <td><?php echo e($classroll->admissions->registrations->firstName); ?></td>
                   <td><?php echo e($classroll->admissions->registrations->gfirstName); ?></td>
                   <td><?php echo e($classroll->admissions->rollnumber); ?></td>
                  
                   <td>
                   <?php echo date("Y/m/d");?>
                   </td>
                   <td>
                    <input type="hidden" name="addmission_id" class="addmission_id" value="<?php echo e($classroll->admissions->id); ?>">
                    <input type="hidden" name="timeTable_id" class="timeTable_id" value="<?php echo e($classroll->id); ?>">
                    <div class="checkbox">
                    <label>
                    <input type="checkbox" class="checkboxval" id="checkbox" data-toggle="toggle" name="is_active"> Mark
                    </label>
                    </div>
                  
                    
                   </td>
                   
                  
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
                <div class="form-group col-md-4">
                    <label>Attendence Date<span style="color: red" class="required">*</span></label>
                    <input type="Date" name="attendenceDate"  class="attendenceDate" required="required" id="attendenceDate">
                </div>
                 <div class="form-group col-md-4">
                    <label>Lecture Type</label>
                    <input name="lec_type" class="lec_type" placeholder="Regular/Extra" id="lec_type">
                    <!-- <p class="help-block color-red" ><?php echo e($errors->first('lastName')); ?></p>-->
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


  <?php $__env->stopSection(); ?>
  <?php $__env->startSection('footer'); ?>
  ##parent-placeholder-d7eb6b340a11a367a1bec55e4a421d949214759f##
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
    url:"<?php echo e(url('/markAttendence')); ?>",
    type:"POST",
    dataType:'JSON',
   data:{mydata:mydata,_token:"<?php echo e(csrf_token()); ?>"},
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

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('includes.footer2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.sidebar2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.header2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.app2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>