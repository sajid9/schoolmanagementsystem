<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('pagetitle', 'Account Listing'); ?>


<?php $__env->startSection('header'); ?>
	##parent-placeholder-594fd1615a341c77829e83ed988f137e1ba96231##
	<!-- Social Buttons CSS -->
	<link href="<?php echo e(asset('assets/css/bootstrap-social.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="row" style="padding-bottom: 10px">
	<div class="col-md-12">
		<a href="<?php echo e(url('account/accounts')); ?>" class="btn btn-social btn-bitbucket pull-right">
		    <i class="fa fa-plus"></i> Add Account
		</a>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
				
		<?php echo $__env->make('includes.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		
		
		<div class="panel panel-default">
		    <div class="panel-heading">
		        Account Listing
		    </div>
		    <div class="panel-body">
			    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
			        <thead>
			            <tr>
			                <th>Sr#</th>
			                <th>Account Title</th>
			                <th>Date</th>
			                <th>Balance</th>
			                <th>Net Balance</th>
			                <th>Branch Name</th>
			                <th>Branch Code</th>
			                <th>Account Number</th>
			            </tr>
			        </thead>
			        <tbody>
			        	<?php $count = 0; ?>
			        	<?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			            <tr class="odd gradeX">
			                <td><?php echo e(++$count); ?></td>
			                <td><?php echo e($account->account_title); ?></td>
			                <td><?php echo e($account->date); ?></td>
			                <td><?php echo e($account->balance); ?></td>
			                <td><?php echo e($account->left_bal); ?></td>
			                <td><?php echo e($account->account_name); ?></td>
			                <td><?php echo e($account->branch_code); ?></td>
			                <td><?php echo e($account->account_number); ?></td>
			            </tr>
			            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			        </tbody>
			    </table>
		</div>
	</div>
	</div>
</div>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('footer'); ?>
	##parent-placeholder-d7eb6b340a11a367a1bec55e4a421d949214759f##
	<!-- DataTables JavaScript -->
	<script src="<?php echo e(asset('assets/js/dataTables/jquery.dataTables.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/dataTables/dataTables.bootstrap.min.js')); ?>"></script>
	<script>
	    $(document).ready(function() {
	        $('#dataTables-example').DataTable({
	                responsive: true
	        });
	        $('[data-toggle="tooltip"]').tooltip();
	    });
	   
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('includes.sidebar2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.footer2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.header2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.app2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>