{{-- extend  --}}
@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')

{{-- page titles --}}
@section('title', 'Dashboard')
@section('pagetitle', 'Payment Listing')

{{-- add css which use only for this page --}}
@section('header')
	@parent
	<!-- Social Buttons CSS -->
	<link href="{{asset('assets/css/bootstrap-social.css')}}" rel="stylesheet">
@endsection

{{-- page content --}}
@section('content')
<div class="row" style="padding-bottom: 10px">
	<div class="col-md-12">
		<a href="{{url('payment/addpaymentform')}}" class="btn btn-social btn-bitbucket pull-right">
		    <i class="fa fa-plus"></i> Add Payment
		</a>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		{{-- alets messages --}}		
		@include('includes.alerts')
		
		{{-- panel start --}}
		<div class="panel panel-default">
		    <div class="panel-heading">
		        Payment Listing
		    </div>
		    <div class="panel-body">
			    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
			        <thead>
			            <tr>
			                <th>Sr#</th>
			                <th>Account</th>
			                <th>Type</th>
			                <th>Payment Through</th>
			                <th>Payment Desc</th>
			                <th>Debit</th>
			                <th>Credit</th>
			                <th>Date</th>
			            </tr>
			        </thead>
			        <tbody>
			        	<?php $count = 0; ?>
			        	@foreach($payments as $payment)
			            <tr class="odd gradeX">
			                <td>{{ ++$count }}</td>
			                <td>{{($payment->account != null) ? $payment->account->account_title : "null" }}</td>
			                <td>{{ $payment->type }}</td>
			                <td>{{ $payment->payment_through }}</td>
			                <td>{{ $payment->payment_desc }}</td>
			                <td>{{ $payment->debit }}</td>
			                <td>{{ $payment->credit }}</td>
			                <td>{{ date_format($payment->created_at,'d M Y') }}</td>
			                
			                
			            </tr>
			            @endforeach
			        </tbody>
			    </table>
		</div>
	</div>
	</div>
</div>

@endsection

{{-- add js files which use only for this current page --}}

@section('footer')
	@parent
	<!-- DataTables JavaScript -->
	<script src="{{asset('assets/js/dataTables/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('assets/js/dataTables/dataTables.bootstrap.min.js')}}"></script>
	<script>
	    $(document).ready(function() {
	        $('#dataTables-example').DataTable({
	                responsive: true
	        });
	        $('[data-toggle="tooltip"]').tooltip();
	    });
	    function deletepayment(id){
	    	if(window.confirm('do you really wanna delete this record?')){
	    		var url = '{{url('payment/deletecategory')}}';
	    		window.location.href = url+'/'+id;
	    	}
	    }
	</script>
@endsection