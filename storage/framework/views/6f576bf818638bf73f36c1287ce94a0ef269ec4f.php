<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('pagetitle', 'Edit Head'); ?>

<?php $__env->startSection('content'); ?>
<div class="panel panel-default">
<div class="panel-heading">
    Edit Head
</div>
<div class="panel-body">


<form method="post" action="<?php echo e(url('expenditure/updatehead')); ?>">
	<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
  <div class="form-group">
    <label for="head">Head Name <span class="text-danger">*</span></label>
    <input type="text" name="head_name" value="<?php echo e($head->name); ?>" class="form-control" id="head" aria-describedby="head" placeholder="Head Name">
    <input type="hidden" name="id" value="<?php echo e($head->id); ?>">
    <small id="head" class="form-text text-muted text-danger"><?php echo e($errors->first('head_name')); ?></small>
  </div>
 
  <div class="checkbox">
    <label>
      <input type="checkbox" data-toggle="toggle" name="is_active" value="yes" <?php echo e(($head->is_active == 'yes') ? 'checked' : ''); ?> data-on="Active" data-off="Inactive">
    </label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button> <a href="<?php echo e(url('expenditure/headlisting')); ?>" class="btn btn-default">Back</a>
</form>


</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('includes.sidebar2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.footer2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.header2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.app2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>