<?php $__env->startSection('title','Fee Charges'); ?>
<?php $__env->startSection('content'); ?>
<div class="panel-body">
	<?php echo $__env->make('includes.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="row">
        <div class="col-lg-12">
            <h3>Add Fee Charges</h3>
            <form role="form" method="post" action="<?php echo e(url('addFeeCharges')); ?>">
             <?php echo e(csrf_field()); ?>


                <div class="col-md-4">
                    

                    <div class="form-group">
                    <label>Charges Category <span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="chargCategory_id" required="required">
                        <option value="">Select One</option>
                        <?php $__currentLoopData = $chargCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chargCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($chargCategory->id); ?>"><?php echo e($chargCategory->feeChargCategory); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    </div>
                    
                    <div class="form-group">
                    <label>Charges Head <span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="chargHead_id" required="required">
                        <option value="">Select One</option>
                        <?php $__currentLoopData = $chargHeads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chargHead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($chargHead->id); ?>"><?php echo e($chargHead->feeChargHead); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    </div>
                    
                   <div class="form-group">
                    <label>Student Class<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="class_id" required="required">
                        <option value="">Select One</option>
                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($class->id); ?>"><?php echo e($class->c_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Amount<span style="color: red" class="required">*</span></label>
                    <input name="feeAmount" class="form-control"  required="required" placeholder="Enter Amount">
                    </div>

                    <div class="form-group">
                    <label>Transaction Type<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="transactionType" id="transactionType" placeholder="Enter Recept Type">
                        <option value="">Select One</option>
                        <option value="credit" >Credit</option>
                        <option value="debit" >Debit</option>
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