<?php $__env->startSection('title', 'Applicants joing'); ?>
<?php $__env->startSection('pagetitle', 'Applicants joing'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="page-title">
    <div class="title_left">
      <h3> Contracts And Joing </h3>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_content">
        
         <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Sr</th>
              <th>Name</th>
              <th>Image</th>
              <th>Cnic</th>
              <th>City</th>
               <th>No of year</th>
                <th>Salery</th>
              <th>Status</th>
              <th>Options</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $securityclearedandcontractexit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $securityclearedapplicant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(isset($securityclearedapplicant->getApplicents)): ?>
                
           
            <tr>
              <td><?php echo e($securityclearedapplicant->id); ?></td>
              <td><?php echo e($securityclearedapplicant->getApplicents->name); ?></td>
              <td>
                <img src="<?php echo e(asset('assets/images')); ?>/<?php echo e($securityclearedapplicant->getApplicents->image); ?>" alt="Smiley face" height="50" width="50" >
              </td>
              <td><?php echo e($securityclearedapplicant->getApplicents->cnic); ?></td>
              <td><?php echo e($securityclearedapplicant->getApplicents->city); ?></td>
               <td><?php echo e($securityclearedapplicant->contractduration); ?></td>
                <td><?php echo e($securityclearedapplicant->salery); ?></td>
              <td>
              
                <?php if($securityclearedapplicant->is_join=='yes'): ?>
                <span class="label label-success">Joined</span>
                <?php else: ?>
                <span class="label label-danger">Not Joined yet</span>
                <?php endif; ?>
              
              </td>
              <td>
               
                  <a href="<?php echo e(route('viewcontract',['id'=>$securityclearedapplicant->id])); ?>" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="View Contract"><i class="fa fa fa-eye"></i></a>  
              
               
                
                <a  href=""class="btn btn-warning btn-xs"  data-toggle="modal" data-target="#updatecontract<?php echo e($securityclearedapplicant->id); ?>">Finally Join </a>
                
              </td>
            </tr>
            
            <!-- Update Contract Modal -->
            <div class="modal fade" id="updatecontract<?php echo e($securityclearedapplicant->id); ?>" role="dialog">
              <div class="modal-dialog modal-md">
                
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Update Joing</h4>
                  </div>
                  <div class="modal-body">
                    <form action="<?php echo e(route('updatecontractjoing')); ?>" method="post">
                      <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                      <input type="hidden" name="applicant_id" value="<?php echo e($securityclearedapplicant->getApplicents->id); ?>">
                     
                      <input type="hidden" name="contract_id" value="<?php echo e($securityclearedapplicant->id); ?>">
                      
                      <label class="control-label">Join Date</label>
                      <div class="input-group date customdatepicker" id="event_date">
                        <input type="text" class="form-control" name="startdate" required="" value="<?php echo e($securityclearedapplicant->startdate); ?>">
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                        
                      </div>
                      <label class="control-label">End Date</label>
                      <div class="input-group date customdatepicker" id="event_date">
                        <input type="text" class="form-control" name="enddate" required="" value="<?php echo e($securityclearedapplicant->enddate); ?>">
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                        
                      </div>
                      <select class="form-control" name="is_active" required="">
                        <option value="yes"<?php echo e(($securityclearedapplicant->is_join =='yes') ? "selected" : ""); ?>>Active</option>
                        <br>
                        <option value="no"<?php echo e(($securityclearedapplicant->is_join =='no') ? "selected" : ""); ?>>Deactive</option>
                      </select>
                    
                    
                    </div>
                    <div class="modal-footer">
                     
                      <input type="submit"  class="btn btn-warning" value="update">
                    
                      <a href="<?php echo e(route('contracts')); ?>" class="btn btn-info"> Make Contract</a>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- end Make Contract Modal -->
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("footer"); ?>
##parent-placeholder-d7eb6b340a11a367a1bec55e4a421d949214759f##
<style type="text/css">

.label{
font-size: 94% !important;
}
.buttonpostioncustom{
z-index: 20;
right: -4px;
position: fixed;
top: 60px;
}
.buttonpostioncustom2{
z-index: 20;
right: -4px;
position: fixed;
top: 96px;
}
</style>
<script>
function datetimepickercustom(){
$('.customdatepicker').datetimepicker({ 
format: 'DD/MM/YYYY'
});
}
datetimepickercustom();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('includes.sidebar2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.footer2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.header2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.app2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>