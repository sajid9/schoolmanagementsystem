{{-- extend  --}}
@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.footer2')
@extends('includes.sidebar2')
{{-- page titles --}}
@section('title', 'Applicants joing')
@section('pagetitle', 'Applicants joing')
@section('content')
<div class="row">
  <div class="page-title">
    <div class="title_left">
      <h3> Contracts And Joing </h3>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_content">
        
         <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Sr</th>
              <th>Name</th>
              <th>Image</th>
              <th>Cnic</th>
              <th>City</th>
               <th>No of year</th>
                <th>Salery</th>
              <th>Status</th>
              <th>Options</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($securityclearedandcontractexit as $securityclearedapplicant)
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
              
                @if($securityclearedapplicant->is_join=='yes')
                <span class="label label-success">Joined</span>
                @else
                <span class="label label-danger">Not Joined yet</span>
                @endif
              
              </td>
              <td>
               
                  <a href="{{ route('viewcontract',['id'=>$securityclearedapplicant->id]) }}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="View Contract"><i class="fa fa fa-eye"></i></a>  
              
               
                
                <a  href=""class="btn btn-warning btn-xs"  data-toggle="modal" data-target="#updatecontract{{$securityclearedapplicant->id }}">Finally Join </a>
                
              </td>
            </tr>
            
            <!-- Update Contract Modal -->
            <div class="modal fade" id="updatecontract{{ $securityclearedapplicant->id }}" role="dialog">
              <div class="modal-dialog modal-md">
                
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Update Joing</h4>
                  </div>
                  <div class="modal-body">
                    <form action="{{ route('updatecontractjoing') }}" method="post">
                      <input type="hidden" name="_token" value="{{csrf_token()}}">
                      <input type="hidden" name="applicant_id" value="{{ $securityclearedapplicant->getApplicents->id }}">
                     
                      <input type="hidden" name="contract_id" value="{{ $securityclearedapplicant->id }}">
                      
                      <label class="control-label">Join Date</label>
                      <div class="input-group date customdatepicker" id="event_date">
                        <input type="text" class="form-control" name="startdate" required="" value="{{ $securityclearedapplicant->startdate }}">
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                        
                      </div>
                      <label class="control-label">End Date</label>
                      <div class="input-group date customdatepicker" id="event_date">
                        <input type="text" class="form-control" name="enddate" required="" value="{{ $securityclearedapplicant->enddate }}">
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                        
                      </div>
                      <select class="form-control" name="is_active" required="">
                        <option value="yes"{{ ($securityclearedapplicant->is_join =='yes') ? "selected" : "" }}>Active</option>
                        <br>
                        <option value="no"{{ ($securityclearedapplicant->is_join =='no') ? "selected" : "" }}>Deactive</option>
                      </select>
                    
                    
                    </div>
                    <div class="modal-footer">
                     
                      <input type="submit"  class="btn btn-warning" value="update">
                    
                      <a href="{{ route('contracts') }}" class="btn btn-info"> Make Contract</a>
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
</style>
<script>
function datetimepickercustom(){
$('.customdatepicker').datetimepicker({ 
format: 'DD/MM/YYYY'
});
}
datetimepickercustom();
</script>
@endsection