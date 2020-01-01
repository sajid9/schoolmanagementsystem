<?php $__env->startSection('title','Edit Salary Charges'); ?>
<?php $__env->startSection('content'); ?>
<div class="panel-body">
	<?php echo $__env->make('includes.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="row">
        <div class="col-lg-12">
            <h3>Edit Salary Charges</h3>
            <form class="form-group row" role="form" method="post" action="<?php echo e(url('updateSalaryCharges')); ?>"  enctype="multipart/form-data">

                <div class="col-md-4"> 


                    <div class="form-group">
                    <label>Charges Category <span style="color: red" class="required">*</span></label>
                    <input type="hidden" name="id" value="<?php echo e($salaryCharges->id); ?>">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    <select custom class="form-control" name="chargCategory_id" required="required">
                        <option value="">Select One</option>
                        <?php $__currentLoopData = $chargCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chargCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php echo e(($salaryCharges->chargCategory_id == $chargCategory->id) ? 'selected' : ''); ?> value="<?php echo e($chargCategory->id); ?>"><?php echo e($chargCategory->salaryChargCategory); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    </div>
                    
                    <div class="form-group">
                    <label>Charges Head <span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="chargHead_id" required="required">
                        <option value="">Select One</option>
                        <?php $__currentLoopData = $chargHeads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chargHead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php echo e(($salaryCharges->chargHead_id == $chargHead->id) ? 'selected' : ''); ?> value="<?php echo e($chargHead->id); ?>"><?php echo e($chargHead->salaryChargHead); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    </div>
                    
                   <div class="form-group">
                    <label>Employee Grade<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="employeeGrade_id" required="required">
                        <option value="">Select One</option>
                        <?php $__currentLoopData = $employeeGrades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employeeGrade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php echo e(($salaryCharges->employeeGrade_id == $employeeGrade->id) ? 'selected' : ''); ?> value="<?php echo e($employeeGrade->id); ?>"><?php echo e($employeeGrade->employeeGrade); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Amount<span style="color: red" class="required">*</span></label>
                    <input name="salaryAmount" class="form-control" value="<?php echo e($salaryCharges->salaryAmount); ?>" required="required" placeholder="Enter Amount">
                    </div>

                    <div class="form-group">
                    <label>Transaction Type<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="transactionType" id="transactionType" placeholder="Enter Recept Type">
                        <option value="">Select One</option>
                        <option <?php echo e(($salaryCharges->transactionType == 'credit') ? 'selected': ''); ?> value="credit" >Credit</option>
                        <option <?php echo e(($salaryCharges->transactionType == 'debit') ? 'selected': ''); ?> value="debit" >Debit</option>
                    </select>
                    </div>
                    

                    <button type="submit" class="btn btn-default">Update Button</button>
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