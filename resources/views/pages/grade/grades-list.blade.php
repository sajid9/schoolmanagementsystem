@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Grades List')
@section('content')

 <div class="row">
  @include('includes.alerts')
   <div class="col-lg-8">
     <div class="panel panel-default">
       <div class="panel-heading">
                Grades
         <a href="{{ url('/grades')}}" type="button" class="btn btn-primary btn-sm pull-right">Add Grade</a>      
       </div>
            <!-- /.panel-heading -->
         <div class="panel-body">
           <div class="table-responsive">
             <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                  <tr>
                    <th>Min Marks</th>
                    <th>Max Marks</th>
                    <th>Grade</th>
	                <th>Action</th>
                   </tr>
                 </thead>
                  <tbody>
	                  @foreach($grades as $grade)
						<tr>
							<td>{{$grade->min_marks}}</td>
              <td>{{$grade->max_marks}}</td>
              <td>{{$grade->grade_name}}</td>

              <td><a href="{{ url('editGrades/'.$grade->id)}}"><i class="fa fa-edit"></i></a> <a href="{{ url('delGrades/'.$grade->id)}}"><i class="fa fa-trash"></i></a>
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