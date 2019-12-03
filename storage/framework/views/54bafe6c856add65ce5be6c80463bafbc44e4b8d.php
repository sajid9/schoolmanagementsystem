<?php $__env->startSection('title','Time Table'); ?>
<?php $__env->startSection('content'); ?>
<div class="panel-body">
	<?php echo $__env->make('includes.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="row">
        <div class="col-lg-12">
            <h3>Add Time Table</h3>
            <form role="form" method="post" action="<?php echo e(url('addTimeTable')); ?>">
             <?php echo e(csrf_field()); ?>


                <div class="col-md-6"> 
                    
                    <div class="form-group">
                    <label>Period<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="period_id" required="required">
                        <option value="">Select One</option>
                        <?php $__currentLoopData = $periods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $period): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($period->id); ?>"><?php echo e($period->periodName); ?> / <?php echo e($period->times->time_name); ?> / <?php echo e($period->days->day_name); ?> / <?php echo e($period->classRooms->cRoom_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Subject<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="subject_id" required="required">
                        <option value="">Select One</option>
                        <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($subject->id); ?>"><?php echo e($subject->sub_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    </div>
                    
                    <div class="form-group">
                    <label>Batch Id<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="batch_id" id="" required="required">
                        <option value="">Select One</option>
                        <?php $__currentLoopData = $batches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $batch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($batch->id); ?>"><?php echo e($batch->batchName); ?> / <?php echo e($batch->classes->c_name); ?> / <?php echo e($batch->sections->sec_name); ?> / <?php echo e($batch->years->yearName); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                    
                    <button type="submit" class="btn btn-default">Submit Button</button>
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