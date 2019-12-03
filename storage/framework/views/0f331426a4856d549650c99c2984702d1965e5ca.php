<?php $__env->startSection('title','Attendence'); ?>
<?php $__env->startSection('content'); ?>
<div class="panel-body">
	<?php echo $__env->make('includes.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="row">

       
        <div class="col-lg-12">
 
             
            <form class="form-group row" role="form" method="post" action="<?php echo e(url('addAttendence')); ?>"            enctype="multipart/form-data">
             <?php echo e(csrf_field()); ?>

            <div class="col-md-4">
                <div class="form-group">
                    <label>Admission Id<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="admission_id" id="regStd" required="required">
                        <option value="">Select One</option>
                        <?php $__currentLoopData = $admissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($admission->id); ?>"><?php echo e($admission->registrations->firstName); ?> / <?php echo e($admission->gfirstName); ?> / <?php echo e($admission->rollnumber); ?></option>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                </div>

                <div class="form-group">
                    <label>TimeTable Id<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="timeTable_id" id="" required="required">
                        <option value="">Select One</option>
                        <?php $__currentLoopData = $timeTables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timeTable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($timeTable->id); ?>"><?php echo e($timeTable->periods->periodName); ?> / <?php echo e($timeTable->periods->times->time_name); ?> / <?php echo e($timeTable->periods->days->day_name); ?> / <?php echo e($timeTable->periods->classRooms->cRoom_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="checkbox">
                    <label>
                    <input type="checkbox" data-toggle="toggle" name="is_active" value="yes" <?php echo e((old('is_active') == 'yes') ? 'checked' : ''); ?> data-on="Active" data-off="Inactive">
                    </label>
                </div>
                <div class="form-group">
                    <label>Attendence Date<span style="color: red" class="required">*</span></label>
                    <input type="Date" name="attendenceDate" value="" class="form-control" required="required">
                </div>

                 <div class="form-group">
                    <label>Lecture Type</label>
                    <input name="lec_type" class="form-control" placeholder="Regular/Extra">
                    <!-- <p class="help-block color-red" ><?php echo e($errors->first('lastName')); ?></p>-->
                </div>
                
            </div>
           

            <div class="col-md-12 " align="center">   
                <button type="submit" class="btn btn-default">Submit Button</button>
                <button type="reset" class="btn btn-default">Reset Button</button>
            </div>
            </form>
        </div>
     </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
##parent-placeholder-d7eb6b340a11a367a1bec55e4a421d949214759f##

<script>
    $(document).on('change','#regStd',function(){
        var std= $(this).val();
        var token=$('input[name="_token"]').val();
        var request = $.ajax({
          url: "http://localhost/integrate/public/fetch",
          type: "POST",
           data:{stdid:std,_token:token},
          dataType: "json"
        });
        request.done(function(msg) {
         $('#gfirstName').val(msg.gfirstName);
         $('#dateBirth').val(msg.dateBirth);
        });
        request.fail(function(jqXHR, textStatus) {
         console.log("fail");
        });
   
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('includes.footer2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.sidebar2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.header2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.app2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>