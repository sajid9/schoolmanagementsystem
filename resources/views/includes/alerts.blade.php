@if(session('message'))
	<div class="alert alert-success alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-lable="close">&times;</a>
		<strong>Success</strong> {{session('message')}}
	</div>
	@endif
	@if(session('error'))
	<div class="alert alert-danger alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-lable="close">&times;</a>
		<strong>Alert</strong>  {{session('error')}}
	</div>
	@endif