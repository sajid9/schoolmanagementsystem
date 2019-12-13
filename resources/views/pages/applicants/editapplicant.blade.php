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
      <h3> Update Applicants</h3>
    </div>
  </div>
</div>
<form action="{{ route('updateapplicant',['id'=> $applicant->id]) }}" method="post"  enctype="multipart/form-data">
  <input type="hidden" name="_token" value="{{csrf_token()}}">
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <a href="{{ route('applicant') }}" class="btn btn-dark">Back</a>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>

    <div class="x_content">
      <div class="col-md-6 col-sm-6 col-xs-6">
        <div class="form-horizontal form-label-left">
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Name</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input id="name" class="form-control col-md-7 col-xs-12"  name="name" placeholder="both name(s) e.g Jon Doe" type="text" value="{{ $applicant->name }}">
              @if($errors->first('name'))
              <p class="customalertclass">{{ $errors->first('name') }}</p>
              @endif
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">CNIC</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text"    name="cnic"class="form-control" data-inputmask="'mask' : '99999-9999-999-9'" value="{{ $applicant->cnic }}">
              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
              @if($errors->first('cnic'))
              <p class="customalertclass">{{ $errors->first('cnic') }}</p>
              @endif
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Image</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
            <input type="file" class="form-control"   name="file" id="image" >

             <input type="hidden" class="form-control"   name="image"  value="{{ $applicant->image }}">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3"> Father Name</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input id="fname" class="form-control col-md-7 col-xs-12"  name="fname" placeholder="Father Name"   type="text" value="{{ $applicant->fname }}">
               @if($errors->first('fname'))
              <p class="customalertclass">{{ $errors->first('fname') }}</p>
              @endif
               
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3"> DOB</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <div class="input-group date customdatepicker" id="mydob">
                <input type="text" class="form-control" name="dob" value="{{ $applicant->dob }}" >
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </span>
                
              </div>
               @if($errors->first('dob'))
              <p class="customalertclass">{{ $errors->first('dob') }}</p>
              @endif
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3"> Address</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <textarea id="address"    name="address" class="form-control col-md-7 col-xs-12"> {{ $applicant->address }}</textarea>
               @if($errors->first('address'))
              <p class="customalertclass">{{ $errors->first('address') }}</p>
              @endif
              
            </div>
          </div>
          
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-6">
        <div class="form-horizontal form-label-left">
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3"> City</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <select  id="city" name="city"  class="select2_single form-control" tabindex="-1"> 
             
                <option value="">Select City</option>
               
                <option {{ ($applicant->city == "AK")? 'selected' : '' }} value="AK">Alaska</option>
                <option {{ ($applicant->city == "HI")? 'selected' : '' }} value="HI">Hawaii</option>
                
              </select>
               @if($errors->first('city'))
              <p class="customalertclass">{{ $errors->first('city') }}</p>
              @endif
              
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Mobile NO:</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text"    name="mobile" class="form-control" data-inputmask="'mask' : '9999-9999999'" value="{{ $applicant->mobile }}">
              
              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
               @if($errors->first('mobile'))
              <p class="customalertclass">{{ $errors->first('mobile') }}</p>
              @endif
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">PTCL NO:</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="text" name="ptcl" class="form-control" data-inputmask="'mask' : '999-9999999'" value="{{ $applicant->ptcl }}">
              
              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Weight kg</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="number"  name="weight" class="form-control" id="weight" value="{{ $applicant->weight }}">
              
              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
               @if($errors->first('weight'))
              <p class="customalertclass">{{ $errors->first('weight') }}</p>
              @endif
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Height ft/in</label>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <input type="number"   name="height" class="form-control" id="height" value="{{ $applicant->height }}">
              
              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
               @if($errors->first('height'))
              <p class="customalertclass">{{ $errors->first('height') }}</p>
              @endif
            </div>
          </div>
          <br>
        </div>
      </div>
    </div>
  </div>
</div>
</div>


