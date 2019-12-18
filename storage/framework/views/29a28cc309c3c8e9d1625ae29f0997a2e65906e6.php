<?php $__env->startSection('title','Employee Salary'); ?>
<?php $__env->startSection('content'); ?>
<div class="panel-body">
	<?php echo $__env->make('includes.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="row">
        <div class="col-lg-12">
            <h3>Add Employee Total Salary</h3>
            <form role="form" method="post" action="<?php echo e(url('addEmployeeTotalSalary')); ?>">
             <?php echo e(csrf_field()); ?>


                <div class="col-md-4">
                    <div class="form-group">
                    <label>Employee Name<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="employee_id" id="" required="required">
                        <option value="">Select One</option>
                        <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($employee->id); ?>"> <?php echo e($employee->emp_name); ?> / <?php echo e($employee->employeeGrades->employeeGrade); ?> </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    </div>

                   
                   <div class="form-group">
                    <label>Month<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="month_id" required="required">
                        <option value="">Select One</option>
                        <?php $__currentLoopData = $months; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $month): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($month->id); ?>"><?php echo e($month->month_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Total Amount<span style="color: red" class="required">*</span></label>
                    <input name="totalAmount" class="form-control"  required="required" placeholder="Enter Amount">
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