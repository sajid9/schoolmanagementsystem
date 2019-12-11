<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('pagetitle', 'Payments'); ?>

<?php $__env->startSection('content'); ?>
<div class="panel panel-default">
<div class="panel-heading">
    Payment
</div>
<div class="panel-body">


<form method="post" action="<?php echo e(url('payment/addpayment')); ?>">
	<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
  <div class="form-group">
    <label for="paytype">Select Receipt Type</label>
    <select name="paytype" required="required" class="form-control" id="paytype" aria-describedby="paytype_msg">
      <option value=""> Select type</option>
      <option value="EX">Expenditure (EXP)</option>
    </select>
    <small id="paytype_msg" class="form-text text-muted text-danger"><?php echo e($errors->first('paytype')); ?></small>
  </div>
  <div id="append_con">
    
  </div>
  <button type="submit" class="btn btn-primary">Submit</button> <a href="<?php echo e(url('payment/paymentlisting')); ?>" class="btn btn-default">Back</a>
</form>


</div>
</div>



<template id="exp_con">
  <div class="form-group">
    <label for="account">Account <span class="text-danger">*</span></label>
    <select name="account" required="required" class="form-control" id="account" aria-describedby="account_msg">
      <option value=""> Select Account</option>
      <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option value="<?php echo e($account->id); ?>"><?php echo e($account->account_title); ?></option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <small id="account_msg" class="form-text text-muted text-danger"><?php echo e($errors->first('account')); ?></small>
  </div>
  <div class="form-group">
    <label for="amount">Amount <span class="text-danger">*</span></label>
    <input type="number" required="required" name="amount" value="<?php echo e(old('amount')); ?>" class="form-control" id="amount" aria-describedby="amount" placeholder="enter the amount">
    <small id="amount" class="form-text text-muted text-danger"><?php echo e($errors->first('amount')); ?></small>
  </div>
  <div class="form-group">
    <label for="month">month <span class="text-danger">*</span></label>
    <select name="month" class="form-control" id="month" aria-describedby="month_msg">
      <option value=""> Select Month</option>
      <?php $__currentLoopData = $months; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $month): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option value="<?php echo e($month->id); ?>"><?php echo e($month->month_name); ?></option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <small id="month" class="form-text text-muted text-danger"><?php echo e($errors->first('month')); ?></small>
  </div>
  <div class="form-group">
    <label for="fn_year">Fianancial Year</label>
    <select name="fn_year" class="form-control" id="fn_year" aria-describedby="fn_year">
      <option value=""> Select Fianancial Year</option>
      <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option><?php echo e($year->year); ?></option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <small id="fn_year" class="form-text text-muted text-danger"><?php echo e($errors->first('fn_year')); ?></small>
  </div>
  <div class="form-group">
    <label for="description">Description <span class="text-danger">*</span></label>
    <textarea name="description" class="form-control" id="description" aria-describedby="description" placeholder="enter the description"><?php echo e(old('description')); ?></textarea>
    <small id="description" class="form-text text-muted text-danger"><?php echo e($errors->first('description')); ?></small>
  </div>
  <div class="form-group">
    <label for="head">Exp Head</label>
    <select name="head" class="form-control" id="head" aria-describedby="head">
      <option value=""> Select Head</option>
      <?php $__currentLoopData = $heads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $head): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option value="<?php echo e($head->id); ?>"><?php echo e($head->name); ?></option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <small id="head" class="form-text text-muted text-danger"><?php echo e($errors->first('head')); ?></small>
  </div>
  <div class="form-group">
    <label for="subhead">Exp Subhead</label>
    <select name="subhead" class="form-control" id="subhead" aria-describedby="subhead">
      <option value=""> Select Subhead</option>
    </select>
    <small id="subhead" class="form-text text-muted text-danger"><?php echo e($errors->first('subhead')); ?></small>
  </div>
  <div class="form-group">
    <label for="headtype">Headtype</label>
    <select name="headtype" class="form-control" id="headtype" aria-describedby="headtype">
      <option value=""> Select Headtype</option>
      <option value="1">monthly</option>
      <option value="2">setup</option>
    </select>
    <small id="headtype" class="form-text text-muted text-danger"><?php echo e($errors->first('headtype')); ?></small>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" name="salary" id="salary" value="checked">Salary</label>
  </div>
  <div class="form-group" id="employee" style="display: none">
    <label for="employee">Employee</label>
    <select name="employee" class="form-control" id="employee" aria-describedby="employee">
      <option value=""> Select employee</option>
      <option value="1">muhammad sajid</option>
      <option value="2">muhammad wajid</option>
      <option value="3">khan</option>
    </select>
    <small id="employee" class="form-text text-muted text-danger"><?php echo e($errors->first('employee')); ?></small>
  </div>
