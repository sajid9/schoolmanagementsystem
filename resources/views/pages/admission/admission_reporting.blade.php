@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Admitted Candidates')
@section('header')
@parent
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dataTables/dataTables.bootstrap.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dataTables/dataTables.responsive.css') }}">
@endsection
@section('content')

        <div class="row">
          @include('includes.alerts')
          <div class="col-lg-12">
           <div class="panel panel-default">
             <div class="panel-heading">
              Admission Report
            </div>
            
            <!-- /.panel-heading -->
            <div class="panel-body">
             <div class="table-responsive">
               <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                  <tr>
                    <th>Student Name</th>
                    <th>Father Name</th>
                    <th>Class</th>
                    <th>Section</th>
                    <th>Year</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($enrollments as $enrollment)
                  <tr>
                    <td>{{ (isset($enrollment->admissions->registrations)) ? $enrollment->admissions->registrations->firstName : "" }}
                    </td>
                    <td>{{ (isset($enrollment->admissions->registrations)) ? $enrollment->admissions->registrations->gfirstName : "" }}
                    </td>
                    <td>{{ (isset($enrollment->batches->classes)) ? $enrollment->batches->classes->c_name : "" }}
                    </td>
                    <td>{{ (isset($enrollment->batches->sections)) ? $enrollment->batches->sections->sec_name : "" }}
                    </td>
                    <td>{{ (isset($enrollment->batches->years)) ? $enrollment->batches->years->yearName : "" }}
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
  <script src="{{ asset('assets/js/dataTables/dataTables.bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/dataTables/jquery.dataTables.min.js') }}"></script>
  <script>
    $(document).ready(function() {
                  $('#dataTables-example').DataTable({
                          responsive: true
                  });
              });
  </script>

  @endsection