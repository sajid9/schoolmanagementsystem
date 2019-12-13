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
    <h3> Applicants</h3>
  </div>
</div>
</div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <a  href="{{ route('addapplicant') }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Add Applicants"><i class="fa fa-plus-square" ></i> Add</a>
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
            <th>Name</th>
            <th>Image</th>
            <th>Cnic</th>
            <th>City</th>
            <th>DOB</th>
            <th>Options</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($applicants as $applicant)
             <tr>
            <td>{{ $applicant->id }}</td>
            <td>{{ $applicant->name }}</td>
            <td>
              <img src="{{ asset('assets/images') }}/{{ $applicant->image }}" alt="Smiley face" height="50" width="50" >
            </td>
            <td>{{ $applicant->cnic }}</td>
            <td>{{ $applicant->city }}</td>
            <td>{{ $applicant->dob }}</td>
            <td>
              <a  href="{{ route('viewapplicant',['id'=> $applicant->id]) }}"class="btn btn-primary btn-xs"  data-toggle="tooltip" data-placement="top" title="view Applicants"><i class="fa fa-eye"></i></a>

              <a  href="{{ route('editapplicant',['id'=> $applicant->id]) }}"class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Edit Applicants"><i class="fa fa-edit"></i></a>

  <button class="btn btn-danger btn-xs applicantdelte" data-applicantId="{{$applicant->id  }}" data-toggle="tooltip" data-placement="top" title="Delete Applicants"><i class="fa fa-trash"></i> 
                </button>
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
   window.location.href="{{ url('applicant/applicantdel') }}/"+applicantId

  } else {
    
  }
});
});




</script>
@endsection