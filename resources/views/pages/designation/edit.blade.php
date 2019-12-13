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
      <h3> Update  Designation</h3>
    </div>
  </div>
</div>
<div class="row"> 
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <h2>Update Designation</h2>
    <div class="x_content">
      
      <form class="form-horizontal form-label-left" action="{{ route('updateapplicantdesignation') }}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="d_id" value="{{ $applicantdesignation->id }}">
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Designation</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
         <input type="text" name="designation" class="form-control" placeholder="Designation Name" value="{{ $applicantdesignation->designation }}">
          @if($errors->first('designation'))
              <p class="customalertclass">{{ $errors->first('designation') }}</p>
              @endif
        
          </div>
        </div> 
        <div class="form-group">
          <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-success">Update</button>
              <a href="{{ route('applicantdesignation') }}" class="btn btn-primary">Go back </a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

</div>
@endsection
@section("footer")
@parent
<style>
  .customalertclass{
   
    padding: 2px;
    border-radius: 3px 4px 4px 3px;
    background-color: #CE5454;
    z-index: 1;
    margin-top: 37px;
    color: white;
    margin: 0;
}

</style>
<script >
$(document).ready(function(){
 
function datetimepickercustom(){

 $('.customdatepicker').datetimepicker({
        format: 'DD/MM/YYYY'
    });
}
datetimepickercustom();
});
</script>
@endsection