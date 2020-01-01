@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Time Table List')
@section('content')

 <div class="row">
  @include('includes.alerts')
   <div class="col-lg-12">
    <form class="form-inline" method="POST" action="{{ url('searchexamattendance') }}" style="margin-bottom: 20px;">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="form-group">
        <label for="student">Students:</label>
        <select class="form-control" id="student" name="student">
          <option value="">Select Student</option>
          @foreach($students as $student)
          <option value="{{$student->id}}">{{$student->registrations->firstName." / ".$student->registrations->gfirstName}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="term">Terms:</label>
        <select class="form-control" id="term" name="term">
          <option value="">Select Term</option>
          @foreach($terms as $term)
          <option value="{{$term->id}}">{{$term->examTermName}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label><button type="submit" class="btn btn-default">Search</button></label>
        
      </div>
    </form>
     <div class="panel panel-default">
       <div class="panel-heading">
           Attendance
       </div>
            <!-- /.panel-heading -->
          {{-- intialize empty array for days and time to remove repeatation and also check days --}}
        
         <div class="panel-body">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <th>Student Name</th>
                  <th>Subject</th>
                  <th>Time</th>
                  <th>Day</th>
                  <th>Class</th>
                  <th>Term</th>
                  <th>Attendance</th>
                  <th>Date</th>
                </thead>
                <tbody>
                  @foreach($attendance as $att)
                  <tr>
                    <td>{{$att->admission->registrations->firstName}}</td>
                    <td>{{$att->examschedule->subjects->sub_name}}</td>
                    <td>{{$att->examschedule->examSlots->examTimes->examTimeName}}</td>
                    <td>{{$att->examschedule->examSlots->days->day_name}}</td>
                    <td>{{$att->examschedule->examSlots->classRooms->cRoom_name}}</td>
                    <td>{{$att->examschedule->terms->examTermName}}</td>
                    <td>{{$att->is_active}}</td>
                    <td>{{$att->attendenceDate}}</td>
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