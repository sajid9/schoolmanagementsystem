<?php $__env->startSection('title','Results'); ?>
<?php $__env->startSection('content'); ?>
<div class="panel-body">
	<?php echo $__env->make('includes.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="row">
        <div class="col-lg-12">
            <h3>Add Results</h3>
            <form role="form" method="post" action="<?php echo e(url('addResults')); ?>">
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
                    <label>Exam Schedule Id<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="examSchedule_id" id="" required="required">
                        <option value="">Select One</option>
                        <?php $__currentLoopData = $examSchedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $examSchedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($examSchedule->id); ?>"><?php echo e($examSchedule->batches->classes->c_name); ?> / <?php echo e($examSchedule->subjects->sub_name); ?> / <?php echo e($examSchedule->examTerms->examTermName); ?></option>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Total Marks<span style="color: red" class="required">*</span></label>
                    <input name="total_marks" class="form-control" required="required" placeholder="Enter Total Marks">
                    </div>

                    <div class="form-group">
                    <label>Obtained Marks<span style="color: red" class="required">*</span></label>
                    <input name="obtain_marks" class="form-control" required="required" placeholder="Enter Obtained Marks">
                    </div>
                    
                    <div class="form-group">
                    <label>Passing Marks<span style="color: red" class="required">*</span></label>
                    <input name="pass_marks" class="form-control" required="required" placeholder="Enter Passing Marks">
                    </div>

                    <div class="form-group">
                    <label>Grade<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="grade_id" required="required">
                        <option value="">Select One</option>
                        <?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($grade->id); ?>"><?php echo e($grade->grade_name); ?></option>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('includes.footer2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.sidebar2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.header2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.app2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>