@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Admitted Candidates')
@section('content')

        <div class="row">
          @include('includes.alerts')
          <div class="col-lg-12">
           <div class="panel panel-default">
             <div class="panel-heading">
              Admitted Students
              <a href="{{ url('/admissionform')}}" type="button" class="btn btn-primary btn-sm pull-right">Add New</a>      
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
             <div class="table-responsive">
               <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                  <tr>
                    <th>Student Name</th>
                    <th>Guardian Name</th>
                    <th>Admission No</th>
                    <th>Admission Date</th>
                    <th>Category</th>
                    <th>Roll Number</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                 @foreach($admissions as $admission)
                 <tr>
                   <td>{{$admission->registrations->firstName}}</td>
                   <td>{{$admission->registrations->gfirstName}}</td>
                   <td>{{$admission->admissionNum}}</td>
                   <td>{{$admission->admissionDate}}</td>
                   <td>{{$admission->categories->cat_name}}</td>
                   <td>{{$admission->rollnumber}}</td>
                   <td>
                    <a href="{{ route('student_profile', ['id'=>$admission->id]) }}">
                      <i class="fa fa-eye"></i>
                    </a>
                    <a href="{{ url('editAdmission/'.$admission->id)}}">
                      <i class="fa fa-edit"></i>
                    </a> 
                    <a href="{{ url('delAdmission/'.$admission->id)}}">
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