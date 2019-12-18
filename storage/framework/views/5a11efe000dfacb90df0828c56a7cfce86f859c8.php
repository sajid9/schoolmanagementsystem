<?php $__env->startSection('title', 'Contract'); ?>
<?php $__env->startSection('pagetitle', 'Contract'); ?>
<?php $__env->startSection('content'); ?>

   <link href="<?php echo e(asset('css/cv.css')); ?>" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Rokkitt:400,700|Lato:400,300' rel='stylesheet' type='text/css'>
<div class="row">
  <div class="page-title">
    <div class="title_left">
      <h4> Print Contract
      </h4>
    </div>
  </div> 
</div>
<?php if(isset($viewcontract->getApplicents)): ?>

<div id="top">
<div id="cv" class="instaFade" style="background: white;">
  <div class="mainDetails">
    <div  class="quickFade" style="display: flex;">
      <img src="<?php echo e(asset('assets/images')); ?>/157010307151117799.png" alt="Alan Smith" width="70" height="70" />
      <h1 class="quickFade delayTwo">Sb Security</h1>
    </div>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Opposite PSO Petrol Pump, Soan Garden, Near PWD
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;051-5738082
</p>
    <div class="clear"></div>
  </div>
  <div id="mainArea" class="quickFade delayFive">
<p style="padding-left: 30px; text-align: right;"><?php echo e(date("F j, Y")); ?>&nbsp;</p>
<p style="padding-left: 30px; text-align: left;"><?php echo e($viewcontract->getApplicents->name); ?></p>
<p style="padding-left: 30px; text-align: left;"><?php echo e($viewcontract->getApplicents->address); ?></p>
<p style="padding-left: 30px; text-align: left;"><?php echo e($viewcontract->getApplicents->mobile); ?></p>
<p style="padding-left: 30px; text-align: left;">&nbsp;</p>
<p style="padding-left: 30px; text-align: left;">Dear <?php echo e($viewcontract->getApplicents->name); ?>,</p>
<p style="padding-left: 30px; text-align: left;">&nbsp;</p>
<p style="padding-left: 30px; text-align: left;">I am pleased to extend a job offer for the position of &ldquo;
  <?php if(isset($viewcontract->getdesignation)): ?>
  <?php echo e($viewcontract->getdesignation->designation); ?>

  <?php endif; ?>
  &rdquo; at SBSS to commence on <?php echo e($viewcontract->reportingdate); ?> . You will be in a full time, at-will employment reporting to CEO SBSS. Your contract will expire after <?php echo e($viewcontract->contractduration); ?>.</p>
<p style="padding-left: 30px; text-align: left;">&nbsp;</p>
<p style="padding-left: 30px; text-align: left;"><?php echo e($viewcontract->jobresponsibility); ?>.A basic cash compensation will be given at Rs.<?php echo e($viewcontract->salery); ?> per month payable in relation to the Company&rsquo;s payroll schedule.</p>
<p style="padding-left: 30px; text-align: left;">&nbsp;</p>
<p style="padding-left: 30px; text-align: left;">Please send a signed duplicate copy of this offer letter (along with CNIC copy) should you accept this job offer to the address found below.</p>

<p style="padding-left: 30px; text-align: left;">&nbsp;</p>
<p style="padding-left: 30px; text-align: left;">For any queries or additional questions, feel free to email or call us with the phone number and other contact details found below.</p>
<p style="padding-left: 30px; text-align: left;">&nbsp;</p>
<div id="hideprintmode">
<p style="padding-left: 30px; text-align: left;">Join date:&nbsp; <?php echo e($viewcontract->startdate); ?></p>
<p style="padding-left: 30px; text-align: left;">End Date:&nbsp; <?php echo e($viewcontract->enddate); ?></p>
<p style="padding-left: 30px; text-align: left; color: red;">Status Is Active:&nbsp;<?php echo e($viewcontract->is_active); ?></p>
<p style="padding-left: 30px; text-align: left; color: red;">Status Joining:&nbsp;<?php echo e($viewcontract->is_join); ?></p>
</div>
<p style="padding-left: 30px; text-align: left;">&nbsp;</p>
<p style="padding-left: 30px; text-align: left;">Sincerely yours,</p>
<p style="padding-left: 30px; text-align: left;">&nbsp;</p>
<p style="padding-left: 30px; text-align: left;">CEO, SBSS</p>
<p style="padding-left: 30px; text-align: left;">Opposite PSO Petrol Pump, Soan Garden, Near PWD</p>
<p style="padding-left: 30px; text-align: left;">051-5738082</p>
<p style="padding-left: 30px; text-align: left;">&nbsp;</p>
<p style="padding-left: 30px; text-align: left;">______________________</p>
<p style="padding-left: 30px; text-align: left;"><?php echo e($viewcontract->getApplicents->name); ?></p>
<p style="padding-left: 30px; text-align: left;"><?php echo e($viewcontract->getApplicents->address); ?></p>
<p style="padding-left: 30px; text-align: left;"><?php echo e($viewcontract->getApplicents->mobile); ?></p>
<p style="padding-left: 30px; text-align: left;">&nbsp;</p>
  </div>
</div>
 

</div>
<?php endif; ?>


<button class="btn btn-info btn-lg buttonpostioncustom"  id="headshot"  onclick="printDiv('top')"><i class="fa fa-print"></i> Print</button>


<?php $__env->stopSection(); ?>
<?php $__env->startSection("footer"); ?>
##parent-placeholder-d7eb6b340a11a367a1bec55e4a421d949214759f##
<style type="text/css">
  p{

    margin:0px!important;
  }
 h4{
      font-size: 12px !important;
 }
  .buttonpostioncustom{
    position: fixed;
    top: 281px;
    right:-27px; 
  }
  .customcontentpostion{
    width: 25%!important;
  }
  }
   
</style>
<script type="text/javascript">
  

  function printDiv(divName) {
    $('#hideprintmode').hide();
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('includes.sidebar2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.footer2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.header2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.app2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>