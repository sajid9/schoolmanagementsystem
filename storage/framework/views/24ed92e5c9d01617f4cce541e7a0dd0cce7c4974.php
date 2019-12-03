<?php $__env->startSection('title','Time Table List'); ?>
<?php $__env->startSection('content'); ?>

 <div class="row">
  <?php echo $__env->make('includes.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
   <div class="col-lg-12">
    <form class="form-inline" method="POST" action="<?php echo e(url('timetablesearch')); ?>" style="margin-bottom: 20px;">
      <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
      <div class="form-group">
        <label for="batch">Batches:</label>
        <select class="form-control" id="batch" name="batch">
          <option value="">Select Batch</option>
          <?php $__currentLoopData = $batches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $batch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($batch->id); ?>"><?php echo e($batch->batchName." | ".$batch->classes->c_name." | ".$batch->sections->sec_name." | ".$batch->years->yearName); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </div>
      <div class="form-group">
        <label><button type="submit" class="btn btn-default">Search</button></label>
        
      </div>
    </form>
     <div class="panel panel-default">
       <div class="panel-heading" style="text-align: center;font-size: 20px;">
            <strong>Batch: </strong><?php echo e(@$timetable[0]->batches->batchName); ?>

            <strong>Class: </strong><?php echo e(@$timetable[0]->batches->classes->c_name); ?>

            <strong>Section: </strong><?php echo e(@$timetable[0]->batches->sections->sec_name); ?>   
            <strong>Year: </strong><?php echo e(@$timetable[0]->batches->years->yearName); ?>   
       </div>
            <!-- /.panel-heading -->
          
        <?php $days = array(); $time=array();?>
         <div class="panel-body">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <th>Time</th>
                  
                  <?php $__currentLoopData = $timetable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $table): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if(!in_array($table->periods->days->day_name,$days)): ?>
                  <th><?php echo e($table->periods->days->day_name); ?></th>
                  <?php array_push($days,$table->periods->days->day_name); ?>
                  <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </thead>
                <tbody>
                  
                  <?php $__currentLoopData = $timetable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $table): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if(!in_array($table->periods->times->time_name,$time)): ?>
                  <tr>
                    <td><?php echo e($table->periods->times->time_name); ?></td>
                    <?php
                    /*daynamic days subjects show in colums */
                    for($i=0; $i< sizeof($days);$i++){
                      /*get subject from database through day and time*/
                      $subject = CH::getsubject($days[$i],$table->periods->times->time_name);
                      echo "<td>".$subject->subjects->sub_name."</td>";
                    } 
                    ?>
                  </tr>
                  <?php array_push($time,$table->periods->times->time_name); ?>
                  <?php endif; ?>
                  
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