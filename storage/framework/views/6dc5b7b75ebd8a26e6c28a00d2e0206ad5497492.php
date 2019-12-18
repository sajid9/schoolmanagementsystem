<?php $__env->startSection('title', 'Applicants'); ?>
<?php $__env->startSection('pagetitle', 'Applicants'); ?>
<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('css/cv.css')); ?>" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Rokkitt:400,700|Lato:400,300' rel='stylesheet' type='text/css'>
<div class="row">
  <div class="page-title">
    <div class="title_left">
      <h4> All Shortlisted
    <a href="<?php echo e(route('allshortlistedtable')); ?>" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="" data-original-title="For Easy Seletion Click Here">Easy Selection <i class="fa fa-table"></i></a>
      </h4>
    </div>
  </div> 
</div>
<div class="x_panel">
  <form action="<?php echo e(route('allshortlistedfilter')); ?> " method="post"  enctype="multipart/form-data">
  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
  <div  class="row">
    
    <div class="col-md-3 col-sm-3 col-xs-1 customcontentpostion">
      <div class="form-group custominline">
        <label>Id</label>&nbsp;&nbsp;
        <input type="number" name="id" min="0" class="form-control"  placeholder="0">
      </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-1 customcontentpostion">
      <div class="form-group custominline">
        <label>Cnic</label>&nbsp;&nbsp;
        <input type="text" name="cnic" class="form-control" data-inputmask="'mask' : '99999-9999-999-9'">
      </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-1 customcontentpostion">
      <div class="form-group custominline">
        <label>Weight</label>&nbsp;&nbsp;
        <input type="number" name="weight" min="0" class="form-control"  placeholder="0.00">
      </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-1 customcontentpostion">
      <div class="form-group custominline">
        <label>Height</label>&nbsp;&nbsp;
        <input type="number" name="height" min="0" class="form-control"  placeholder="0">
      </div>
    </div>
    
  </div>
 
  <div  class="row">
    
    <div class="col-md-3 col-sm-3 col-xs-1 customcontentpostion">
      <div class="form-group custominline">
       
        <div class="input-group date customdatepicker" id="mydob">
          <input type="text" class="form-control" name="dob_from" placeholder="Dob From">
          <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
          </span>
          
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-1 customcontentpostion">
      <div class="form-group custominline">
       
        <div class="input-group date customdatepicker" id="mydob">
          <input type="text" class="form-control" name="dob_to" placeholder="Dob To">
          <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
          </span>
          
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-1 customcontentpostion">
      <div class="form-group custominline">
       
        <div class="input-group date " id="datefrom">
          <input type="text" class="form-control" name="date_from" placeholder="Date From">
          <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
          </span>
          
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-1 customcontentpostion">
      <div class="form-group custominline">
       
        <div class="input-group date " id="dateto">
          <input type="text" class="form-control" name="date_to" placeholder="Date To">
          <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
          </span>
          
        </div>
      </div>
    </div>
  </div>
  <input type="submit" class="btn btn-info  buttonpostioncustom" value="Filter Records">
</form>
  <a href="<?php echo e(route('allshortlisted')); ?>" class="btn btn-primary buttonpostioncustom2">All Shortlisted</a>
  <?php $__currentLoopData = $applicants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $applicant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <div  class="row">
    <div class="col-md-2 col-sm-2 col-xs-1 customcontentpostion">
    
     <?php if($applicant->is_selected=="yes"): ?>
    <a href="<?php echo e(route('marktounselected',['id'=>$applicant->id])); ?>" class="btn btn-warning btn-md btn-block" style="background: #EF240F;"> <i class="fa fa-refresh"></i>Un Select</a>
    <?php else: ?>
    <a href="<?php echo e(route('marktoselected',['id'=>$applicant->id])); ?>" class="btn btn-dark btn-md btn-block"> <i class="fa fa-check"></i>Select Applicant</a>
    <?php endif; ?>
    
   
    </div>
    <div class="col-md-2 col-sm-2 col-xs-1 customcontentpostion">
      <?php if($applicant->is_shortlist=="yes"): ?>
    <a href="<?php echo e(route('unshortlist',['id'=>$applicant->id])); ?>" class="btn btn-warning btn-md btn-block"> <i class="fa fa-refresh"></i>Reset</a>
    <?php endif; ?>
    </div>
    <div class="col-md-2 col-sm-2 col-xs-1 customcontentpostion">
         <?php if($applicant->is_shortlist=="no"): ?>
    <a href="<?php echo e(route('unshortlist',['id'=>$applicant->id])); ?>" class="btn btn-warning btn-md btn-block"> <i class="fa fa-refresh"></i>Reset</a>
      <?php else: ?>
      <a href="<?php echo e(route('notshortlist',['id'=>$applicant->id])); ?>" class="btn btn-danger btn-md btn-block"> <i class="fa fa-remove"></i> Not Shortlisted</a>
      <?php endif; ?>
    
    </div>
    <div class="col-md-2 col-sm-2 col-xs-1 customcontentpostion">
      <?php if($applicant->is_selected=="no"): ?>
       <p class="mycustomalert" style="background: #ef240f;"><strong>Status: <i class="fa fa-times-circle-o" style="font-size:20px; "></i>Not Selected</strong></p>
      <?php endif; ?>
      <?php if($applicant->is_selected=="yes"): ?>
        <p class="mycustomalert" style="background: #2A3F54; "><strong>Status: <i class="fa fa-check" style="font-size:20px; "></i> Selected </strong></p>
      <?php endif; ?>
   
     
        
       
    </div>
    <div class="col-md-3 col-sm-2 col-xs-2 customcontentpostion">
   <?php echo e($applicants->links()); ?>

  <p>Showing  <strong> <?php echo e($applicants->count()); ?> </strong> of  <strong> <?php echo e($applicants->total()); ?>  </strong></p>
  
  



    </div>
  </div>
 
  <div class="row">
    
    <div class="mainDetails">

      <div class="clear"></div>
      <br>
       <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-12 customcontentpostion">
         
        <img src="<?php echo e(asset('assets/images')); ?>/<?php echo e($applicant->image); ?>" alt="Alan Smith"  height="90" width="90" style="border: 1px solid white;border-radius: 4px;" />
    
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
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
  <?php $__env->stopSection(); ?>
  <?php $__env->startSection("footer"); ?>
  ##parent-placeholder-d7eb6b340a11a367a1bec55e4a421d949214759f##
  <style type="text/css">
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
  .customcontentpostion{
  text-align: center;
  }
  .customlabelcolor{
  color: #5BC0DE;
  }
  .customparagraph{
 font-size: 14px;
 color: white;
  }
  .custominline{
  /*display: flex;*/
  color: brown;
  }
  .pagination{
    margin: unset!important;
  }
  .mycustomalert{
    color: white;
    border-radius: 3px;
    padding: 10px;
  }
  .mainDetails {
    padding:0px !important; 
    
    background: #2A3F54 !important;
  }
  </style>
  <script>

  $(document).ready(function(){

   
$("body").on("click","#datefrom",function(){
 $('#datefrom').datetimepicker({
      format: 'YYYY-MM-DD'
      
       });
});

$("body").on("click","#dateto",function(){
$('#dateto').datetimepicker({
      format: 'YYYY-MM-DD'
      
       });
});


  $('.customdatepicker').datetimepicker({
  format: 'DD/MM/YYYY'
  });
  });
  
  </script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('includes.sidebar2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.footer2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.header2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.app2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>