</template>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
##parent-placeholder-d7eb6b340a11a367a1bec55e4a421d949214759f##
<script>
$(document).on('change', '#salary', function() {
  if(this.checked) {
    $('#employee').css('display','block');
  }else{
    $('#employee').css('display','none');
  }
});
$('#paytype').on('change',function(){
  var type = $(this).val();
  
  if(type == 'EX'){
    var temp = $('#exp_con').html();
    $('#append_con').html(temp);
  }
});
$(document).on('change','#account',function(){
  var id = $(this).val();
  $.ajax({
    url:"<?php echo e(url('payment/getaccountinfo')); ?>",
    type:"post",
    dataType:"json",
    data:{id:id,_token:"<?php echo e(csrf_token()); ?>"},
    success:function(res){
      $('#bal_amount_account').val(res.left_bal);
    }
  });
});
$(document).on('change','#voucherId',function(){
  var val = $(this).val();
  $.ajax({
    url:"<?php echo e(url('voucher/selectsupplier')); ?>",
    data:{id:val,_token:"<?php echo e(csrf_token()); ?>"},
    type:"post",
    dataType:"json",
    success:function(res){
      $('#supplier').val(res.supplier.supplier_name);
      $('#supplier_id').val(res.supplier.id);
      var bal_amount = res.voucher.total_amount - (res.voucher.paid_amount + res.voucher.return_amount);
      $('#bal_amount').val(bal_amount);
    }
  })
});
$(document).on('change','#receipt',function(){
  var val = $(this).val();
  $.ajax({
    url:"<?php echo e(url('sale/selectcustomer')); ?>",
    data:{id:val,_token:"<?php echo e(csrf_token()); ?>"},
    type:"post",
    dataType:"json",
    success:function(res){
      $('#customer').val(res.customer.customer_name);
      $('#customer_id').val(res.customer.id);
      var bal_amount = res.receipt.total_amount - (res.receipt.paid_amount + res.receipt.return_amount);
      $('#bal_amount').val(bal_amount);
    }
  })
});
$(document).on('change','#head',function(){
  var val = $(this).val();
  $.ajax({
    url:"<?php echo e(url('expenditure/getsubhead')); ?>",
    data:{id:val,_token:"<?php echo e(csrf_token()); ?>"},
    type:"post",
    dataType:"json",
    success:function(res){
      var template = "<option value=''>Select Subhead </option>";
      for( var i = 0; i < res.length; i++ ){
        template += "<option value='"+res[i].id+"'>"+res[i].name+"</option>";
      }
      $("#subhead").html(template);
    }
  })
});
$(document).on('blur','#amount',function(){
  var data = {};
      data.voucher = $('#voucherId').val();
      data.amount  = parseInt($(this).val());
      data._token  = "<?php echo e(csrf_token()); ?>";
      if(data.voucher == ''){
        alert('please select the voucher first');
        $('#amount').val('');
        return 0;
      }
  $.ajax({
    url:'<?php echo e(url("payment/checkamount")); ?>',
    type:'post',
    dataType:'json',
    data:data,
    success:function(res){
      var paid = parseInt(res.paid_amount + res.return_amount);
      var bal  = parseInt(res.total_amount - paid);
      if(data.amount > bal){
        alert('paid amount should be less then balance amount.Balance amount is '+bal);
        $('#amount').val('');
      }
    }
  });
});
$(document).on('blur','#amount_receipt',function(){
  var data = {};
      data.receipt = $('#receipt').val();
      data.amount  = I= parseInt($(this).val());
      if(data.receipt == ''){
        alert('please select the receipt first');
        $('#amount_receipt').val('');
        return 0;
      }
      var bal = parseInt($('#bal_amount').val());
      if(data.amount > bal){
        alert('paid amount should be less then balance amount.Balance amount is '+bal);
        $('#amount').val('');
      }
})

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('includes.sidebar2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.footer2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.header2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.app2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>