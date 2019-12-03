<?php $__env->startSection('title','Student Details '); ?>
<?php $__env->startSection('content'); ?>

 <div class="row">
  <?php echo $__env->make('includes.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <!--  <div class="col-lg-12"> -->
     
       
            <!-- /.panel-heading -->
        <div class="panel panel-default">
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>First Name:</strong>
                 <strong><?php echo e($reg->firstName); ?></strong>
            </div>
       
            <div class="form-group">
                <strong>Middle Name:</strong>
               <strong><?php echo e($reg->middleName); ?></strong> 
            </div>
        
            <div class="form-group">
                <strong>Last Name:</strong>
               <strong><?php echo e($reg->lastName); ?></strong>
            </div>
        
            <div class="form-group">
                <strong>Date Of Birth:</strong>
               <strong><?php echo e($reg->dateBirth); ?></strong>
            </div>
        
            <div class="form-group">
                <strong>Gender:</strong>
               <strong><?php echo e($reg->gender); ?></strong>
            </div>
            <div class="form-group">
                <strong>Class:</strong>
               <strong><?php echo e($reg->classes->c_name); ?></strong>
            </div>
            <div class="form-group">
                <strong>Session:</strong>
               <strong><?php echo e($reg->session->s_name); ?></strong>
            </div>
            <div class="form-group">
                <strong>Address:</strong>
               <strong><?php echo e($reg->address); ?></strong>
            </div>
            <div class="form-group">
                <strong>Phone:</strong>
               <strong><?php echo e($reg->phone); ?></strong>
            </div>
        
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Father First Name:</strong>
               <strong><?php echo e($reg->gfirstName); ?></strong>
            </div>

            <div class="form-group">
                <strong>Father Middle Name:</strong>
               <strong><?php echo e($reg->gmiddleName); ?></strong>
            </div>
        
            <div class="form-group">
                <strong>Father last Name:</strong>
               <strong><?php echo e($reg->glastName); ?></strong>
            </div>
        
            <div class="form-group">
                <strong>CNIC:</strong>
               <strong><?php echo e($reg->cnic); ?></strong>
            </div>
        
            
        
            <div class="form-group">
                <strong>Mobile:</strong>
               <strong><?php echo e($reg->mobile); ?></strong>
            </div>
        
            
            <div class="form-group">
                <strong>Email:</strong>
               <strong><?php echo e($reg->email); ?></strong>
            </div>
            <div class="form-group">
                <strong>Education:</strong>
               <strong><?php echo e($reg->education); ?></strong>
            </div>
            <div class="form-group">
                <strong>Occupation:</strong>
               <strong><?php echo e($reg->occupation); ?></strong>
            </div>
            <div class="form-group">
                <strong>Income:</strong>
               <strong><?php echo e($reg->income); ?></strong>
            </div>
            
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
          <div class="form-group">
                <strong>Admission Number:</strong>
               <strong><?php echo e($admission->admissionNum); ?></strong>
            </div>
            <div class="form-group">
                <strong>Admission Date:</strong>
               <strong><?php echo e($admission->admissionDate); ?></strong>
            </div>
            <div class="form-group">
                <strong>Roll Number:</strong>
               <strong><?php echo e($admission->rollnumber); ?></strong>
            </div>
            <div class="form-group">
                <strong>Category:</strong>
               <strong></strong>
            </div>
            <div class="form-group">
                <strong>Blood Group:</strong>
               <strong><?php echo e($admission->bloodGroup); ?></strong>
            </div>
            <div class="form-group">
                <strong>Birth Place:</strong>
               <strong><?php echo e($admission->birthPlace); ?></strong>
            </div>
            <div class="form-group">
                <strong>Nationality:</strong>
               <strong><?php echo e($admission->nationality); ?></strong>
            </div>
            <div class="form-group">
                <strong>Religion:</strong>
               <strong><?php echo e($admission->religion); ?></strong>
            </div>
            <div class="form-group">
                <strong>Country:</strong>
               <strong><?php echo e($admission->country); ?></strong>
            </div>
            <div class="form-group">
                <strong>Disease:</strong>
               <strong><?php echo e($admission->disease); ?></strong>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
          <button class="btn btn-primary"   id="mycustomprint">print</button>
        </div>

    </div>
        <!-- /.panel -->
 <!--    </div> -->
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

                 $('#mycustomprint').click(function(){

    window.print();
  })
            });



</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('includes.footer2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.sidebar2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.header2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.app2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>