<?php $__env->startSection('title','Edit Exam Schedule'); ?>
<?php $__env->startSection('content'); ?>
<div class="panel-body">
	<?php echo $__env->make('includes.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="row">
        <div class="col-lg-12">
            <h3>Edit Exam Schedule</h3>
            <form class="form-group row" role="form" method="post" action="<?php echo e(url('updateExamSchedule')); ?>"  enctype="multipart/form-data">

                <div class="col-md-4"> 

                    <div class="form-group">
                    <label>Exam Slot<span style="color: red" class="required">*</span></label>
                    <input type="hidden" name="id" value="<?php echo e($examSchedules->id); ?>">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    <select custom class="form-control" name="examSlot_id" id="" required="required">
                        <option value="">Select One</option>
                        <?php $__currentLoopData = $examSlots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $examSlot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php echo e(($examSchedules->examSlot_id == $examSlot->id) ? 'selected' : ''); ?> value="<?php echo e($examSlot->id); ?>"> <?php echo e($examSlot->classRooms->cRoom_name); ?> / <?php echo e($examSlot->days->day_name); ?> / <?php echo e($examSlot->examTimes->examTimeName); ?> / <?php echo e($examSlot->slot_date); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    </div>
                    <div class="form-group">
                    <label>Class<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="class_id" required="required">
                        <option value="">Select One</option>
                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php echo e(($examSchedules->class_id == $class->id) ?'selected':''); ?> value="<?php echo e($class->id); ?>"><?php echo e($class->c_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    </div>
                    <div class="form-group">
                    <label>Subject<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="subject_id" required="required">
                        <option value="">Select One</option>
                        <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php echo e(($examSchedules->subject_id == $subject->id) ? 'selected' : ''); ?> value="<?php echo e($subject->id); ?>"><?php echo e($subject->sub_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    </div>

                   <div class="form-group">
                    <label>Exam Term<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="examTerm_id" required="required">
                        <option value="">Select One</option>
                        <?php $__currentLoopData = $examTerms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $examTerm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php echo e(($examSchedules->examTerm_id == $examTerm->id) ? 'selected':''); ?> value="<?php echo e($examTerm->id); ?>"><?php echo e($examTerm->examTermName); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
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