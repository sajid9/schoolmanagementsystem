<?php $__env->startSection('title','Batches'); ?>
<?php $__env->startSection('content'); ?>
<div class="panel-body">
	<?php echo $__env->make('includes.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="row">
        <div class="col-lg-12">
            <h3>Add Batch</h3>
            <form role="form" method="post" action="<?php echo e(url('addBatches')); ?>">
             <?php echo e(csrf_field()); ?>


                <div class="col-md-4"> 
                    <div class="form-group" id="classNamesetval">
                    <label>Name<span style="color: red" class="required">*</span></label>
                    <input name="batchName" class="form-control" required="required" placeholder="Enter Batch Name" id="batchName" readonly>
                    </div>
                    <div class="form-group">
                    <label>Class<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="class_id" id="class_id"required="required">
                        <option value="">Select One</option>
                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($class->id); ?>"><?php echo e($class->c_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Section<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" id="section_id" name="section_id" required="required">
                        <option value="">Select One</option>
                        <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($section->id); ?>"><?php echo e($section->sec_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Year<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="year_id"id="year_id"  required="required">
                        <option value="">Select One</option>
                        <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($year->id); ?>"><?php echo e($year->yearName); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Employ Id</label>
                    <select custom class="form-control" name="employe_id">
                        <option value="">Select One</option>
                        <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($employe->id); ?>"><?php echo e($employe->emp_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    </div>
                
                    <button type="submit" class="btn btn-default">Submit Button</button>
                    <button type="reset" class="btn btn-default">Reset Button</button>
                </div>
            </form>
        </div>
     </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
##parent-placeholder-d7eb6b340a11a367a1bec55e4a421d949214759f##

<script>
   $(document).ready(function(){
    var className='';
    var year='';
    var section='';
  $("#class_id").change(function(){
   className=$( "#class_id option:selected" ).text();

  temp1="<label>Name<span style='color: red' class='required'>*</span></label><input name='batchName' class='form-control' value='"+className+section+year+"' required='required' placeholder='Enter Batch Name' id='batchName' readonly>";

  
  $('#classNamesetval').html(temp1);


});

  $("#section_id").change(function(){
   section=$( "#section_id option:selected" ).text();

  temp2=" <label>Name<span style='color: red' class='required'>*</span></label><input name='batchName' class='form-control' value='"+className+section+year+"' required='required' placeholder='Enter Batch Name' id='batchName' readonly>";
  $('#classNamesetval').html(temp2);
});

 $("#year_id").change(function(){
  year= $( "#year_id option:selected" ).text();

  temp3=" <label>Name<span style='color: red' class='required'>*</span></label><input name='batchName' class='form-control' value='"+className+section+year+"' required='required' placeholder='Enter Batch Name' id='batchName' readonly>";
$('#classNamesetval').html(temp3);
});
});
    
 


</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('includes.footer2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.sidebar2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.header2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.app2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>