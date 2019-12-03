<?php $__env->startSection('title','Time Table List'); ?>
<?php $__env->startSection('content'); ?>

 <div class="row">
  <?php echo $__env->make('includes.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
   <div class="col-lg-12">
    <form class="form-inline" method="POST" action="<?php echo e(url('attendancesearch')); ?>" style="margin-bottom: 20px;">
      <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
      <div class="form-group">
        <label for="student">Students:</label>
        <select class="form-control" id="student" name="student">
          <option value="">Select Student</option>
          <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($student->id); ?>"><?php echo e($student->registrations->firstName." / ".$student->registrations->gfirstName); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </div>
      <div class="form-group">
        <label for="class">Classes:</label>
        <select class="form-control" id="class" name="class">
          <option value="">Select Class</option>
          <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($class->id); ?>"><?php echo e($class->c_name); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </div>
      <div class="form-group">
        <label for="section">Sections:</label>
        <select class="form-control" id="section" name="section">
          <option value="">Select Section</option>
          <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($section->id); ?>"><?php echo e($section->sec_name); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </div><br><br>
      <div class="form-group">
        <label for="from">From:</label>
        <input class="form-control" type="date" name="from" id="from">
      </div>
      <div class="form-group">
        <label for="to">To:</label>
        <input class="form-control" type="date" name="to" id="to">
      </div>
      <div class="form-group">
        <label><button type="submit" class="btn btn-default">Search</button></label>
        
      </div>
    </form>
     <div class="panel panel-default">
       <div class="panel-heading">
           Attendance
       </div>
            <!-- /.panel-heading -->
          
        <?php echo e(dd($attendance)); ?>

         <div class="panel-body">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <th>Student Name</th>
                  <th>Period</th>
                  <th>Subject</th>
                  <th>Time</th>
                  <th>Day</th>
                  <th>Class</th>
                  <th>Section</th>
                  <th>Date</th>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $attendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $att): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td></td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>
                <!-- /.table-responsive -->
               
            </div>
            <!-- /.panel-body -->
        }
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