<div class="row ">
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h4>Courses</h4>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
      </li>
      <li>
    <button class="btn btn-info btn-sm addMorecourse" type="submit" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add More Fields"> <i class="fa fa-plus"></i></button>
  </li>
    </ul>

    <div class="clearfix"></div>
  </div>
  @foreach($courses as $course)
  <div class="x_content course">
    <div class="col-md-6 col-sm-6 col-xs-6">
      <div class="form-horizontal form-label-left">
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-3">Course</label>
          <div class="col-md-9 col-sm-9 col-xs-9">
            <input id="course" class="form-control col-md-7 col-xs-12"  name="course[]" placeholder="course name"  type="text" value="{{ $course->name }}">
            
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-3"> Year</label>
          <div class="col-md-9 col-sm-9 col-xs-9">
            <div class="input-group date customdatepicker" id="year">
              <input type="text" class="form-control" name="year[]" value="{{ $course->year }}">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6">
      <div class="form-horizontal form-label-left">
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-3">Institute</label>
          <div class="col-md-9 col-sm-9 col-xs-9">
            <input id="c_institute" class="form-control col-md-7 col-xs-12"  name="c_institute[]" placeholder="Institute name"  type="text" value="{{ $course->institute }}">
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
</div>
</div>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
  <div class="x_title">
    <h4>Qualification</h4>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
     
    </li>
     <li>
         <button class="btn btn-info btn-sm addMorequalifiction" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add More Fields"> <i class="fa fa-plus"></i> </button>
      </li>
  </ul>
  <div class="clearfix"></div>
</div>
 @foreach($qualifictions as $qualifiction)

<div class="x_content qualifiction">
  <div class="col-md-6 col-sm-6 col-xs-6">
    <div class="form-horizontal form-label-left">
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-3"> Degree</label>
        <div class="col-md-9 col-sm-9 col-xs-9">
          <select  id="degree" name="degree[]"class="select2_single form-control" tabindex="-1">
            <option value="">Select Degree</option>
               
                <option {{ ($applicant->degree == "AK")? 'selected' : '' }} value="AK">Alaska</option>
                <option {{ ($applicant->degree == "HI")? 'selected' : '' }} value="HI">Hawaii</option>
            
          </select>
          
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-3">Total Marks</label>
        <div class="col-md-9 col-sm-9 col-xs-9">
          <input type="number"  min='0' value="{{ $qualifiction->total_marks }}" name="total_marsks[]" class="form-control" id="total_maraks" placeholder="0.00">
          
          
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-3">Obtain Marks</label>
        <div class="col-md-9 col-sm-9 col-xs-9">
          <input type="number" value="{{ $qualifiction->obtain_marks }}" name="obtain_marsks[]" class="form-control" id="obtain_marsks" min="0" placeholder="0.00">
          
          
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-sm-6 col-xs-6">
    <div class="form-horizontal form-label-left">
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-3"> Institute</label>
        <div class="col-md-9 col-sm-9 col-xs-9">
          <select  id="q_institute" name="q_institute[]"class="select2_single form-control" tabindex="-1">
            <option {{ ($applicant->institute == "AK")? 'selected' : '' }} value="AK">Alaska</option>
                <option {{ ($applicant->institute == "HI")? 'selected' : '' }} value="HI">Hawaii</option>
            
          </select>
          
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-3"> Year of Passing</label>
        <div class="col-md-9 col-sm-9 col-xs-9">
          <div class="input-group date customdatepicker" id="yop">
            <input type="text" class="form-control" value="{{ $qualifiction->year_of_passing }}" name="yop[]">
            <span class="input-group-addon">
              <span class="glyphicon glyphicon-calendar"></span>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
</div>
</div>
</div>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">
  <h4>Experience</h4>
  <ul class="nav navbar-right panel_toolbox">
    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
  </li>
   <li>
    <button class="btn btn-info btn-sm addMoreexp" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add More Fields"> <i class="fa fa-plus"></i> </button>
  </li>
 
