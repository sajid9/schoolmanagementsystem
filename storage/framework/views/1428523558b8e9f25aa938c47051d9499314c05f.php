<?php $__env->startSection('title','Employee Salary'); ?>
<?php $__env->startSection('content'); ?>
<div class="panel-body">
	<?php echo $__env->make('includes.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="row">
        <div class="col-lg-12">
            <h3>Add Employee Salary</h3>
            
<form role="form" method="post" action="<?php echo e(url('addEmployeeSalary')); ?>">
             <?php echo e(csrf_field()); ?>


             <input type="hidden" name="month_id" id="month_id">
                <div class="col-md-4">
                    <div class="form-group">
                    <label>Employee Total Salary Id<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="empTotalSalary_id" id="empTotalSalary_id"  required="required">
                        <option value="">Select One</option>
                        <?php $__currentLoopData = $empTotalSalaries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empTotalSalary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option data-grade="<?php echo e($empTotalSalary->employees->employeeGrades->id); ?>" value="<?php echo e($empTotalSalary->employees->id); ?>" month-Id="<?php echo e($empTotalSalary->month_id); ?>"> <?php echo e($empTotalSalary->employees->emp_name); ?> / <?php echo e($empTotalSalary->employees->employeeGrades->employeeGrade); ?> / <?php echo e($empTotalSalary->months->month_name); ?> / <?php echo e($empTotalSalary->totalAmount); ?>  

                         </option>   
                      
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    </select>
                    </div>

                   
                    <div class="form-group">
                    <label>Charges Head <span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="chargHead_id" id="chargHead" required="required">
                        <option value="">Select One</option>
                        <?php $__currentLoopData = $chargHeads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chargHead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($chargHead->id); ?>"><?php echo e($chargHead->salaryChargHead); ?> </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Amount<span style="color: red" class="required">*</span></label>
                    <input name="salaryAmount" id="salaryAmount" class="form-control"  required="required" placeholder="Enter Amount">
                    </div>
                    
                   <div class="form-group">
                    <label>Charges Type<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="chargType_id" required="required">
                        <option value="">Select One</option>
                        <?php $__currentLoopData = $chargTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chargType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($chargType->id); ?>"><?php echo e($chargType->salaryChargType); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Transaction Type<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="transactionType" id="transactionType" placeholder="Enter Recept Type">
                        <option value="">Select One</option>
                        <option value="credit" >Credit</option>
                        <option value="debit" >Debit</option>
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

    var  empTotalSalary_id=$('#empTotalSalary_id :selected').val();
     var  chargHead=$('#chargHead :selected').val();

    
     $(document).on('change','#empTotalSalary_id',function(){
       empTotalSalary_id=$('#empTotalSalary_id :selected').data('grade');
       // console.log(empTotalSalary_id);
      var  month_id=$('#empTotalSalary_id :selected').attr("month-Id");

  

       $('#month_id').val(month_id);
    
      chargHead=$('#chargHead :selected').val();
    
      
     if (chargHead=='' || empTotalSalary_id=='' ) {
  // alert(empTotalSalary_id+"AND"+chargHead)
        //alert("Select Related option and option should not be empty")
     }else{

          var request = $.ajax({
          url: "<?php echo e(url('salaryHeadAmount')); ?>",
          type: "POST", 
          data:{chargHead:chargHead,empTotalSalary_id:empTotalSalary_id,_token:"<?php echo e(csrf_token()); ?>"},
          dataType: "json"
        });
        request.done(function(msg) {
            console.log(msg);
           if (msg.length==0) {
          $('#salaryAmount').val(0);
            }else{
               $('#salaryAmount').val(msg[0].salaryAmount);   
            }
        });
        request.fail(function(jqXHR, textStatus) {
         console.log("fail");
        });

     }


      });

    
     $(document).on('change','#chargHead',function(){
       chargHead=$(this).val();
        empTotalSalary_id=$('#empTotalSalary_id :selected').data('grade');

        console.log(chargHead+empTotalSalary_id)
        // alert(empTotalSalary_id+"AND"+ chargHead)
       if (chargHead=='' || empTotalSalary_id=='' ) {

      //alert("Select Related option and option should not be empty")
     }else{

       

    var request = $.ajax({
          url: "<?php echo e(url('salaryHeadAmount')); ?>",
          type: "POST",
          data:{chargHead:chargHead,empTotalSalary_id:empTotalSalary_id,_token:"<?php echo e(csrf_token()); ?>"},
          dataType: "json"
        });
        request.done(function(msg) {
            console.log(msg);
            if (msg.length==0) {
          $('#salaryAmount').val(0);
            }else{
               $('#salaryAmount').val(msg[0].salaryAmount);   
            }
        
        });
        request.fail(function(jqXHR, textStatus) {
         console.log("fail");
        });



     }

      });


  
    // $(document).on('change','#chargHead',function(){
    //     var std= $(this).val();
    //     var token=$('input[name="_token"]').val();
    //     var request = $.ajax({
    //       url: "<?php echo e(url('salaryHeadAmount')); ?>",
    //       type: "POST",
    //       data:{amount:std,_token:token},
    //       dataType: "json"
    //     });
    //     request.done(function(msg) {
    //         console.log(msg);
    //      $('#salaryAmount').val(msg[0].salaryAmount);
    //     });
    //     request.fail(function(jqXHR, textStatus) {
    //      console.log("fail");
    //     });
   
    // });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('includes.footer2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.sidebar2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.header2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.app2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>