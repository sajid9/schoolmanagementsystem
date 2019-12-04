@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Exam Schedule List')
@section('content')

 <div class="row">
  @include('includes.alerts')
   <div class="col-lg-12">
     <div class="panel panel-default">
       <div class="panel-heading">
                Exam Schedule
         <a href="{{ url('/examSchedule')}}" type="button" class="btn btn-primary btn-sm pull-right">Add ExamSchedule</a>      
       </div>
            <!-- /.panel-heading -->
         <div class="panel-body">
           <div class="table-responsive">
             <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                  <tr>
                    <th>Class</th>
  	                <th>Subject</th>
                    <th>Class Room</th>
                    <th>Day</th>
                    <th>Exam Time</th>
                    <th>Date</th>
                    <th>Term</th>
                    <th>Attendence</th>
                    <th>Action</th>
                  </tr>
                 </thead>
                  <tbody>
	                  @foreach($examSchedules as $examSchedule)
						<tr>
              <td>{{$examSchedule->batches->classes->c_name}}</td>
              <td>{{$examSchedule->subjects->sub_name}}</td>
              <td>{{$examSchedule->examSlots->classRooms->cRoom_name}}</td>
              <td>{{$examSchedule->examSlots->days->day_name}}</td>
              <td>{{$examSchedule->examSlots->examTimes->examTimeName}}</td>
              <td>{{$examSchedule->examSlots->slot_date}}</td>
              <td>{{$examSchedule->examTerms->examTermName}}</td>
              <td><a href="{{url('examattendence/'.$examSchedule->id.'/'.$examSchedule->batch_id)}}" type="button" class="btn btn-success btn-sm">Mark </a></td>
              {{-- <td> 
                 <a href="{{ route("attendence",['id'=>$timeTable->id,'batch'=>$timeTable->batches->id]) }}" type="button" class="btn btn-success btn-sm">Mark </a>
               </td>  --}}
							
							<td>
                <a href="{{ url('editExamSchedule/'.$examSchedule->id)}}">
                  <i class="fa fa-edit"></i>
                </a>
                <a href="{{ url('delExamSchedule/'.$examSchedule->id)}}">
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