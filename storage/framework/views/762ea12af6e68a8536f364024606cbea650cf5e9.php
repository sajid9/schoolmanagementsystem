<?php $__env->startSection('title','Results List'); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
  <?php echo $__env->make('includes.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="col-lg-12">
      <div class="panel panel-default">
            <!-- /.panel-heading -->
        <div class="panel-body">
          <form class="form-inline" method="POST" action="<?php echo e(url('search-result-summary')); ?>" style="margin-bottom: 20px;">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
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
            </div>
            <div class="form-group">
              <label for="term">Sections:</label>
              <select class="form-control" id="term" name="term">
                <option value="">Select Term</option>
                <?php $__currentLoopData = $terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($term->id); ?>"><?php echo e($term->examTermName); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
            <div class="form-group">
              <label><button type="submit" class="btn btn-default">Search</button></label>
              
            </div>
          </form>
          <?php
            $passed = 0;$fail = 0; 
          ?>
          <span class="badge" style="border-radius: 0;background-color:#007BFF">Total Students: <span><?php echo e(count($results)); ?></span></span> 
          <span class="badge" style="border-radius: 0;background-color: #28A745">passed Students: <span id="passed"></span></span> 
          <span class="badge" style="border-radius: 0;background-color: #DC3545">Fail Students: <span id="fail"></span></span>
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
                  <?php if($result->obtain_marks >= $result->pass_marks): ?>
                    <?php $passed += 1; ?>
                  <?php elseif($result->obtain_marks < $result->pass_marks): ?>
                  <?php $fail += 1; ?>
                  <?php endif; ?>
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
    $('#passed').text('<?php echo e($passed); ?>');
    $('#fail').text('<?php echo e($fail); ?>');
    
  });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('includes.footer2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.sidebar2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.header2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.app2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>