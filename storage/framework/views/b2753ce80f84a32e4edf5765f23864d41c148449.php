<?php $__env->startSection('title', 'Applicants'); ?>
<?php $__env->startSection('pagetitle', 'Applicants'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="page-title">
    <div class="title_left">
      <h3> Add Applicants Designation</h3>
    </div>
  </div>
</div>
<div class="row"> 
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <h2>Add Designation</h2>
    <div class="x_content">
      
      <form class="form-horizontal form-label-left" action="<?php echo e(route('insertapplicantdesignation')); ?>" method="post">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Designation</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
         <input type="text" name="designation" class="form-control" placeholder="Designation Name">
          <?php if($errors->first('designation')): ?>
              <p class="customalertclass"><?php echo e($errors->first('designation')); ?></p>
              <?php endif; ?>
        
          </div>
        </div> 
        <div class="form-group">
          <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-success">Save</button>
              <a href="<?php echo e(route('applicantdesignation')); ?>" class="btn btn-primary">Go back </a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("footer"); ?>
##parent-placeholder-d7eb6b340a11a367a1bec55e4a421d949214759f##
<style>
  .customalertclass{
   
    padding: 2px;
    border-radius: 3px 4px 4px 3px;
    background-color: #CE5454;
    z-index: 1;
    margin-top: 37px;
    color: white;
    margin: 0;
}

</style>
<script >
$(document).ready(function(){
 
function datetimepickercustom(){

 $('.customdatepicker').datetimepicker({
        format: 'DD/MM/YYYY'
    });
}
datetimepickercustom();
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('includes.sidebar2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.footer2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.header2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.app2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>