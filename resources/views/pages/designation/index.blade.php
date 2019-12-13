{{-- extend  --}}
@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.footer2')
@extends('includes.sidebar2')
{{-- page titles --}}
@section('title', 'Applicants')
@section('pagetitle', 'Applicants')
@section('content')
<div class="row">
<div class="page-title">
  <div class="title_left">
    <h3> Applicants Designation</h3>
  </div>
</div>
</div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <a  href="{{ route('addapplicantdesignationview') }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Add Applicants Designation"><i class="fa fa-plus-square" ></i> Add</a>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Sr</th>
            <th>Designation</th>
            <th>Options</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($applicantdesignations as $applicantdesignation)
             <tr>
            <td>{{ $applicantdesignation->id }}</td>
            <td>{{ $applicantdesignation->designation }}</td>
            <td>
              <a  href="{{ route('editapplicantdesignation',['id'=> $applicantdesignation->id]) }}"class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Edit Designation"><i class="fa fa-edit"></i></a>
{{-- 
           <button class="btn btn-danger btn-xs applicantdelte" data-applicantId="{{$applicantevent->id  }}" data-toggle="tooltip" data-placement="top" title="Delete Event"><i class="fa fa-trash"></i> 
                </button> --}}
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
@endsection
@section("footer")
@parent

<script>

$("body").on("click",".applicantdelte",function(){
  var applicantId=$(this).attr('data-applicantId');
swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this imaginary file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
   window.location.href="{{ url('applicant/deleteapplicantevent') }}/"+applicantId

  } else {
    
  }
});
});

</script>
@endsection