@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Registered Candidates')
@section('content')

 <div class="row">
  @include('includes.alerts')
   <div class="col-lg-12">
     <div class="panel panel-default">
       <div class="panel-heading">
                Registered Students
         <a href="{{ url('/registrationform')}}" type="button" class="btn btn-primary btn-sm pull-right">Add New</a>      
       </div>
            <!-- /.panel-heading -->
         <div class="panel-body">
           <div class="table-responsive">
             <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                  <tr>
                    <th>Student Name</th>
	                <th>Father Name</th>
	                <th>Class</th>
                  <th>Session</th>
	                <th>Gender</th>
	                <th>Action</th>
                   </tr>
                 </thead>
                  <tbody>
	                  @foreach($registrations as $reg)
						<tr>
							<td>{{$reg->firstName}}</td>
							<td>{{$reg->gfirstName}}</td>
							<td>{{$reg->classes->c_name}}</td>
              <td>{{$reg->session->s_name}}</td>
							<td>{{$reg->gender}}</td>
							<td>
                <a href="{{ route('view_profile', ['id'=>$reg->id]) }}">
                  <i class="fa fa-eye"></i>
                </a>
                <a href="{{ url('editRegistration/'.$reg->id)}}">
                  <i class="fa fa-edit"></i>
                </a>
                <a href="{{ url('delRegistration/'.$reg->id)}}">
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