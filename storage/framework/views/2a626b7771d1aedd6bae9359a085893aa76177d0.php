<?php $__env->startSection('title','Exam Time'); ?>
<?php $__env->startSection('content'); ?>
<div class="panel-body">
	<?php echo $__env->make('includes.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="row">
        <div class="col-lg-12">
            <h3>Add Exam Time</h3>
            <form role="form" method="post" action="<?php echo e(url('addExamTime')); ?>">
             <?php echo e(csrf_field()); ?>


                <div class="col-md-4"> 
                    <div class="form-group">
                    <label>Exam Timing<span style="color: red" class="required">*</span></label>
                    <input name="examTimeName" class="form-control" required="required" placeholder="Enter Timings">
                    </div>
                    <!--<div class="form-group">
                        <label id="checkbox">Status</label>
                        <div class="checkbox">
                            <input type="checkbox" name="status" id="status" checked="checked">
                        </div>
                    </div>
                    <input type="hidden" name="class_status" id="class_status" value="active"> -->
                
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