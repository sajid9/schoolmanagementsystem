
@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.footer2')
@extends('includes.sidebar2')
{{-- page titles --}}
@section('title', 'Applicants')
@section('pagetitle', 'Applicants')
@section('content')

   <link href="{{ asset('css/cv.css') }}" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Rokkitt:400,700|Lato:400,300' rel='stylesheet' type='text/css'>

<div class="row">
  <div class="page-title">
    <div class="title_left">
      <h4> Print Applicant
        <a href="{{ route('applicant') }}" class="btn btn-dark" id="hidebuttonc">Back</a></h4>
    </div>
  </div> 
</div>
<div class="x_panel">
<div id="top">
<div id="cv" class="instaFade">
  <div class="row">
    
    <div class="mainDetails">

      <div class="clear"></div>
      <br>
       <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-12 customcontentpostion">
         
        <img src="{{ asset('/images') }}/{{ $applicant->image}}" alt="Alan Smith"  height="90" width="90" style="border: 1px solid white;border-radius: 4px;" />
    
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12 customcontentpostion">
          <label class="customlabelcolor">Name</label>
          <p class="customparagraph">{{ $applicant->name }}</p>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12 customcontentpostion">
          <label class="customlabelcolor">Cnic</label>
          <p class="customparagraph">{{ $applicant->cnic }}</p>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12 customcontentpostion">
          <label class="customlabelcolor">Ptcl</label>
          <p class="customparagraph">{{ $applicant->ptcl }}</p>

        </div>
      </div>
      <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-12 customcontentpostion">
          <label class="customlabelcolor">Father Name</label>
          <p class="customparagraph">{{ $applicant->fname }}</p>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12 customcontentpostion">
          <label class="customlabelcolor">City</label>
          <p class="customparagraph">{{ $applicant->city }}</p>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12 customcontentpostion">
          <label class="customlabelcolor">Weight/Kg</label>
          <p class="customparagraph">{{ $applicant->weight }}</p>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12 customcontentpostion">
          <label class="customlabelcolor">Height/ft & inc</label>
          <p class="customparagraph">{{ $applicant->height }}</p>

        </div>
      </div>
      <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-12 customcontentpostion">
          <label class="customlabelcolor">Date Of Birth</label>
          <p class="customparagraph">{{ $applicant->dob }}</p>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12 customcontentpostion">
          <label class="customlabelcolor">Address</label>
          <p class="customparagraph">{{ $applicant->address }}</p>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12 customcontentpostion">
          <label class="customlabelcolor">Current Applicant Id</label>
          <p class="customparagraph"># {{ $applicant->id }}</p>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12 customcontentpostion">
          <label class="customlabelcolor">Mobile</label>
          <p class="customparagraph">{{ $applicant->mobile }}</p>
        </div>
      </div>
    </div>
    </div>
 

    <br>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          
          <h4>Courses<a class="collapse-link"><i class="fa fa-chevron-up"></i></a></h4>
          
          <div class="x_content">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Year</th>
                  <th>Institute</th>
                </tr>
              </thead>
              <tbody>
                @if (isset($applicant->applicantcourse))
                @foreach($applicant->applicantcourse as $course)
                <tr>
                  <th scope="row">{{ $course->id }}</th>
                  <td>{{ $course->name }}</td>
                  <td>{{ $course->year }}</td>
                  <td>{{ $course->institute }}</td>
                </tr>
                @endforeach 
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          
          <h4>Qualification<a class="collapse-link"><i class="fa fa-chevron-up"></i></a></h4>
          
          <div class="x_content">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Degree</th>
                  <th>Total Marks</th>
                  <th>Obtain Marks</th>
                  <th>Institute </th>
                   <th>Year Of Passing </th>
                </tr>
              </thead>
              <tbody>
                 @if (isset($applicant->applicantqualifiction))
                  @foreach($applicant->applicantqualifiction as $applicantqualifiction)
                <tr>
                  <th scope="row">{{ $applicantqualifiction->id }}</th>
                  <td>{{ $applicantqualifiction->degree }}</td>
                  <td>{{ $applicantqualifiction->total_marks }}</td>
                  <td>{{ $applicantqualifiction->obtain_marks }}</td>
                  <td>{{ $applicantqualifiction->institute}}</td>
                  <td>{{ $applicantqualifiction->year_of_passing }}</td>
                </tr>
               @endforeach
               @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          
          <h4>Experience<a class="collapse-link"><i class="fa fa-chevron-up"></i></a></h4>
          
          <div class="x_content">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Employer</th>
                  <th>Title</th>
                  <th>Field</th>
                  <th>Start Date</th>
                    <th>End Date</th>
                </tr>
              </thead>
              <tbody>
                 @if (isset($applicant->applicantexperience))
                  @foreach($applicant->applicantexperience as $applicantexperience)
                <tr>
                  <th scope="row">{{ $applicantexperience->id }}</th>
                  <td>{{ $applicantexperience->employer }}</td>
                  <td>{{ $applicantexperience->title }}</td>
                  <td>{{ $applicantexperience->field }}</td>
                  <td>{{ $applicantexperience->start_date }}</td>
                  <td>{{ $applicantexperience->end_date }}</td>
                </tr>
              @endforeach
              @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

</div>
</div>
</div>

<button class="btn btn-info btn-lg buttonpostioncustom"  id="headshot" onclick="printDiv()"><i class="fa fa-print"></i> Print</button>

@endsection
@section("footer")
@parent
<style type="text/css">
  h4{
      font-size: 12px !important;
 }
  .buttonpostioncustom{
    position: fixed;
    top: 281px;
    right:-27px; 
  }
  .customcontentpostion{
    width: 25%!important;
  }
  }
   
</style>
<script type="text/javascript">
  

  function printDiv() {
    $('#hidebuttonc').hide();

     window.print();
}
</script>
@endsection
