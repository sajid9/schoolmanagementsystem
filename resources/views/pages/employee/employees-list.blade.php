@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Employees List')
@section('content')

 <div class="row">
  @include('includes.alerts')
   <div class="col-lg-12">
     <div class="panel panel-default">
       <div class="panel-heading">
                Employees
         <a href="{{ url('/employees')}}" type="button" class="btn btn-primary btn-sm pull-right">Add Employ</a>      
       </div>
            <!-- /.panel-heading -->
         <div class="panel-body">
           <div class="table-responsive">
             <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                  <tr>
                  <th>Name</th>
                  <th>Employee Grade</th>
	                <th>Action</th>
                   </tr>
                 </thead>
                  <tbody>
	                  @foreach($employees as $employee)
						<tr>
							<td>{{$employee->emp_name}}</td>
              <td>{{$employee->employeeGrades->employeeGrade}}</td>
							
							<td>
                <a href="{{ url('editEmployees/'.$employee->id)}}">
                  <i class="fa fa-edit"></i>
                </a>
                <a href="{{ url('delEmployees/'.$employee->id)}}">
                  <i class="fa fa-trash"></i>
                </a>
              </td>
						</tr>
	                  @endforeach
                    </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
               
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>


@endsection
@section('footer')
@parent
<script>
	$(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true
                });
            });
</script>

@endsection