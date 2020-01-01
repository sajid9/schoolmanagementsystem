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
                  <li>
                    <a><i class="fa fa-graduation-cap"></i>Registration<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li>
                        <a href="<?php echo e(url('/sessions-list')); ?>">Session</a>
                      </li>
                      <li>
                          <a href="<?php echo e(url('/registeredStd')); ?>">Register</a>
                       </li>
                    </ul>
                  </li>
                  <li>
                    <a><i class="fa fa-graduation-cap"></i>Admission<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li>
                          <a href="<?php echo e(url('/categories-list')); ?>">Category</a>
                      </li>
                      <li>
                           <a href="<?php echo e(url('/admittedStd')); ?>">Admission</a>
                       </li>
                    </ul>
                  </li>
                  <li>
                    <a><i class="fa fa-graduation-cap"></i>Batch<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li>
                        <a href="<?php echo e(url('/classes-list')); ?>">Class</a>
                      </li>
                      <li>
                        <a href="<?php echo e(url('/sections-list')); ?>">Section</a>
                      </li>
                      <li>
                        <a href="<?php echo e(url('/years-list')); ?>">Year</a>
                      </li>
                      <li>
                        <a href="<?php echo e(url('/batches-list')); ?>">Batch</a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a><i class="fa fa-graduation-cap"></i>Enrollment<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li>
                        <a href="<?php echo e(url('/cEnrollments-list')); ?>">Class Enrollment</a>
                       </li>
                    </ul>
                  </li>
                  <li>
                    <a><i class="fa fa-graduation-cap"></i>Time Table<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li>
                        <a href="<?php echo e(url('/months-list')); ?>">Month</a>
                      </li>
                      <li>
                        <a href="<?php echo e(url('/days-list')); ?>">Period Day</a>
                      </li>
                      <li>
                        <a href="<?php echo e(url('/time-list')); ?>">Period Time</a>
                      </li>
                      <li>
                        <a href="<?php echo e(url('/classRooms-list')); ?>">Class Room</a>
                      </li>
                      <li>
                        <a href="<?php echo e(url('/subjects-list')); ?>">Subject</a>
                      </li>
                      <li>
                          <a href="<?php echo e(url('/timeTable-list')); ?>">Time Table</a>
                       </li>
                       <li>
                          <a href="<?php echo e(url('timeTableReport')); ?>">Time Table Report</a>
                       </li>
                    </ul>
                  </li>
                  <li>
                    <a><i class="fa fa-graduation-cap"></i>Attendance<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li>
                        <a href="<?php echo e(url('attendanceReport')); ?>">Attendance Report</a>
                       </li>
                    </ul>
                  </li>
                  <li>
                    <a><i class="fa fa-graduation-cap"></i>Examination<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li>
                           <a href="<?php echo e(url('/examTime-list')); ?>">Exam Timings</a>
                       </li>
                       <li>
                           <a href="<?php echo e(url('/examSlot-list')); ?>">Exam Slot</a>
                       </li>
                       <li>
                           <a href="<?php echo e(url('/examTerm-list')); ?>">Exam Terms</a>
                       </li>
                       
                       <li>
                           <a href="<?php echo e(url('/examSchedule-list')); ?>">Exam Schedule</a>
                       </li>
                       <li>
                           <a href="<?php echo e(url('/results-list')); ?>">Result</a>
                       </li>
                       <li>
                           <a href="<?php echo e(url('/student-result')); ?>">Students Result</a>
                       </li>
                       <li>
                           <a href="<?php echo e(url('/result-summary')); ?>">Result Summary</a>
                       </li>
                       <li>
                           <a href="<?php echo e(url('/examination-attendence')); ?>">Examination Attendence</a>
                       </li>
                    </ul>
                  </li>
                  <li>
                    <a><i class="fa fa-clipboard"></i>Salary<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                       <li>
                          <a href="<?php echo e(url('/salaryChargTypes-list')); ?>">Salary Type</a>
                       </li>
                       <li>
                          <a href="<?php echo e(url('/salaryChargCategory-list')); ?>">Salary Category</a>
                       </li>
                       <li>
                          <a href="<?php echo e(url('/salaryChargHead-list')); ?>">Salary Head</a>
                       </li>
                       <li>
                          <a href="<?php echo e(url('/salaryCharges-list')); ?>">Charges</a>
                       </li>
                       <li>
                          <a href="<?php echo e(url('/employeeSalary')); ?>">Salary</a>
                       </li>
                       <li>
                          <a href="<?php echo e(url('/employeeTotalSalary-list')); ?>">Employee Total Salary</a>
                       </li>
                    </ul>
                  </li>
                  <li>
                    <a><i class="fa fa-graduation-cap"></i>Employee<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li>
                          <a href="<?php echo e(url('/employeeGrade-list')); ?>">Grade</a>
                       </li>
                      <li>
                          <a href="<?php echo e(url('/employees-list')); ?>">Employee</a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a><i class="fa fa-clipboard"></i>Expenditure<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li>
                        <a href="<?php echo e(url('expenditure/headlisting')); ?>">Head</a>
                      </li>
                      <li>
                        <a href="<?php echo e(url('payment/financialyear')); ?>">Financial Year</a>
                      </li>
                      <li>
                        <a href="<?php echo e(url('account/accountlisting')); ?>">Accounts</a>
                      </li>
                      <li>
                        <a href="<?php echo e(url('payment/paymentlisting')); ?>">Payment</a>
                      </li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clipboard"></i>Student Fee<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                       <li>
                           <a href="<?php echo e(url('/feeChargTypes-list')); ?>">Fee Charges Type</a>
                       </li>
                       <li>
                           <a href="<?php echo e(url('/feeChargCategory-list')); ?>">Fee Charges Category</a>
                       </li>
                       <li>
                           <a href="<?php echo e(url('/feeChargHead-list')); ?>">Fee Charges Head</a>
                       </li>
                       
                       <li>
                           <a href="<?php echo e(url('/feeCharges-list')); ?>">Fee Charges</a>
                       </li>
                       <li>
                         <a href="#">2</a>
                       </li>
                       <li>
                           <a href="<?php echo e(url('/studentFee-list')); ?>">Student Fee</a>
                       </li>
                       
                       
                    </ul>
                  </li>
                  <li class="customactive"><a><i class="fa fa-table"></i>Applicants <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu customshowul">
                      <li><a href="<?php echo e(route('applicant')); ?>">Register Applicant</a></li>
                      <li><a href="<?php echo e(route('shortlisting')); ?>"> Applicant Shortlisting </a></li>
                      <li><a href="<?php echo e(route('allshortlisted')); ?>"> Applicant Selection </a></li>
                      <li><a href="<?php echo e(route('applicantdesignation')); ?>">Add Designations</a></li>
                      <li><a href="<?php echo e(route('contracts')); ?>">Contracts</a></li>
                      <li><a href="<?php echo e(route('joining')); ?>">joining </a></li>
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