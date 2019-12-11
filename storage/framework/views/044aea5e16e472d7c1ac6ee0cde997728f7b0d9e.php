<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('pagetitle', 'Financial Year'); ?>

<?php $__env->startSection('content'); ?>
<div class="panel panel-default">
<div class="panel-heading">
    Add Financial Year
</div>
<div class="panel-body">


<form method="post" action="<?php echo e(url('payment/addfnyear')); ?>">
  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
  <div class="form-group">
    <label for="year">Financial Year <span class="text-danger">*</span></label>
    <input type="text" name="fn_year" value="<?php echo e(old('fn_year')); ?>" class="form-control" id="year" aria-describedby="year" placeholder="Add Financial Year">
    <small id="year" class="form-text text-muted text-danger"><?php echo e($errors->first('fn_year')); ?></small>
  <br>
  <button type="submit" class="btn btn-primary">Submit</button> <a href="<?php echo e(url('payment/financialyear')); ?>" class="btn btn-default">Back</a>
</form>


</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
##parent-placeholder-d7eb6b340a11a367a1bec55e4a421d949214759f##
<script src="<?php echo e(asset('js/jquery.maskedinput.js')); ?>"></script>
<script>
   $("#year").mask("9999-99");
   
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('includes.sidebar2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.footer2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.header2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.app2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>