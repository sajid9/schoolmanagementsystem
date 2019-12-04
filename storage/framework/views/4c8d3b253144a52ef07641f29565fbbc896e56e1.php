<?php $__env->startSection('sidebar'); ?>
   <br />

            <!-- sidebar menu -->
   
   <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo e(url('/')); ?>" class="site_title"><i class="fa fa-paw"></i> <span>SB Software</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo e(asset('assets/images/user.png')); ?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Sajid</h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />
            
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-graduation-cap"></i>Academics<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                       <li>
                           <a href="<?php echo e(url('/registeredStd')); ?>">Registration</a>
                       </li>
                       <li>
                           <a href="<?php echo e(url('/admittedStd')); ?>">Admission</a>
                       </li>
                       <li>
                           <a href="<?php echo e(url('/admissionreport')); ?>">Admission Report</a>
                       </li>
                       <li>
                           <a href="<?php echo e(url('/batches-list')); ?>">Batch</a>
                       </li>
                       <li>
                           <a href="<?php echo e(url('/cEnrollments-list')); ?>">Class Enrollment</a>
                       </li>
                       <li>
                           <a href="<?php echo e(url('/periods-list')); ?>">Period</a>
                       </li>
                       <li>
                           <a href="<?php echo e(url('/timeTable-list')); ?>">Time Table</a>
                       </li>
                       <li>
                           <a href="<?php echo e(url('timeTableReport')); ?>">Time Table Report</a>
                       </li>
                       <li>
                           <a href="<?php echo e(url('attendanceReport')); ?>">Attendance Report</a>
                       </li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-folder"></i> Misc. <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li>
                          <a href="<?php echo e(url('/sessions-list')); ?>">Session</a>
                      </li>
                      <li>
                          <a href="<?php echo e(url('/classes-list')); ?>">Class</a>
                      </li>
                      <li>
                          <a href="<?php echo e(url('/categories-list')); ?>">Category</a>
                      </li>
                      <li>
                          <a href="<?php echo e(url('/sections-list')); ?>">Section</a>
                      </li>
                      <li>
                          <a href="<?php echo e(url('/years-list')); ?>">Year</a>
                      </li>
                      <li>
                          <a href="<?php echo e(url('/subjects-list')); ?>">Subject</a>
                      </li>
                      <li>
                          <a href="<?php echo e(url('/days-list')); ?>">Day</a>
                      </li>
                      <li>
                          <a href="<?php echo e(url('/time-list')); ?>">Time</a>
                      </li>
                      <li>
                          <a href="<?php echo e(url('/classRooms-list')); ?>">Class Room</a>
                      </li>
                      <li>
                          <a href="<?php echo e(url('/employees-list')); ?>">Employes</a>
                      </li>
                    </ul>
                  </li>
                <li><a><i class="fa fa-clipboard"></i>Examination<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                       <li>
                           <a href="<?php echo e(url('/examTime-list')); ?>">Exam Timings</a>
                       </li>
                       <li>
                           <a href="<?php echo e(url('/examTerm-list')); ?>">Exam Terms</a>
                       </li>
                       <li>
                           <a href="<?php echo e(url('/examSlot-list')); ?>">Exam Slot</a>
                       </li>
                       <li>
                           <a href="<?php echo e(url('/examSchedule-list')); ?>">Exam Schedule</a>
                       </li>
                       <li>
                           <a href="<?php echo e(url('/grades-list')); ?>">Grade</a>
                       </li>
                       <li>
                           <a href="<?php echo e(url('/results-list')); ?>">Result</a>
                       </li>
                       
                    </ul>
                  </li>

                  
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
          
            <!-- /sidebar menu -->
<?php $__env->stopSection(); ?>