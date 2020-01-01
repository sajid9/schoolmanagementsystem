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
        <!-- /.panel-heading -->
      <div class="panel-body">
        <form class="form-inline" method="POST" action="{{ url('result-search') }}" style="margin-bottom: 20px;">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="form-group">
            <label for="student">Students:</label>
            <select required="" class="form-control" id="student" name="student">
              <option value="">Select Student</option>
              @foreach($students as $studentdrop)
              <option value="{{$studentdrop->id}}">{{$studentdrop->registrations->firstName." / ".$studentdrop->registrations->gfirstName}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="class">Classes:</label>
            <select required="" class="form-control" id="class" name="class">
              <option value="">Select Class</option>
              @foreach($classes as $classdrop)
              <option value="{{$classdrop->id}}">{{$classdrop->c_name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="section">Sections:</label>
            <select required="" class="form-control" id="section" name="section">
              <option value="">Select Section</option>
              @foreach($sections as $sectiondrop)
              <option value="{{$sectiondrop->id}}">{{$sectiondrop->sec_name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="term">Term:</label>
            <select required="" class="form-control" id="term" name="term">
              <option value="">Select Term</option>
              @foreach($terms as $termdrop)
              <option value="{{$termdrop->id}}">{{$termdrop->examTermName}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label><button type="submit" class="btn btn-default">Search</button></label>
            
          </div>
        </form>
        <div class="row">
          <div class="col-md-12">
            @if(Request::is('result-search'))
            <form action="{{url('print-student-result')}}" method="post">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <input type="hidden" name="student" value="{{$student}}">
              <input type="hidden" name="class" value="{{$class}}">
              <input type="hidden" name="section" value="{{$section}}">
              <input type="hidden" name="term" value="{{$term}}">
              <button type="submit"  title="Print" data-toggle="tooltip" class="btn btn-sm btn-primary"><i class="fa fa-print"></i></button>
            </form>
            @endif
          </div>
        </div>
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