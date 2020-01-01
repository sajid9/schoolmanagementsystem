@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Fee Charges List')
@section('content')

 <div class="row">
  @include('includes.alerts')
   <div class="col-lg-12">
     <div class="panel panel-default">
       <div class="panel-heading">
                Fee Charges
         <a href="{{ url('/feeCharges')}}" type="button" class="btn btn-primary btn-sm pull-right">Add FeeCharges</a>      
       </div>
            <!-- /.panel-heading -->
         <div class="panel-body">
           <div class="table-responsive">
             <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                  <tr>
                    
                    <th>Charges Category</th>
                    <th>Charges Head</th>
  	                <th>Student Class</th>
                    <th>Amount</th>
                    <th>Transaction Type</th>
                    <th>Action</th>
                  </tr>
                 </thead>
                  <tbody>
	                  @foreach($feeCharges as $feeCharge)
						<tr>
              
              <td>{{$feeCharge->chargCategories->feeChargCategory}}</td>
              <td>{{$feeCharge->chargHeads->feeChargHead}}</td>
              <td>{{$feeCharge->classes->c_name}}</td>
              <td>{{$feeCharge->feeAmount}}</td>
              <td>{{$feeCharge->transactionType}}</td>
             
							<td>
                <a href="{{ url('editFeeCharges/'.$feeCharge->id)}}">
                  <i class="fa fa-edit"></i>
                </a>
                <a href="{{ url('delFeeCharges/'.$feeCharge->id)}}">
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