<?php $__env->startSection('title','Admitted Candidates'); ?>
<?php $__env->startSection('header'); ?>
##parent-placeholder-594fd1615a341c77829e83ed988f137e1ba96231##
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/dataTables/dataTables.bootstrap.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/dataTables/dataTables.responsive.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

        <div class="row">
          <?php echo $__env->make('includes.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <div class="col-lg-12">
           <div class="panel panel-default">
             <div class="panel-heading">
              Admission Report
            </div>
            
            <!-- /.panel-heading -->
            <div class="panel-body">
             <div class="table-responsive">
               <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                  <tr>
                    <th>Student Name</th>
                    <th>Father Name</th>
                    <th>Class</th>
                    <th>Section</th>
                    <th>Year</th>
                  </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $enrollments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enrollment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e((isset($enrollment->admissions->registrations)) ? $enrollment->admissions->registrations->firstName : ""); ?>

                    </td>
                    <td><?php echo e((isset($enrollment->admissions->registrations)) ? $enrollment->admissions->registrations->gfirstName : ""); ?>

                    </td>
                    <td><?php echo e((isset($enrollment->batches->classes)) ? $enrollment->batches->classes->c_name : ""); ?>

                    </td>
                    <td><?php echo e((isset($enrollment->batches->sections)) ? $enrollment->batches->sections->sec_name : ""); ?>

                    </td>
                    <td><?php echo e((isset($enrollment->batches->years)) ? $enrollment->batches->years->yearName : ""); ?>

                    </td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->

            </div>
            <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
      </div>


  <?php $__env->stopSection(); ?>
  <?php $__env->startSection('footer'); ?>
  ##parent-placeholder-d7eb6b340a11a367a1bec55e4a421d949214759f##
  <script src="<?php echo e(asset('assets/js/dataTables/dataTables.bootstrap.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/dataTables/jquery.dataTables.min.js')); ?>"></script>
  <script>
    $(document).ready(function() {
                  $('#dataTables-example').DataTable({
                          responsive: true
                  });
              });
  </script>

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('includes.footer2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.sidebar2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.header2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.app2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>