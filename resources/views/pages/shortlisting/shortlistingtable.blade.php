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
    <h3> Easy Shortlisting

<a href="{{ route('shortlisting') }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="" data-original-title="For Detail Shortlisting Click Here">Switch to Detail Shortlisting </a>
    </h3>
  </div>
</div>
</div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
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
             <th>Status</th>
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
              @if($applicant->is_shortlist=="yes")
              <span class="label label-success">Into Shortlist</span>
              @elseif($applicant->is_shortlist=="no")
             <span class="label label-danger">Not Shortlisted</span>
              @else
             <span class="label label-warning">Defult (Reset)</span>
              @endif

            </td>
            <td> 
              <a  href="{{ route('shortlistingtableview',['id'=> $applicant->id]) }}"class="btn btn-primary btn-xs"  data-toggle="tooltip" data-placement="top" title="view Applicants"><i class="fa fa-eye"></i></a>

              <a  href="{{ route('marktoshortlist',['id'=>$applicant->id]) }}"class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Mark into Shortlist"><i class="fa fa-check"></i></a>

            <a href="{{ route('notshortlist',['id'=>$applicant->id]) }}" class="btn btn-danger btn-xs applicantdelte"  data-toggle="tooltip" data-placement="top" title="Not Shortlisted"><i class="fa fa-remove"></i>
                </a>
                 <a  href="{{ route('unshortlist',['id'=>$applicant->id]) }}"class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Reset All Status Current Applicant"><i class="fa fa-refresh"></i></a>
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
<style type="text/css">
  .label{
        font-size: 94% !important;
  }
</style>

@endsection