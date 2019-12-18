@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Employee Total Salary List')
@section('content')

 <div class="row">
  @include('includes.alerts')
   <div class="col-lg-12">
     <div class="panel panel-default">
       <div class="panel-heading">
                Employee Total Salary
         <a href="{{ url('/employeeTotalSalary')}}" type="button" class="btn btn-primary btn-sm pull-right">Add EmployeeTotalSalary</a>      
       </div>
            <!-- /.panel-heading -->
         <div class="panel-body">
           <div class="table-responsive">
             <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                  <tr>
                    <th>Employee Name</th>
                    <th>Employee Grade</th>
  	                <th>Month</th>
                    <th>Amount</th>
                    <th>Action</th>
                  </tr>
                 </thead>
                  <tbody>
	                  @foreach($employeeSalaries as $employeeSalary)
      						<tr>
                    <td>{{$employeeSalary->employees->emp_name}}</td>
                    <td>{{$employeeSalary->employees->employeeGrades->employeeGrade}}</td>
                    <td>{{$employeeSalary->months->month_name}}</td>
                    <td>{{$employeeSalary->totalAmount}}</td>
                   
      							<td>
                      <a href="{{ url('editEmployeeTotalSalary/'.$employeeSalary->id)}}">
                        <i class="fa fa-edit"></i>
                      </a>
                      <a href="{{ url('delEmployeeTotalSalary/'.$employeeSalary->id)}}">
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