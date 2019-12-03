@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Teachers List')
@section('content')

 <div class="row">
  @include('includes.alerts')
   <div class="col-lg-12">
     <div class="panel panel-default">
       <div class="panel-heading">
                Admitted Students
         <a href="{{ url('/teachers')}}" type="button" class="btn btn-primary btn-sm pull-right">Register New</a>      
       </div>
            <!-- /.panel-heading -->
         <div class="panel-body">
           <div class="table-responsive">
             <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                  <tr>
                    <th>Name</th>
	                <th>Phone Number</th>
	                <th>Email</th>
                  <th>Address</th>
                  <th>Qualification</th>
	                <th>Action</th>
                   </tr>
                 </thead>
                  <tbody>
	                  @foreach($teachers as $teach)
						<tr>
							<td>{{$teach->name}}</td>
							<td>{{$teach->phone}}</td>
							<td>{{$teach->email}}</td>
							<td>{{$teach->address}}</td>
              <td>{{$teach->qualification}}</td>
							<td><a href="{{ url('editTeacher/'.$teach->id)}}"><i class="fa fa-edit"></i></a> <a href="{{ url('delTeacher/'.$teach->id)}}"><i class="fa fa-trash"></i></a>
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