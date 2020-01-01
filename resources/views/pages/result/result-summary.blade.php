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
          <form class="form-inline" method="POST" action="{{ url('search-result-summary') }}" style="margin-bottom: 20px;">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
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
            </div>
            <div class="form-group">
              <label for="term">Sections:</label>
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
          @php
            $passed = 0;$fail = 0; 
          @endphp
          <span class="badge" style="border-radius: 0;background-color:#007BFF">Total Students: <span>{{count($results)}}</span></span> 
          <span class="badge" style="border-radius: 0;background-color: #28A745">passed Students: <span id="passed"></span></span> 
          <span class="badge" style="border-radius: 0;background-color: #DC3545">Fail Students: <span id="fail"></span></span>
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
                  @if($result->obtain_marks >= $result->pass_marks)
                    @php $passed += 1; @endphp
                  @elseif($result->obtain_marks < $result->pass_marks)
                  @php $fail += 1; @endphp
                  @endif
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
    $('#passed').text('{{$passed}}');
    $('#fail').text('{{$fail}}');
    
  });
</script>

@endsection