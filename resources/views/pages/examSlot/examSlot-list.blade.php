@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Exam Slot List')
@section('content')

 <div class="row">
  @include('includes.alerts')
   <div class="col-lg-12">
     <div class="panel panel-default">
       <div class="panel-heading">
                Exam Slots
         <a href="{{ url('/examSlot')}}" type="button" class="btn btn-primary btn-sm pull-right">Add ExamSlot</a>      
       </div>
            <!-- /.panel-heading -->
         <div class="panel-body">
           <div class="table-responsive">
             <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                  <tr>
                  <th>Class Room</th>
	                <th>Exam Time</th>
                  <th>Day</th>
                  <th>Date</th>
                  <th>Action</th>
                   </tr>
                 </thead>
                  <tbody>
	                  @foreach($examSlots as $examSlot)
						<tr>
							<td>{{$examSlot->classRooms->cRoom_name}}</td>
              <td>{{$examSlot->examTimes->examTimeName}}</td>              
              <td>{{$examSlot->days->day_name}}</td>
              <td>{{$examSlot->slot_date}}</td>              
							
							<td>
                <a href="{{ url('editExamSlot/'.$examSlot->id)}}">
                  <i class="fa fa-edit"></i>
                </a>
                <a href="{{ url('delExamSlot/'.$examSlot->id)}}">
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