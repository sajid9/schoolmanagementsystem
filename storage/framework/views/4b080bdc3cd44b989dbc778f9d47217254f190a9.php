<?php $__env->startSection('title', 'Applicants'); ?>
<?php $__env->startSection('pagetitle', 'Applicants'); ?>
<?php $__env->startSection('content'); ?>

   <link href="<?php echo e(asset('css/cv.css')); ?>" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Rokkitt:400,700|Lato:400,300' rel='stylesheet' type='text/css'>

<div class="row">
  <div class="page-title">
    <div class="title_left">
      <h4> Print Applicant
        <a href="<?php echo e(route('applicant')); ?>" class="btn btn-dark" id="hidebuttonc">Back</a></h4>
    </div>
  </div> 
</div>
<div class="x_panel">
<div id="top">
<div id="cv" class="instaFade">
  <div class="row">
    
    <div class="mainDetails">

      <div class="clear"></div>
      <br>
       <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-12 customcontentpostion">
         
        <img src="<?php echo e(asset('/images')); ?>/<?php echo e($applicant->image); ?>" alt="Alan Smith"  height="90" width="90" style="border: 1px solid white;border-radius: 4px;" />
    
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12 customcontentpostion">
          <label class="customlabelcolor">Name</label>
          <p class="customparagraph"><?php echo e($applicant->name); ?></p>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12 customcontentpostion">
          <label class="customlabelcolor">Cnic</label>
          <p class="customparagraph"><?php echo e($applicant->cnic); ?></p>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12 customcontentpostion">
          <label class="customlabelcolor">Ptcl</label>
          <p class="customparagraph"><?php echo e($applicant->ptcl); ?></p>

        </div>
      </div>
      <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-12 customcontentpostion">
          <label class="customlabelcolor">Father Name</label>
          <p class="customparagraph"><?php echo e($applicant->fname); ?></p>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12 customcontentpostion">
          <label class="customlabelcolor">City</label>
          <p class="customparagraph"><?php echo e($applicant->city); ?></p>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12 customcontentpostion">
          <label class="customlabelcolor">Weight/Kg</label>
          <p class="customparagraph"><?php echo e($applicant->weight); ?></p>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12 customcontentpostion">
          <label class="customlabelcolor">Height/ft & inc</label>
          <p class="customparagraph"><?php echo e($applicant->height); ?></p>

        </div>
      </div>
      <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-12 customcontentpostion">
          <label class="customlabelcolor">Date Of Birth</label>
          <p class="customparagraph"><?php echo e($applicant->dob); ?></p>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12 customcontentpostion">
          <label class="customlabelcolor">Address</label>
          <p class="customparagraph"><?php echo e($applicant->address); ?></p>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12 customcontentpostion">
          <label class="customlabelcolor">Current Applicant Id</label>
          <p class="customparagraph"># <?php echo e($applicant->id); ?></p>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12 customcontentpostion">
          <label class="customlabelcolor">Mobile</label>
          <p class="customparagraph"><?php echo e($applicant->mobile); ?></p>
        </div>
      </div>
    </div>
    </div>
 

    <br>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          
          <h4>Courses<a class="collapse-link"><i class="fa fa-chevron-up"></i></a></h4>
          
          <div class="x_content">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Year</th>
                  <th>Institute</th>
                </tr>
              </thead>
              <tbody>
                <?php if(isset($applicant->applicantcourse)): ?>
                <?php $__currentLoopData = $applicant->applicantcourse; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <th scope="row"><?php echo e($course->id); ?></th>
                  <td><?php echo e($course->name); ?></td>
                  <td><?php echo e($course->year); ?></td>
                  <td><?php echo e($course->institute); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          
          <h4>Qualification<a class="collapse-link"><i class="fa fa-chevron-up"></i></a></h4>
          
          <div class="x_content">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Degree</th>
                  <th>Total Marks</th>
                  <th>Obtain Marks</th>
                  <th>Institute </th>
                   <th>Year Of Passing </th>
                </tr>
              </thead>
              <tbody>
                 <?php if(isset($applicant->applicantqualifiction)): ?>
                  <?php $__currentLoopData = $applicant->applicantqualifiction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $applicantqualifiction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <th scope="row"><?php echo e($applicantqualifiction->id); ?></th>
                  <td><?php echo e($applicantqualifiction->degree); ?></td>
                  <td><?php echo e($applicantqualifiction->total_marks); ?></td>
                  <td><?php echo e($applicantqualifiction->obtain_marks); ?></td>
                  <td><?php echo e($applicantqualifiction->institute); ?></td>
                  <td><?php echo e($applicantqualifiction->year_of_passing); ?></td>
                </tr>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          
          <h4>Experience<a class="collapse-link"><i class="fa fa-chevron-up"></i></a></h4>
          
          <div class="x_content">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Employer</th>
                  <th>Title</th>
                  <th>Field</th>
                  <th>Start Date</th>
                    <th>End Date</th>
                </tr>
              </thead>
              <tbody>
                 <?php if(isset($applicant->applicantexperience)): ?>
                  <?php $__currentLoopData = $applicant->applicantexperience; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $applicantexperience): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <th scope="row"><?php echo e($applicantexperience->id); ?></th>
                  <td><?php echo e($applicantexperience->employer); ?></td>
                  <td><?php echo e($applicantexperience->title); ?></td>
                  <td><?php echo e($applicantexperience->field); ?></td>
                  <td><?php echo e($applicantexperience->start_date); ?></td>
                  <td><?php echo e($applicantexperience->end_date); ?></td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

</div>
</div>
</div>

<button class="btn btn-info btn-lg buttonpostioncustom"  id="headshot" onclick="printDiv()"><i class="fa fa-print"></i> Print</button>

<?php $__env->stopSection(); ?>
<?php $__env->startSection("footer"); ?>
##parent-placeholder-d7eb6b340a11a367a1bec55e4a421d949214759f##
<style type="text/css">
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
  

  function printDiv() {
    $('#hidebuttonc').hide();

     window.print();
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('includes.sidebar2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.footer2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.header2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.app2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>