</ul>
<div class="clearfix"></div>
</div>
@foreach($experiences as $experience)
<div class="x_content exp">
<div class="col-md-6 col-sm-6 col-xs-6">
  <div class="form-horizontal form-label-left">
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-3"> Employer</label>
      <div class="col-md-9 col-sm-9 col-xs-9">
        <input id="employer" class="form-control col-md-7 col-xs-12"  name="employer[]" placeholder="Employer"  type="text" value="{{ $experience->employer }}">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-3"> Title/Role</label>
      <div class="col-md-9 col-sm-9 col-xs-9">
        <input id="title" class="form-control col-md-7 col-xs-12"  name="title[]" placeholder="Title/Role" type="text" value="{{ $experience->title }}">
      </div>
    </div>
  </div>
</div>
<div class="col-md-6 col-sm-6 col-xs-6">
  <div class="form-horizontal form-label-left">
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-3"> Start Date</label>
      <div class="col-md-9 col-sm-9 col-xs-9">
        <div class="input-group date customdatepicker" id="join_date">
          <input type="text" class="form-control" name="join_date[]" value="{{ $experience->start_date }}">
          <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
          </span>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-3"> End Date</label>
      <div class="col-md-9 col-sm-9 col-xs-9">
        <div class="input-group date customdatepicker" id="end_date">
          <input type="text" class="form-control" name="end_date[]" value="{{ $experience->end_date }}">
          <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
          </span>
        </div>
        
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-3"> Field</label>
      <div class="col-md-9 col-sm-9 col-xs-9">
        <textarea rows="5" cols="50" id="field"  name="field[]" class="form-control col-md-7 col-xs-12">{{ $experience->field }}</textarea>
        
      </div>
    </div>
  </div>
</div>
</div>
@endforeach
</div>
</div>
</div>
<input type="submit" class="btn btn-warning btn-lg buttonpostioncustom" value="Update all info"> 
</form> 

@include('pages.applicants.sections.course-from-dublicate')
@include('pages.applicants.sections.qualification-form-dublicate')
@include('pages.applicants.sections.experience-from-dublicate')
@endsection
@section("footer")
@parent
<style type="text/css">
.actionBar{
border-top: none !important;
}
.buttonpostioncustom{
z-index: 20;
right: -4px;
position: fixed;
top: 60px;

}

.customalertclass{
   
    padding: 2px;
    border-radius: 3px 4px 4px 3px;
    background-color: #CE5454;
    max-width: 353px;
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

$("body").on("click",".year",function(){
datetimepickercustom();
});

$("body").on("click",".join_date",function(){
datetimepickercustom();
});
$("body").on("click",".end_date",function(){
datetimepickercustom();
});
$("body").on("click",".yop",function(){
datetimepickercustom();
});
//group add limit
var maxGroup = 10;

//add more fields group courses
$(".addMorecourse").click(function(e){

  e.preventDefault();

if($('body').find('.course').length < maxGroup){
var fieldHTML = '<div class="x_content fieldGroupcourseremove">'+$(".fieldGroupcourseCopy").html()+'</div>';
$('body').find('.course:last').after(fieldHTML);
}else{
alert('Maximum '+maxGroup+' groups are allowed.');
}
});

//remove fields group
$("body").on("click",".courseremove",function(){
$(this).parents(".fieldGroupcourseremove").remove();
});
//add more fields group Qualifictions
$(".addMorequalifiction").click(function(e){
  e.preventDefault();
if($('body').find('.qualifiction').length < maxGroup){
var fieldHTML = '<div class="x_content fieldGroupqualificationremove">'+$(".fieldGroupqualificationCopy").html()+'</div>';
$('body').find('.qualifiction:last').after(fieldHTML);
}else{
alert('Maximum '+maxGroup+' groups are allowed.');
}
});

//remove fields group
$("body").on("click",".qualificationremove",function(){
$(this).parents(".fieldGroupqualificationremove").remove();
});
//add more fields group Qualifictions
$(".addMoreexp").click(function(e){
  e.preventDefault();
if($('body').find('.exp').length < maxGroup){
var fieldHTML = '<div class="x_content fieldGroupexpremove">'+$(".fieldGroupexpCopy").html()+'</div>';
$('body').find('.exp:last').after(fieldHTML);
}else{
alert('Maximum '+maxGroup+' groups are allowed.');
}
});

//remove fields group
$("body").on("click",".expremove",function(){
$(this).parents(".fieldGroupexpremove").remove();
});
});
</script>
@endsection