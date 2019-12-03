@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Time Table List')
@section('content')

 <div class="row">
  @include('includes.alerts')
   <div class="col-lg-12">
     <div class="panel panel-default">
       <div class="panel-heading">
                Time Table
         <a href="{{ url('/timeTables')}}" type="button" class="btn btn-primary btn-sm pull-right">Add TimeTable</a>      
       </div>
            <!-- /.panel-heading -->
         <div class="panel-body">
           <div class="table-responsive">
             <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                  <tr>
                    <th>Period</th>
                    <th>Time</th>
                    <th>Day</th>
                    <th>Class Room</th>
  	                <th>Subject</th>
                    <th>Batch</th>
                    <th>Class</th>
                    <th>Section</th>
                    <th>Attendence</th>
                    <th>Action</th>
                  </tr>
                 </thead>
                  <tbody>
	                  @foreach($timeTables as $timeTable)
						<tr>
              <td>{{$timeTable->periods->periodName}}</td>
              <td>{{$timeTable->periods->times->time_name}}</td>
              <td>{{$timeTable->periods->days->day_name}}</td>
              <td>{{$timeTable->periods->classRooms->cRoom_name}}</td>
              <td>{{$timeTable->subjects->sub_name}}</td>
              <td>{{$timeTable->batches->batchName}}</td>
              <td>{{$timeTable->batches->classes->c_name}}</td>
              <td>{{$timeTable->batches->sections->sec_name}}</td>

              <td> {{--  <a href="{{ url('/timeTables')}}" type="button" class="btn btn-success btn-sm ">Mark</a> --}}
                 <a href="{{ route("attendence",['id'=>$timeTable->id,'batch'=>$timeTable->batches->id]) }}" type="button" class="btn btn-success btn-sm">Mark </a>
               </td> 
							
							<td>
                <a href="{{ url('editTimeTable/'.$timeTable->id)}}">
                  <i class="fa fa-edit"></i>
                </a>
                <a href="{{ url('delTimeTable/'.$timeTable->id)}}">
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