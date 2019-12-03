<?php $__env->startSection('title','Edit Exam Slot'); ?>
<?php $__env->startSection('content'); ?>
<div class="panel-body">
	<?php echo $__env->make('includes.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="row">
        <div class="col-lg-12">
            <h3>Edit Exam Slot</h3>
            <form class="form-group row" role="form" method="post" action="<?php echo e(url('updateExamSlot')); ?>"  enctype="multipart/form-data">

                <div class="col-md-4"> 
                    
                    <div class="form-group">
                    <label>Class Room<span style="color: red" class="required">*</span></label>
                    <input type="hidden" name="id" value="<?php echo e($examSlots->id); ?>">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    <select custom class="form-control" name="classRoom_id" required="required">
                        <option value="">Select One</option>
                        <?php $__currentLoopData = $classRooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classRoom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php echo e(($examSlots->classRoom_id == $classRoom->id) ? 'selected' : ''); ?> value="<?php echo e($classRoom->id); ?>"><?php echo e($classRoom->cRoom_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Day<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="day_id" required="required">
                        <option value="">Select One</option>
                        <?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php echo e(($examSlots->day_id == $day->id) ? 'selected' : ''); ?> value="<?php echo e($day->id); ?>"><?php echo e($day->day_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Exam Time<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="examTime_id" required="required">
                        <option value="">Select One</option>
                        <?php $__currentLoopData = $examTimes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $examTime): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php echo e(($examSlots->examTime_id == $examTime->id) ? 'selected' : ''); ?> value="<?php echo e($examTime->id); ?>"><?php echo e($examTime->examTimeName); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Date<span style="color: red" class="required">*</span></label>
                    <input type="Date" name="slot_date" value="<?php echo e($examSlots->slot_date); ?>" class="form-control" required="required">
                    </div>
                   
                    <button type="submit" class="btn btn-default">Update Button</button>
                    <button type="reset" class="btn btn-default">Reset Button</button>
                </div>
            </form>
        </div>
     </div>
</div>
<script>
    $(document).ready(function(){
      $('#status').bootstrapToogle({
        on: 'active',
        off: 'inactive'
      });  
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('includes.footer2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.sidebar2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.header2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.app2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>