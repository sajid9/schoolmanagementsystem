@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Employee Salary List')
@section('content')

 <div class="row">
  @include('includes.alerts')
   <div class="col-lg-12">
     <div class="panel panel-default">
       <div class="panel-heading">
                Employee Salary
         <a href="{{ url('/employeeSalary')}}" type="button" class="btn btn-primary btn-sm pull-right">Add EmployeeSalary</a>      
       </div>
            <!-- /.panel-heading -->
         <div class="panel-body">
           <div class="table-responsive">
             <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                  <tr>
                    <th>Employee Name</th>
                    <th>CNIC</th>
                    <th>Charges Head</th>
  	                <th>Month</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Recept Type</th>
                    <th>Action</th>
                  </tr>
                 </thead>
                  <tbody>
	                  @foreach($employeeSalaries as $employeeSalary)
      						<tr>
                    <td>{{$employeeSalary->employees->emp_name}}</td>
                    <td>{{$employeeSalary->emp_cnic}}</td>
                    <td>{{$employeeSalary->chargHeads->salaryChargHead}}</td>
                    <td>{{$employeeSalary->months->month_name}}</td>
                    <td>{{$employeeSalary->salary_date}}</td>
                    <td>{{$employeeSalary->salaryAmount}}</td>
                    <td>{{$employeeSalary->receptType}}</td>
                   
      							<td>
                      <a href="{{ url('editEmployeeSalary/'.$employeeSalary->id)}}">
                        <i class="fa fa-edit"></i>
                      </a>
                      <a href="{{ url('delEmployeeSalary/'.$employeeSalary->id)}}">
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