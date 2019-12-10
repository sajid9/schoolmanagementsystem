<!DOCTYPE html>
<html lang="en">
  <head>
      <title><?php echo $__env->yieldContent('title'); ?></title>
      
      <?php echo $__env->yieldContent('header'); ?>
    </head>
    <style type="text/css">
      
      #datatable-buttons{
     
        width: 100%!important;
      }
    </style>
    <body>
		<body class="nav-md">
    <div class="container body">
      <div class="main_container">
			
		<?php echo $__env->yieldContent('sidebar'); ?>
			 <!-- top navigation -->
        <div class="top_nav" style="margin-top: -20px;">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo e(asset('images/img.jpg')); ?>" alt="">Name
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?php echo e(url('user/profile')); ?>"> Profile</a></li>
                    <li>
                      <a href="<?php echo e(url('user/companysetting')); ?>">
                        
                        <span>Company Profile</span>
                      </a>
                    </li>
                    <li><a href="<?php echo e(url('user/changepassword')); ?>">Reset Password</a></li>
                    <li>
                      <a id="logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo e(asset('images/img.jpg')); ?>" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo e(asset('images/img.jpg')); ?>" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo e(asset('images/img.jpg')); ?>" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo e(asset('images/img.jpg')); ?>" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <form id="logoutform" method="POST" action="<?php echo e(url('/logout')); ?>">
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        </form>

        <!-- /top navigation -->
         <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
           <?php echo $__env->yieldContent('content'); ?>
          </div>
        </div>
        <!-- /page content -->

		   </div>
		    </div>
		
		<?php echo $__env->yieldContent('footer'); ?>
    <script>
      $('#logout').on('click',function(){
        $('#logoutform').submit();
      })
    </script>
	</body>
</html>
