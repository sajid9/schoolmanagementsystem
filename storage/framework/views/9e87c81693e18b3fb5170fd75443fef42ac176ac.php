<?php $__env->startSection('title','Exam Schedule List'); ?>
<?php $__env->startSection('content'); ?>

 <div class="row">
  <?php echo $__env->make('includes.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
   <div class="col-lg-12">
     <div class="panel panel-default">
       <div class="panel-heading">
                Exam Schedule
         <a href="<?php echo e(url('/examSchedule')); ?>" type="button" class="btn btn-primary btn-sm pull-right">Add ExamSchedule</a>      
       </div>
            <!-- /.panel-heading -->
         <div class="panel-body">
           <div class="table-responsive">
             <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                  <tr>
                    <th>Class</th>
  	                <th>Subject</th>
                    <th>Class Room</th>
                    <th>Day</th>
                    <th>Exam Time</th>
                    <th>Date</th>
                    <th>Term</th>
                    <th>Attendence</th>
                    <th>Action</th>
                  </tr>
                 </thead>
                  <tbody>
	                  <?php $__currentLoopData = $examSchedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $examSchedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
              <td><?php echo e($examSchedule->batches->classes->c_name); ?></td>
              <td><?php echo e($examSchedule->subjects->sub_name); ?></td>
              <td><?php echo e($examSchedule->examSlots->classRooms->cRoom_name); ?></td>
              <td><?php echo e($examSchedule->examSlots->days->day_name); ?></td>
              <td><?php echo e($examSchedule->examSlots->examTimes->examTimeName); ?></td>
              <td><?php echo e($examSchedule->examSlots->slot_date); ?></td>
              <td><?php echo e($examSchedule->examTerms->examTermName); ?></td>
              <td><a href="<?php echo e(url('examattendence/'.$examSchedule->id.'/'.$examSchedule->batch_id)); ?>" type="button" class="btn btn-success btn-sm">Mark </a></td>
              
							
							<td>
                <a href="<?php echo e(url('editExamSchedule/'.$examSchedule->id)); ?>">
                  <i class="fa fa-edit"></i>
                </a>
                <a href="<?php echo e(url('delExamSchedule/'.$examSchedule->id)); ?>">
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