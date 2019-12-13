{{-- extend  --}}
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
      <h4> All Shortlisted
    <a href="{{ route('allshortlistedtable') }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="" data-original-title="For Easy Seletion Click Here">Easy Selection <i class="fa fa-table"></i></a>
      </h4>
    </div>
  </div> 
</div>
<div class="x_panel">
  <form action="{{ route('allshortlistedfilter') }} " method="post"  enctype="multipart/form-data">
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <div  class="row">
    
    <div class="col-md-3 col-sm-3 col-xs-1 customcontentpostion">
      <div class="form-group custominline">
        <label>Id</label>&nbsp;&nbsp;
        <input type="number" name="id" min="0" class="form-control"  placeholder="0">
      </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-1 customcontentpostion">
      <div class="form-group custominline">
        <label>Cnic</label>&nbsp;&nbsp;
        <input type="text" name="cnic" class="form-control" data-inputmask="'mask' : '99999-9999-999-9'">
      </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-1 customcontentpostion">
      <div class="form-group custominline">
        <label>Weight</label>&nbsp;&nbsp;
        <input type="number" name="weight" min="0" class="form-control"  placeholder="0.00">
      </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-1 customcontentpostion">
      <div class="form-group custominline">
        <label>Height</label>&nbsp;&nbsp;
        <input type="number" name="height" min="0" class="form-control"  placeholder="0">
      </div>
    </div>
    
  </div>
 
  <div  class="row">
    
    <div class="col-md-3 col-sm-3 col-xs-1 customcontentpostion">
      <div class="form-group custominline">
       {{--  <label>Dob From</label>&nbsp;&nbsp; --}}
        <div class="input-group date customdatepicker" id="mydob">
          <input type="text" class="form-control" name="dob_from" placeholder="Dob From">
          <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
          </span>
          
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-1 customcontentpostion">
      <div class="form-group custominline">
       {{--  <label>Dob TO</label>&nbsp;&nbsp; --}}
        <div class="input-group date customdatepicker" id="mydob">
          <input type="text" class="form-control" name="dob_to" placeholder="Dob To">
          <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
          </span>
          
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-1 customcontentpostion">
      <div class="form-group custominline">
       {{--  <label>Date From</label>&nbsp;&nbsp; --}}
        <div class="input-group date " id="datefrom">
          <input type="text" class="form-control" name="date_from" placeholder="Date From">
          <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
          </span>
          
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-1 customcontentpostion">
      <div class="form-group custominline">
       {{--  <label>Date To</label>&nbsp;&nbsp; --}}
        <div class="input-group date " id="dateto">
          <input type="text" class="form-control" name="date_to" placeholder="Date To">
          <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
          </span>
          
        </div>
      </div>
    </div>
  </div>
  <input type="submit" class="btn btn-info  buttonpostioncustom" value="Filter Records">
</form>
  <a href="{{ route('allshortlisted') }}" class="btn btn-primary buttonpostioncustom2">All Shortlisted</a>
  @foreach ( $applicants as $applicant)
   <div  class="row">
    <div class="col-md-2 col-sm-2 col-xs-1 customcontentpostion">
    
     @if($applicant->is_selected=="yes")
    <a href="{{ route('marktounselected',['id'=>$applicant->id]) }}" class="btn btn-warning btn-md btn-block" style="background: #EF240F;"> <i class="fa fa-refresh"></i>Un Select</a>
    @else
    <a href="{{ route('marktoselected',['id'=>$applicant->id]) }}" class="btn btn-dark btn-md btn-block"> <i class="fa fa-check"></i>Select Applicant</a>
    @endif
    
   
    </div>
    <div class="col-md-2 col-sm-2 col-xs-1 customcontentpostion">
      @if($applicant->is_shortlist=="yes")
    <a href="{{ route('unshortlist',['id'=>$applicant->id]) }}" class="btn btn-warning btn-md btn-block"> <i class="fa fa-refresh"></i>Reset</a>
    @endif
    </div>
    <div class="col-md-2 col-sm-2 col-xs-1 customcontentpostion">
         @if($applicant->is_shortlist=="no")
    <a href="{{ route('unshortlist',['id'=>$applicant->id]) }}" class="btn btn-warning btn-md btn-block"> <i class="fa fa-refresh"></i>Reset</a>
      @else
      <a href="{{ route('notshortlist',['id'=>$applicant->id]) }}" class="btn btn-danger btn-md btn-block"> <i class="fa fa-remove"></i> Not Shortlisted</a>
      @endif
    
    </div>
    <div class="col-md-2 col-sm-2 col-xs-1 customcontentpostion">
      @if($applicant->is_selected=="no")
       <p class="mycustomalert" style="background: #ef240f;"><strong>Status: <i class="fa fa-times-circle-o" style="font-size:20px; "></i>Not Selected</strong></p>
      @endif
      @if($applicant->is_selected=="yes")
        <p class="mycustomalert" style="background: #2A3F54; "><strong>Status: <i class="fa fa-check" style="font-size:20px; "></i> Selected </strong></p>
      @endif
   
     
        
       
    </div>
    <div class="col-md-3 col-sm-2 col-xs-2 customcontentpostion">
   {{ $applicants->links() }}
  <p>Showing  <strong> {{ $applicants->count() }} </strong> of  <strong> {{ $applicants->total() }}  </strong></p>
  
  



    </div>
  </div>
 
  <div class="row">
    
    <div class="mainDetails">

      <div class="clear"></div>
      <br>
       <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-12 customcontentpostion">
         
        <img src="{{ asset('assets/images') }}/{{ $applicant->image}}" alt="Alan Smith"  height="90" width="90" style="border: 1px solid white;border-radius: 4px;" />
    
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
                @isset ($applicant->applicantcourse)
                 @foreach($applicant->applicantcourse as $course)
                <tr>
                  <th scope="row">{{ $course->id }}</th>
                  <td>{{ $course->name }}</td>
                  <td>{{ $course->year }}</td>
                  <td>{{ $course->institute }}</td>
                </tr>
                @endforeach  
                @endisset
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
                @isset ($applicant->applicantqualifiction)
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
                @endisset
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
                @isset ($applicant->applicantexperience)
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
                @endisset
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
       @endforeach
  </div>
  @endsection
  @section("footer")
  @parent
  <style type="text/css">
    .buttonpostioncustom{
z-index: 20;
right: -4px;
position: fixed;
top: 60px;

}
   .buttonpostioncustom2{
z-index: 20;
right: -4px;
position: fixed;
top: 96px;

}
  .customcontentpostion{
  text-align: center;
  }
  .customlabelcolor{
  color: #5BC0DE;
  }
  .customparagraph{
 font-size: 14px;
 color: white;
  }
  .custominline{
  /*display: flex;*/
  color: brown;
  }
  .pagination{
    margin: unset!important;
  }
  .mycustomalert{
    color: white;
    border-radius: 3px;
    padding: 10px;
  }
  .mainDetails {
    padding:0px !important; 
    
    background: #2A3F54 !important;
  }
  </style>
  <script>

  $(document).ready(function(){

   
$("body").on("click","#datefrom",function(){
 $('#datefrom').datetimepicker({
      format: 'YYYY-MM-DD'
      
       });
});

$("body").on("click","#dateto",function(){
$('#dateto').datetimepicker({
      format: 'YYYY-MM-DD'
      
       });
});


  $('.customdatepicker').datetimepicker({
  format: 'DD/MM/YYYY'
  });
  });
  
  </script>
  @endsection