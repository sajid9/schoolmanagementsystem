<?php $__env->startSection('title','Class Enrollments'); ?>
<?php $__env->startSection('content'); ?>

        <div class="row">
          <?php echo $__env->make('includes.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <div class="col-lg-12">
           <div class="panel panel-default">
             <div class="panel-heading">
              Admitted Students
              <a href="<?php echo e(url('/cEnrollments')); ?>" type="button" class="btn btn-primary btn-sm pull-right">Add New</a>      
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
             <div class="table-responsive">
               <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                  <tr>
                    <th>Student</th>
                    <th>Guardian</th>
                    <th>DOB</th>
                    <th>Batch</th>
                    <th>Class</th>
                    <th>Section</th>
                    <th>Year</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                 <?php $__currentLoopData = $cenrolls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cenroll): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <tr>
                   <td><?php echo e($cenroll->admissions->registrations->firstName); ?></td>
                   <td><?php echo e($cenroll->gfirstName); ?></td>
                   <td><?php echo e($cenroll->dateBirth); ?></td>
                   <td><?php echo e($cenroll->batches->batchName); ?></td>
                   <td><?php echo e($cenroll->batches->classes->c_name); ?></td>
                   <td><?php echo e($cenroll->batches->sections->sec_name); ?></td>
                   <td><?php echo e($cenroll->batches->years->yearName); ?></td>
                   <td><?php echo ($cenroll->is_active == 'yes')? '<span class="label label-primary">active</span>' :'<span class="label label-danger">unactive</span>'; ?></td>
                   
                   <td>
                    
                    <a href="<?php echo e(url('editcEnrollment/'.$cenroll->id)); ?>">
                      <i class="fa fa-edit"></i>
                    </a> 
                    <a href="<?php echo e(url('delcEnrollment/'.$cenroll->id)); ?>">
                      <i class="fa fa-trash"></i>
                    </a>
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