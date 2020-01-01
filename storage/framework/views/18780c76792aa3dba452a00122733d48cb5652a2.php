<?php $__env->startSection('title','Exam Slot List'); ?>
<?php $__env->startSection('content'); ?>

 <div class="row">
  <?php echo $__env->make('includes.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
   <div class="col-lg-12">
     <div class="panel panel-default">
       <div class="panel-heading">
                Exam Slots
         <a href="<?php echo e(url('/examSlot')); ?>" type="button" class="btn btn-primary btn-sm pull-right">Add ExamSlot</a>      
       </div>
            <!-- /.panel-heading -->
         <div class="panel-body">
           <div class="table-responsive">
             <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                  <tr>
                  <th>Class Room</th>
	                <th>Exam Time</th>
                  <th>Day</th>
                  <th>Date</th>
                  <th>Action</th>
                   </tr>
                 </thead>
                  <tbody>
	                  <?php $__currentLoopData = $examSlots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $examSlot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($examSlot->classRooms->cRoom_name); ?></td>
              <td><?php echo e($examSlot->examTimes->examTimeName); ?></td>              
              <td><?php echo e($examSlot->days->day_name); ?></td>
              <td><?php echo e($examSlot->slot_date); ?></td>              
							
							<td>
                <a href="<?php echo e(url('editExamSlot/'.$examSlot->id)); ?>">
                  <i class="fa fa-edit"></i>
                </a>
                <a href="<?php echo e(url('delExamSlot/'.$examSlot->id)); ?>">
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