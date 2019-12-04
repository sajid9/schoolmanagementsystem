@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Results List')
@section('content')

 <div class="row">
  @include('includes.alerts')
   <div class="col-lg-12">
     <div class="panel panel-default">
       <div class="panel-heading">
                Results
         <a href="{{ url('/results')}}" type="button" class="btn btn-primary btn-sm pull-right">Add Result</a>      
       </div>
            <!-- /.panel-heading -->
         <div class="panel-body">
           <div class="table-responsive">
             <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                  <tr>
                    <th>Student</th>
  	                <th>Class</th>
                    <th>Subject</th>
                    <th>Exam Term</th>
                    <th>Total Marks</th>
                    <th>Obtained Marks</th>
                    <th>Passing Marks</th>
                    <th>Grade</th>
                    <th>Action</th>
                  </tr>
                 </thead>
                  <tbody>
	                  @foreach($results as $result)
						<tr>
              <td>{{$result->admissions->registrations->firstName}}</td>
              <td>{{$result->examSchedules->batches->classes->c_name}}</td>
              <td>{{$result->examSchedules->subjects->sub_name}}</td>
              <td>{{$result->examSchedules->examTerms->examTermName}}</td>
              <td>{{$result->total_marks}}</td>
              <td>{{$result->obtain_marks}}</td>
              <td>{{$result->pass_marks}}</td>
              <td>{{$result->grades->grade_name}}</td>

             <!--  {{-- <td> 
                 <a href="{{ route("attendence",['id'=>$timeTable->id,'batch'=>$timeTable->batches->id]) }}" type="button" class="btn btn-success btn-sm">Mark </a>
               </td>  --}} -->
							
							<td>
                <a href="{{ url('editResults/'.$result->id)}}">
                  <i class="fa fa-edit"></i>
                </a>
                <a href="{{ url('delResults/'.$result->id)}}">
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