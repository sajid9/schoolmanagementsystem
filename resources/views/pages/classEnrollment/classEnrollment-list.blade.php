@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Class Enrollments')
@section('content')

        <div class="row">
          @include('includes.alerts')
          <div class="col-lg-12">
           <div class="panel panel-default">
             <div class="panel-heading">
              Admitted Students
              <a href="{{ url('/cEnrollments')}}" type="button" class="btn btn-primary btn-sm pull-right">Add New</a>      
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
             <div class="table-responsive">
               <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                  <tr>
                    <th>Student</th>
                    <th>Guardian</th>
                    <th>DOB</th>
                    <th>Batch</th>
                    <th>Class</th>
                    <th>Section</th>
                    <th>Year</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                 @foreach($cenrolls as $cenroll)
                 <tr>
                   <td>{{$cenroll->admissions->registrations->firstName}}</td>
                   <td>{{ $cenroll->gfirstName }}</td>
                   <td>{{ $cenroll->dateBirth }}</td>
                   <td>{{$cenroll->batches->batchName}}</td>
                   <td>{{$cenroll->batches->classes->c_name}}</td>
                   <td>{{$cenroll->batches->sections->sec_name}}</td>
                   <td>{{$cenroll->batches->years->yearName}}</td>
                   <td>{!!($cenroll->is_active == 'yes')? '<span class="label label-primary">active</span>' :'<span class="label label-danger">unactive</span>'!!}</td>
                   
                   <td>
                    {{-- <a href="{{ route('student_profile', ['id'=>$admission->id]) }}">
                      <i class="fa fa-eye"></i>
                    </a> --}}
                    <a href="{{ url('editcEnrollment/'.$cenroll->id)}}">
                      <i class="fa fa-edit"></i>
                    </a> 
                    <a href="{{ url('delcEnrollment/'.$cenroll->id)}}">
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