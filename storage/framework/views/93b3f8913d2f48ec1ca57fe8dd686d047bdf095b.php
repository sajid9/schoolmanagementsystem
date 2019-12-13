<?php $__env->startSection('title', 'Applicants'); ?>
<?php $__env->startSection('pagetitle', 'Applicants'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
<div class="page-title">
  <div class="title_left">
    <h3> All Security Cleared/Contracts </h3>
  </div>
</div>
</div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <?php if(Session::has('info')): ?>
              <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong><?php echo e(Session::get('info')); ?> </strong>
                  </div> 
                 <?php endif; ?>

                 <?php if(Session::has('status')): ?>
              <div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong><?php echo e(Session::get('status')); ?> </strong>
                  </div> 
                 <?php endif; ?>
     
     
      <div class="x_title">
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
       <a  href=""class="btn btn-success btn-xs"  data-toggle="modal" data-target="#contract">Make Epmolye Contract </a>
      <?php echo $__env->make('pages.contracts.sections.makecontractmodal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

      <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Sr</th>
              <th>Name</th>
              <th>Image</th>
              <th>Cnic</th>
              <th>City</th>
               <th>No Of Year</th>
                 <th>Salery</th>
              <th>Status</th>
              <th>Options</th>
            </tr>
          </thead>
          <tbody>

          <?php $__currentLoopData = $securityclearedapplicants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $securityclearedapplicant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         
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
              
              <?php if($securityclearedapplicant->is_active=='yes'): ?>
              <span class="label label-success">Active</span>
              <?php else: ?>
              <span class="label label-danger">Deactive</span>
              <?php endif; ?>   
           
         

            </td>
            <td>
          <a href="<?php echo e(route('viewcontract',['id'=>$securityclearedapplicant->id])); ?>" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Print Contract"><i class="fa fa fa-print"></i></a>

               <a  href=""class="btn btn-warning btn-xs"  data-toggle="modal" data-target="#updatecontract<?php echo e($securityclearedapplicant->id); ?>">Update </a>
                
            </td>  
          </tr> 

     
           <!-- Update Contract Modal -->
     <div class="modal fade" id="updatecontract<?php echo e($securityclearedapplicant->id); ?>" role="dialog">
    <div class="modal-dialog modal-md">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Empolye Contract</h4>
        </div>
        <div class="modal-body">
           <div class="alert alert-danger alert-dismissible fade in statusshowhide" role="alert" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>This Applicant Contract Already Exit and Active select Deactive  </strong>
                  </div> 
          <form action="<?php echo e(route('updatecontract')); ?>" method="post">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <input type="hidden" name="applicant_id" value="<?php echo e($securityclearedapplicant->getApplicents->id); ?>">
            
          
           <input type="hidden" name="contract_id" value="<?php echo e($securityclearedapplicant->id); ?>">
             <select class="form-control" name="designation_id" required="">
              <option value="">Select Designation</option>
              <?php $__currentLoopData = $designations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $designation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($designation->id); ?>" <?php echo e(($designation->id == $securityclearedapplicant->designation_id) ? "selected" : ""); ?>><?php echo e($designation->designation); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <label class="control-label">Reporting Date</label>
           <div class="input-group date customdatepicker" id="event_date">
              <input type="text" class="form-control" name="reportingdate" required="" value="<?php echo e($securityclearedapplicant->reportingdate); ?>">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
              
            </div>
          
             <label class="control-label">Contract Duration</label>
            <input type="text" name="contractduration" class="form-control" required="" value="<?php echo e($securityclearedapplicant->contractduration); ?>">
            <label class="control-label"></label>

           <label class="control-label">Salery</label>
            <input type="number" name="salery" class="form-control" required="" value="<?php echo e($securityclearedapplicant->salery); ?>">
            <label class="control-label"></label>

             <label class="control-label">Is Active</label>
           <select class="form-control is_active" name="is_active" > 
            <option value="yes" <?php echo e(($securityclearedapplicant->is_active=='yes')?'selected':''); ?>> Active</option>
              <option value="no" <?php echo e(($securityclearedapplicant->is_active=='no')?'selected':''); ?>> Deactive</option>
           </select>

            <label class="control-label">Job Responsibilty</label>
            <textarea rows="5" cols="50" id="description" name="jobresponsibility" class="form-control col-md-7 col-xs-12" required=""><?php echo e($securityclearedapplicant->jobresponsibility); ?></textarea>
           
        </div> 
        <div class="modal-footer">
            
           <input type="submit"  class="btn btn-warning hideifexist" value="update">
         
          
        
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
</style>
<script>
$(".is_active").change(function(){

var contract_id=$(this).siblings("input[name=contract_id]").val();  
var applicant_id=$(this).siblings("input[name=applicant_id]").val();

var status=$(this).val();
$.ajax({ 
url:"<?php echo e(url('applicant/checkupdatecontract')); ?>",
type:"POST",
dataType:"json",
data:{contract_id:contract_id,applicant_id:applicant_id,status:status,_token:"<?php echo e(csrf_token()); ?>"},
success:function(res)
{

if(res.status=='yes'){

$('.hideifexist').hide();
$('.statusshowhide').show();

}else{

$('.statusshowhide').hide();
$('.hideifexist').show();  
}


}
})

});





$('#selecttoemp').select2({
ajax: {
url: '<?php echo e(url("applicant/getsecuritycleared_ap")); ?>',
dataType: 'json',
processResults: function (data) {
return {
"results": data
};
}
}
});


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