
@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.footer2')
@extends('includes.sidebar2')
{{-- page titles --}}
@section('title', 'Contract')
@section('pagetitle', 'Contract')
@section('content')

   <link href="{{ asset('css/cv.css') }}" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Rokkitt:400,700|Lato:400,300' rel='stylesheet' type='text/css'>
<div class="row">
  <div class="page-title">
    <div class="title_left">
      <h4> Print Contract
      </h4>
    </div>
  </div> 
</div>
@isset ($viewcontract->getApplicents)

<div id="top">
<div id="cv" class="instaFade" style="background: white;">
  <div class="mainDetails">
    <div  class="quickFade" style="display: flex;">
      <img src="{{ asset('assets/images') }}/157010307151117799.png" alt="Alan Smith" width="70" height="70" />
      <h1 class="quickFade delayTwo">Sb Security</h1>
    </div>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Opposite PSO Petrol Pump, Soan Garden, Near PWD
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;051-5738082
</p>
    <div class="clear"></div>
  </div>
  <div id="mainArea" class="quickFade delayFive">
<p style="padding-left: 30px; text-align: right;">{{ date("F j, Y") }}&nbsp;</p>
<p style="padding-left: 30px; text-align: left;">{{ $viewcontract->getApplicents->name }}</p>
<p style="padding-left: 30px; text-align: left;">{{ $viewcontract->getApplicents->address }}</p>
<p style="padding-left: 30px; text-align: left;">{{ $viewcontract->getApplicents->mobile }}</p>
<p style="padding-left: 30px; text-align: left;">&nbsp;</p>
<p style="padding-left: 30px; text-align: left;">Dear {{ $viewcontract->getApplicents->name }},</p>
<p style="padding-left: 30px; text-align: left;">&nbsp;</p>
<p style="padding-left: 30px; text-align: left;">I am pleased to extend a job offer for the position of &ldquo;
  @isset ($viewcontract->getdesignation)
  {{$viewcontract->getdesignation->designation}}
  @endisset
  &rdquo; at SBSS to commence on {{ $viewcontract->reportingdate }} . You will be in a full time, at-will employment reporting to CEO SBSS. Your contract will expire after {{ $viewcontract->contractduration }}.</p>
<p style="padding-left: 30px; text-align: left;">&nbsp;</p>
<p style="padding-left: 30px; text-align: left;">{{ $viewcontract->jobresponsibility}}.A basic cash compensation will be given at Rs.{{ $viewcontract->salery }} per month payable in relation to the Company&rsquo;s payroll schedule.</p>
<p style="padding-left: 30px; text-align: left;">&nbsp;</p>
<p style="padding-left: 30px; text-align: left;">Please send a signed duplicate copy of this offer letter (along with CNIC copy) should you accept this job offer to the address found below.</p>

<p style="padding-left: 30px; text-align: left;">&nbsp;</p>
<p style="padding-left: 30px; text-align: left;">For any queries or additional questions, feel free to email or call us with the phone number and other contact details found below.</p>
<p style="padding-left: 30px; text-align: left;">&nbsp;</p>
<div id="hideprintmode">
<p style="padding-left: 30px; text-align: left;">Join date:&nbsp; {{ $viewcontract->startdate }}</p>
<p style="padding-left: 30px; text-align: left;">End Date:&nbsp; {{ $viewcontract->enddate }}</p>
<p style="padding-left: 30px; text-align: left; color: red;">Status Is Active:&nbsp;{{ $viewcontract->is_active }}</p>
<p style="padding-left: 30px; text-align: left; color: red;">Status Joining:&nbsp;{{ $viewcontract->is_join }}</p>
</div>
<p style="padding-left: 30px; text-align: left;">&nbsp;</p>
<p style="padding-left: 30px; text-align: left;">Sincerely yours,</p>
<p style="padding-left: 30px; text-align: left;">&nbsp;</p>
<p style="padding-left: 30px; text-align: left;">CEO, SBSS</p>
<p style="padding-left: 30px; text-align: left;">Opposite PSO Petrol Pump, Soan Garden, Near PWD</p>
<p style="padding-left: 30px; text-align: left;">051-5738082</p>
<p style="padding-left: 30px; text-align: left;">&nbsp;</p>
<p style="padding-left: 30px; text-align: left;">______________________</p>
<p style="padding-left: 30px; text-align: left;">{{ $viewcontract->getApplicents->name }}</p>
<p style="padding-left: 30px; text-align: left;">{{ $viewcontract->getApplicents->address }}</p>
<p style="padding-left: 30px; text-align: left;">{{ $viewcontract->getApplicents->mobile }}</p>
<p style="padding-left: 30px; text-align: left;">&nbsp;</p>
  </div>
</div>
 

</div>
@endisset


<button class="btn btn-info btn-lg buttonpostioncustom"  id="headshot"  onclick="printDiv('top')"><i class="fa fa-print"></i> Print</button>


@endsection
@section("footer")
@parent
<style type="text/css">
  p{

    margin:0px!important;
  }
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
  

  function printDiv(divName) {
    $('#hideprintmode').hide();
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
@endsection
