<?php $__env->startSection('title','Edit Batch'); ?>
<?php $__env->startSection('content'); ?>
<div class="panel-body">
	<?php echo $__env->make('includes.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="row">
        <div class="col-lg-12">
            <h3>Edit Batch</h3>
            <form class="form-group row" role="form" method="post" action="<?php echo e(url('updateBatches')); ?>"  enctype="multipart/form-data">

                <div class="col-md-4"> 
                    <div class="form-group">
                    <label>Name<span style="color: red" class="required">*</span></label>
                    <input type="hidden" name="id" value="<?php echo e($batches->id); ?>">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    <input name="batchName" class="form-control" value="<?php echo e($batches->batchName); ?>" required="required" placeholder="Enter Batch Name">
                    </div>

                    <div class="form-group">
                    <label>Class<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="class_id" required="required">
                        <option value="">Select One</option>
                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php echo e(($batches->class_id == $class->id) ? 'selected' : ''); ?> value="<?php echo e($class->id); ?>"><?php echo e($class->c_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Section<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="section_id" required="required">
                        <option value="">Select One</option>
                        <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php echo e(($batches->section_id == $section->id) ? 'selected' : ''); ?> value="<?php echo e($section->id); ?>"><?php echo e($section->sec_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Year<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="year_id" required="required">
                        <option value="">Select One</option>
                        <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php echo e(($batches->year_id == $year->id) ? 'selected' : ''); ?> value="<?php echo e($year->id); ?>"><?php echo e($year->yearName); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Employ Id</label>
                    <select custom class="form-control" name="employe_id">
                        <option value="">Select One</option>
                        <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php echo e(($batches->employe_id == $employe->id) ? 'selected' : ''); ?> value="<?php echo e($employe->id); ?>"><?php echo e($employe->emp_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    </div>
                
                    <button type="submit" class="btn btn-default">Update</button>
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