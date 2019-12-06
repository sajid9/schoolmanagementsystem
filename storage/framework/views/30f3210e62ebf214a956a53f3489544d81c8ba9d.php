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
                    <th><input type="checkbox" name="all" id="markall"> Mark All</th>
                  </tr>
                </thead>
                <tbody>
                 <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <tr>
                  
                   <td><?php echo e($student->admissions->registrations->firstName); ?></td>
                   <td><?php echo e($student->admissions->registrations->gfirstName); ?></td>
                   <td><?php echo e($student->admissions->rollnumber); ?></td>
                  
                  <td>
                   <?php echo date("Y/m/d");?>
                  </td>
                  <td>
                    <input type="hidden" name="addmission_id" class="addmission_id" value="<?php echo e($student->admissions->id); ?>">
                    <input type="hidden" name="timeTable_id" class="schedule_id" value="<?php echo e($scheduleId); ?>">
                    <div class="checkbox">
                    <label>
                    <input type="checkbox" class="checkboxval" id="checkbox" data-toggle="toggle" data-on="Mark" data-off="Unmarked" name="is_active" <?php echo e(@(CH::MEA($scheduleId,$student->admissions->id)->is_active == 'yes') ? 'checked': ''); ?>>
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
              </div>
              <!-- /.table-responsive -->
                      
            </div>
            <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
          <div class="col-lg-12" align="center">
                <button type="submit" id="submitAttendence" class="btn btn-default">Submit Button</button>
                <a href="<?php echo e(url('examSchedule-list')); ?>" class="btn btn-default">Back</a>
          </div>
        </div>
        <!-- /.col-lg-12 -->
      </div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
##parent-placeholder-d7eb6b340a11a367a1bec55e4a421d949214759f##
<script>
  $(document).ready(function(){
    $('#markall').on('click',function(){
          
          $('.checkboxval').each(function(e,val){
           
            if($('#markall').prop("checked") == true)
            {
              $(this).bootstrapToggle('on');
            }else{
              $(this).bootstrapToggle('off');
            }
          });
        })
    $('#submitAttendence').click(function(){
      
      var attendenceDate=$('#attendenceDate').val();
      if(attendenceDate=='' ){
        alert("please fill the required filed");
      }else{
        var mydata=[];
        $('.checkboxval').each(function(e){

          if($(this).prop("checked") == true)
          {

            var addmissionId = $(this).closest('tr').find('.addmission_id').val();
            var schedule_id = $(this).closest('tr').find('.schedule_id').val();
         
            var attendence=$(this).val();
         
            mydata.push({addmission_id:addmissionId,attendence:'yes',schedule_id:schedule_id,attendenceDate:attendenceDate});
          }else{

            var addmissionId = $(this).closest('tr').find('.addmission_id').val();
            var schedule_id = $(this).closest('tr').find('.schedule_id').val();
       
            var attendence=$(this).val();
       
            mydata.push({addmission_id:addmissionId,attendence:'no',schedule_id:schedule_id,attendenceDate:attendenceDate});
          }
        });
        console.log(mydata);
        $.ajax({
          url:"<?php echo e(url('/markexamAttendence')); ?>",
          type:"POST",
          dataType:'JSON',
          data:{mydata:mydata,_token:"<?php echo e(csrf_token()); ?>"},
          success:function(res){
            $.toast({
                heading: 'SUCCESS',
                text: 'Attendence Mared Successfully',
                icon: 'success',
                position: 'top-right', 
                loader: true,        // Change it to false to disable loader
                loaderBg: '#9EC600'  // To change the background
            });
          }
        });
      }
    });
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('includes.footer2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.sidebar2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.header2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.app2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>