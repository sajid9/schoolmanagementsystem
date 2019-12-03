@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Students List')
@section('content')

 <div class="row">
  @include('includes.alerts')
   <div class="col-lg-12">
     <div class="panel panel-default">
       <div class="panel-heading">
                Admitted Students
         <a href="{{ url('/form')}}" type="button" class="btn btn-primary btn-sm pull-right">Register New</a>      
       </div>
            <!-- /.panel-heading -->
         <div class="panel-body">
           <div class="table-responsive">
             <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                  <tr>
                    <th>Name</th>
	                <th>Father Name</th>
	                <th>Phone Number</th>
	                <th>Email Address</th>
	                <th>Action</th>
                   </tr>
                 </thead>
                  <tbody>
	                  @foreach($registrations as $reg)
						<tr>
							<td>{{$reg->name}}</td>
							<td>{{$reg->f_name}}</td>
							<td>{{$reg->phone}}</td>
							<td>{{$reg->email}}</td>
							<td><a href="{{ url('editRegistration/'.$reg->id)}}"><i class="fa fa-edit"></i></a> <a href="{{ url('delRegistration/'.$reg->id)}}"><i class="fa fa-trash"></i></a>
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