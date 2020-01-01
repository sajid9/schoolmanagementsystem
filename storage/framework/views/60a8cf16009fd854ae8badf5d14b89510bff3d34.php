<?php $__env->startSection('title','Results List'); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
  <?php echo $__env->make('includes.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <div class="col-lg-12">
    <div class="panel panel-default">
        <!-- /.panel-heading -->
      <div class="panel-body">
        <form class="form-inline" method="POST" action="<?php echo e(url('result-search')); ?>" style="margin-bottom: 20px;">
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
          <div class="form-group">
            <label for="student">Students:</label>
            <select required="" class="form-control" id="student" name="student">
              <option value="">Select Student</option>
              <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $studentdrop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($studentdrop->id); ?>"><?php echo e($studentdrop->registrations->firstName." / ".$studentdrop->registrations->gfirstName); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
          <div class="form-group">
            <label for="class">Classes:</label>
            <select required="" class="form-control" id="class" name="class">
              <option value="">Select Class</option>
              <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classdrop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($classdrop->id); ?>"><?php echo e($classdrop->c_name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
          <div class="form-group">
            <label for="section">Sections:</label>
            <select required="" class="form-control" id="section" name="section">
              <option value="">Select Section</option>
              <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sectiondrop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($sectiondrop->id); ?>"><?php echo e($sectiondrop->sec_name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
          <div class="form-group">
            <label for="term">Term:</label>
            <select required="" class="form-control" id="term" name="term">
              <option value="">Select Term</option>
              <?php $__currentLoopData = $terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $termdrop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($termdrop->id); ?>"><?php echo e($termdrop->examTermName); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
          <div class="form-group">
            <label><button type="submit" class="btn btn-default">Search</button></label>
            
          </div>
        </form>
        <div class="row">
          <div class="col-md-12">
            <?php if(Request::is('result-search')): ?>
            <form action="<?php echo e(url('print-student-result')); ?>" method="post">
              <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
              <input type="hidden" name="student" value="<?php echo e($student); ?>">
              <input type="hidden" name="class" value="<?php echo e($class); ?>">
              <input type="hidden" name="section" value="<?php echo e($section); ?>">
              <input type="hidden" name="term" value="<?php echo e($term); ?>">
              <button type="submit"  title="Print" data-toggle="tooltip" class="btn btn-sm btn-primary"><i class="fa fa-print"></i></button>
            </form>
            <?php endif; ?>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th>Student</th>
                <th>Class</th>
                <th>Subject</th>
                <th>Exam Term</th>
                <th>Total Marks</th>
                <th>Obtained Marks</th>
                <th>Passing Marks</th>
                <th>Grade</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    						<tr>
                  <td><?php echo e($result->admissions->registrations->firstName); ?></td>
                  <td><?php echo e($result->examSchedules->batches->classes->c_name); ?></td>
                  <td><?php echo e($result->examSchedules->subjects->sub_name); ?></td>
                  <td><?php echo e($result->examSchedules->examTerms->examTermName); ?></td>
                  <td><?php echo e($result->total_marks); ?></td>
                  <td><?php echo e($result->obtain_marks); ?></td>
                  <td><?php echo e($result->pass_marks); ?></td>
                  <td><?php echo e($result->grades->grade_name); ?></td>
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