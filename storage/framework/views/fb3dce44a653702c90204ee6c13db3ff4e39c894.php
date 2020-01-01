<?php $__env->startSection('title', 'Applicants'); ?>
<?php $__env->startSection('pagetitle', 'Applicants'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
<div class="page-title">
  <div class="title_left">
    <h3> Easy Selection
<a href="<?php echo e(route('allshortlisted')); ?>" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="" data-original-title="For Detail Selection Click Here">Switch to Detail Selection </a>
    </h3>
  </div>
</div>
</div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Sr</th>
            <th>Name</th>
            <th>Image</th>
            <th>Cnic</th>
            <th>City</th>
            <th>DOB</th>
            <th>Status</th>
            <th>Options</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $applicants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $applicant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <tr>
            <td><?php echo e($applicant->id); ?></td>
            <td><?php echo e($applicant->name); ?></td>
            <td>
              <img src="<?php echo e(asset('images')); ?>/<?php echo e($applicant->image); ?>" alt="Smiley face" height="50" width="50" >
            </td>
            <td><?php echo e($applicant->cnic); ?></td>
            <td><?php echo e($applicant->city); ?></td>
            <td><?php echo e($applicant->dob); ?></td>
             <td>
              <?php if($applicant->is_selected=="yes"): ?>
              <span class="label label-success">Selected</span>
              <?php else: ?>
             <span class="label label-danger">Not Selected</span>
              <?php endif; ?>

            </td>
            <td> 
              <a  href="<?php echo e(route('allshortlistedtableview',['id'=> $applicant->id])); ?>"class="btn btn-primary btn-xs"  data-toggle="tooltip" data-placement="top" title="view Applicants"><i class="fa fa-eye"></i></a>

              <a  href="<?php echo e(route('marktoselected',['id'=>$applicant->id])); ?>"class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Select Applicant"><i class="fa fa-check"></i></a>
              <a  href="<?php echo e(route('marktounselected',['id'=>$applicant->id])); ?>"class="btn btn-dark btn-xs" data-toggle="tooltip" data-placement="top" title="Un Select Applicant" style="background: #EF240F;"><i class="fa fa-remove"></i></a>

            <a href="<?php echo e(route('notshortlist',['id'=>$applicant->id])); ?>" class="btn btn-danger btn-xs applicantdelte"  data-toggle="tooltip" data-placement="top" title="Not Shortlisted"><i class="fa fa-remove"></i>
                </a>
                 <a  href="<?php echo e(route('unshortlist',['id'=>$applicant->id])); ?>"class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Reset All Status Current Applicant"><i class="fa fa-refresh"></i></a>
            </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("footer"); ?>
##parent-placeholder-d7eb6b340a11a367a1bec55e4a421d949214759f##
<style type="text/css">
  .label{
        font-size: 94% !important;
  }
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('includes.sidebar2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.footer2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.header2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.app2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>