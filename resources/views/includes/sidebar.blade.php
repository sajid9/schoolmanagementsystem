@section('sidebar')
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.html">Startmin</a>
    </div>

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <ul class="nav navbar-nav navbar-left navbar-top-links">
        <li><a href="#"><i class="fa fa-home fa-fw"></i> Website</a></li>
    </ul>

    <ul class="nav navbar-right navbar-top-links">
        <li class="dropdown navbar-inverse">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-alerts">
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-comment fa-fw"></i> New Comment
                            <span class="pull-right text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                            <span class="pull-right text-muted small">12 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-envelope fa-fw"></i> Message Sent
                            <span class="pull-right text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-tasks fa-fw"></i> New Task
                            <span class="pull-right text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-upload fa-fw"></i> Server Rebooted
                            <span class="pull-right text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a class="text-center" href="#">
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> secondtruth <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                    </span>
                    </div>
                    <!-- /input-group -->
                </li>
                <li>
                    <a href="{{ url('/')}}" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="#">Academics <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="{{ url('/registeredStd')}}">Registration</a>
                                </li>
                                <li>
                                    <a href="{{ url('/admittedStd')}}">Admission</a>
                                </li>
                                <li>
                                    <a href="{{ url('/batches-list') }}">Batch</a>
                                </li>
                                <li>
                                    <a href="{{ url('/cEnrollments-list') }}">Class Enrollment</a>
                                </li>
                                <li>
                                    <a href="{{ url('/periods-list') }}">Period</a>
                                </li>
                                
                            </ul>
                        </ul>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="#">Misc. <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="{{ url('/sessions-list')}}">Session</a>
                                </li>
                                <li>
                                    <a href="{{ url('/classes-list')}}">Class</a>
                                </li>
                                <li>
                                    <a href="{{ url('/categories-list')}}">Category</a>
                                </li>
                                <li>
                                    <a href="{{ url('/sections-list')}}">Section</a>
                                </li>
                                <li>
                                    <a href="{{ url('/years-list')}}">Year</a>
                                </li>
                                <li>
                                    <a href="{{ url('/subjects-list')}}">Subject</a>
                                </li>
                                <li>
                                    <a href="{{ url('/days-list')}}">Day</a>
                                </li>
                                <li>
                                    <a href="{{ url('/time-list')}}">Time</a>
                                </li>
                                <li>
                                    <a href="{{ url('/classRooms-list')}}">Class Room</a>
                                </li>
                                <li>
                                    <a href="{{ url('/employees-list')}}">Employes</a>
                                </li>
                                
                            </ul>
                    </ul>
                    <!-- /.nav-second-level -->

                    <ul class="nav nav-second-level">
                        <li>
                            <a href="#">Examination <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="{{ url('/examTime-list')}}">Exam Timings</a>
                                </li>
                                <li>
                                    <a href="#">2</a>
                                </li>
                                <li>
                                    <a href="#">3</a>
                                </li>
                                
                                
                            </ul>
                    </ul>
                    <!-- /.nav-second-level -->
                
        </div>
    </div>
    </nav>
@endsection