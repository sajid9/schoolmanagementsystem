@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Time Table List')
@section('content')

 <div class="row">
  @include('includes.alerts')
   <div class="col-lg-12">
    <form class="form-inline" method="POST" action="{{ url('attendancesearch') }}" style="margin-bottom: 20px;">
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
        <label for="class">Classes:</label>
        <select class="form-control" id="class" name="class">
          <option value="">Select Class</option>
          @foreach($classes as $class)
          <option value="{{$class->id}}">{{$class->c_name}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="section">Sections:</label>
        <select class="form-control" id="section" name="section">
          <option value="">Select Section</option>
          @foreach($sections as $section)
          <option value="{{$section->id}}">{{$section->sec_name}}</option>
          @endforeach
        </select>
      </div><br><br>
      <div class="form-group">
        <label for="from">From:</label>
        <input class="form-control" type="date" name="from" id="from">
      </div>
      <div class="form-group">
        <label for="to">To:</label>
        <input class="form-control" type="date" name="to" id="to">
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
        {{dd($attendance)}}
         <div class="panel-body">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <th>Student Name</th>
                  <th>Period</th>
                  <th>Subject</th>
                  <th>Time</th>
                  <th>Day</th>
                  <th>Class</th>
                  <th>Section</th>
                  <th>Date</th>
                </thead>
                <tbody>
                  @foreach($attendance as $att)
                  <tr>
                    <td>$att->admissions->registrations->firstName</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
                <!-- /.table-responsive -->
               
            </div>
            <!-- /.panel-body -->
        }
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