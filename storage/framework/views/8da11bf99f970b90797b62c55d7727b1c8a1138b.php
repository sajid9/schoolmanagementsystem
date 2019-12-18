<!-- Make Contract Modal -->
<div class="modal fade" id="contract" role="dialog">
  <div class="modal-dialog modal-md">
    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Make Empolye Contract</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo e(route('insertcontracts')); ?>" method="post">
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
          <select id="selecttoemp" name="applicant_id" style="width: 100%;">
            <option value="">Select selected Applicant</option>
          </select>
        <label class="control-label">Select Designation</label>
          <select class="form-control" name="designation_id" required="">
            <option value="">Select Designation</option>
            <?php $__currentLoopData = $designations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $designation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($designation->id); ?>"><?php echo e($designation->designation); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        
          <label class="control-label">Reporting Date</label>
          <div class="input-group date customdatepicker" id="event_date">
            <input type="text" class="form-control" name="reportingdate" required="" value="<?php echo e(old('reportingdate')); ?>">
            <span class="input-group-addon">
              <span class="glyphicon glyphicon-calendar"></span>
            </span>
            
          </div>
          
          <label class="control-label">Contract Duration</label>
          <input type="text" name="contractduration" class="form-control" required="" value="<?php echo e(old('contractduration')); ?>">
          <label class="control-label"></label>
          <label class="control-label">Salery</label>
          <input type="number" name="salery" class="form-control" required="" value="<?php echo e(old('salery')); ?>">
          <label class="control-label"></label>
          <label class="control-label">Is Active</label>
          <select class="form-control" name="is_active">
            <option value="yes"> Active</option>
            <option value="no"> Deactive</option>
          </select>
          <label class="control-label"></label>
          <label class="control-label">Job Responsibilty</label>
          <textarea rows="5" cols="50" id="description" name="jobresponsibility" class="form-control col-md-7 col-xs-12" required="" value="<?php echo e(old('jobresponsibility')); ?>"></textarea>
          
        </div>
        <div class="modal-footer">
          <input type="submit"  class="btn btn-success" value="Save">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- end Make Contract Modal -->