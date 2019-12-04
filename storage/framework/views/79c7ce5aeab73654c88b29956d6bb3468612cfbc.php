<?php $__env->startSection('title','Grades'); ?>
<?php $__env->startSection('content'); ?>
<div class="panel-body">
	<?php echo $__env->make('includes.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="row">
        <div class="col-lg-12">
            <h3>Add Grade</h3>
            <form role="form" method="post" action="<?php echo e(url('addGrade')); ?>">
             <?php echo e(csrf_field()); ?>


                <div class="col-md-4"> 
                    <div class="form-group">
                    <label>Min Marks<span style="color: red" class="required">*</span></label>
                    <input name="min_marks" class="form-control" required="required" placeholder="Enter Minimum Marks">
                    </div>
                    <div class="form-group">
                    <label>Max Marks<span style="color: red" class="required">*</span></label>
                    <input name="max_marks" class="form-control" required="required" placeholder="Enter Maximum Marks">
                    </div>
                    <div class="form-group">
                    <label>Grade<span style="color: red" class="required">*</span></label>
                    <input name="grade_name" class="form-control" required="required" placeholder="Enter Grade">
                    </div>
                    
                
                    <button type="submit" class="btn btn-default">Submit Button</button>
                    <button type="reset" class="btn btn-default">Reset Button</button>
                </div>
            </form>
        </div>
     </div>
</div>
<script>
    $(document).ready(function(){
      $('#status').bootstrapToogle({
        on: 'active',
        off: 'inactive'
      });  
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('includes.footer2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.sidebar2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.header2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.app2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>