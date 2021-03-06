@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Salary Charges List')
@section('content')

 <div class="row">
  @include('includes.alerts')
   <div class="col-lg-12">
     <div class="panel panel-default">
       <div class="panel-heading">
                Salary Charges
         <a href="{{ url('/salaryCharges')}}" type="button" class="btn btn-primary btn-sm pull-right">Add SalaryCharges</a>      
       </div>
            <!-- /.panel-heading -->
         <div class="panel-body">
           <div class="table-responsive">
             <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                  <tr>
                    
                    <th>Charges Category</th>
                    <th>Charges Head</th>
  	                <th>Employee Grade</th>
                    <th>Amount</th>
                    <th>Transaction Type</th>
                    <th>Action</th>
                  </tr>
                 </thead>
                  <tbody>
	                  @foreach($salaryCharges as $salaryCharge)
						<tr>
              
              <td>{{$salaryCharge->chargCategories->salaryChargCategory}}</td>
              <td>{{$salaryCharge->chargHeads->salaryChargHead}}</td>
              <td>{{$salaryCharge->employeeGrades->employeeGrade}}</td>
              <td>{{$salaryCharge->salaryAmount}}</td>
              <td>{{$salaryCharge->transactionType}}</td>
             
							<td>
                <a href="{{ url('editSalaryCharges/'.$salaryCharge->id)}}">
                  <i class="fa fa-edit"></i>
                </a>
                <a href="{{ url('delSalaryCharges/'.$salaryCharge->id)}}">
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