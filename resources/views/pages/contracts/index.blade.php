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
    <h3> All Security Cleared/Contracts </h3>
  </div>
</div>
</div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        @if(Session::has('info'))
              <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>{{ Session::get('info') }} </strong>
                  </div> 
                 @endif

                 @if(Session::has('status'))
              <div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>{{ Session::get('status') }} </strong>
                  </div> 
                 @endif
     
     
      <div class="x_title">
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
       <a  href=""class="btn btn-success btn-xs"  data-toggle="modal" data-target="#contract">Make Epmolye Contract </a>
      @include('pages.contracts.sections.makecontractmodal')

      <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Sr</th>
              <th>Name</th>
              <th>Image</th>
              <th>Cnic</th>
              <th>City</th>
               <th>No Of Year</th>
                 <th>Salery</th>
              <th>Status</th>
              <th>Options</th>
            </tr>
          </thead>
          <tbody>

          @foreach ($securityclearedapplicants as $securityclearedapplicant)
         
           @isset ($securityclearedapplicant->getApplicents)
               <tr>
            <td>{{ $securityclearedapplicant->id }}</td>
            <td>{{ $securityclearedapplicant->getApplicents->name }}</td>
            <td>
              <img src="{{ asset('assets/images') }}/{{ $securityclearedapplicant->getApplicents->image }}" alt="Smiley face" height="50" width="50" >
            </td>
            <td>{{ $securityclearedapplicant->getApplicents->cnic }}</td>
            <td>{{ $securityclearedapplicant->getApplicents->city }}</td>
             <td>{{ $securityclearedapplicant->contractduration }}</td>
              <td>{{ $securityclearedapplicant->salery }}</td>
            <td>
              
              @if ($securityclearedapplicant->is_active=='yes')
              <span class="label label-success">Active</span>
              @else
              <span class="label label-danger">Deactive</span>
              @endif   
           
         

            </td>
            <td>
          <a href="{{ route('viewcontract',['id'=>$securityclearedapplicant->id]) }}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Print Contract"><i class="fa fa fa-print"></i></a>

               <a  href=""class="btn btn-warning btn-xs"  data-toggle="modal" data-target="#updatecontract{{$securityclearedapplicant->id }}">Update </a>
                
            </td>  
          </tr> 

     
           <!-- Update Contract Modal -->
     <div class="modal fade" id="updatecontract{{ $securityclearedapplicant->id }}" role="dialog">
    <div class="modal-dialog modal-md">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Empolye Contract</h4>
        </div>
        <div class="modal-body">
           <div class="alert alert-danger alert-dismissible fade in statusshowhide" role="alert" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>This Applicant Contract Already Exit and Active select Deactive  </strong>
                  </div> 
          <form action="{{ route('updatecontract') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token()}}">
            <input type="hidden" name="applicant_id" value="{{ $securityclearedapplicant->getApplicents->id }}">
            
          
           <input type="hidden" name="contract_id" value="{{ $securityclearedapplicant->id }}">
             <select class="form-control" name="designation_id" required="">
              <option value="">Select Designation</option>
              @foreach ($designations as $designation)
              <option value="{{ $designation->id }}" {{ ($designation->id == $securityclearedapplicant->designation_id) ? "selected" : "" }}>{{ $designation->designation  }}</option>
              @endforeach
            </select>
            <label class="control-label">Reporting Date</label>
           <div class="input-group date customdatepicker" id="event_date">
              <input type="text" class="form-control" name="reportingdate" required="" value="{{ $securityclearedapplicant->reportingdate }}">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
              
            </div>
          
             <label class="control-label">Contract Duration</label>
            <input type="text" name="contractduration" class="form-control" required="" value="{{ $securityclearedapplicant->contractduration }}">
            <label class="control-label"></label>

           <label class="control-label">Salery</label>
            <input type="number" name="salery" class="form-control" required="" value="{{ $securityclearedapplicant->salery }}">
            <label class="control-label"></label>

             <label class="control-label">Is Active</label>
           <select class="form-control is_active" name="is_active" > 
            <option value="yes" {{ ($securityclearedapplicant->is_active=='yes')?'selected':'' }}> Active</option>
              <option value="no" {{ ($securityclearedapplicant->is_active=='no')?'selected':'' }}> Deactive</option>
           </select>

            <label class="control-label">Job Responsibilty</label>
            <textarea rows="5" cols="50" id="description" name="jobresponsibility" class="form-control col-md-7 col-xs-12" required="">{{ $securityclearedapplicant->jobresponsibility }}</textarea>
           
        </div> 
        <div class="modal-footer">
            
           <input type="submit"  class="btn btn-warning hideifexist" value="update">
         
          
        
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      </form>
    </div>
  </div>
   <!-- end Make Contract Modal -->
   @endisset
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
<script>
$(".is_active").change(function(){

var contract_id=$(this).siblings("input[name=contract_id]").val();  
var applicant_id=$(this).siblings("input[name=applicant_id]").val();

var status=$(this).val();
$.ajax({ 
url:"{{ url('applicant/checkupdatecontract') }}",
type:"POST",
dataType:"json",
data:{contract_id:contract_id,applicant_id:applicant_id,status:status,_token:"{{ csrf_token() }}"},
success:function(res)
{

if(res.status=='yes'){

$('.hideifexist').hide();
$('.statusshowhide').show();

}else{

$('.statusshowhide').hide();
$('.hideifexist').show();  
}


}
})

});





$('#selecttoemp').select2({
ajax: {
url: '{{url("applicant/getsecuritycleared_ap")}}',
dataType: 'json',
processResults: function (data) {
return {
"results": data
};
}
}
});


function datetimepickercustom(){
$('.customdatepicker').datetimepicker({
format: 'DD/MM/YYYY'
});
}
datetimepickercustom();
</script>
@endsection