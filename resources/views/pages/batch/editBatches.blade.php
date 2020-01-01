@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Edit Batch')
@section('content')
<div class="panel-body">
	@include('includes.alerts')
    <div class="row">
        <div class="col-lg-12">
            <h3>Edit Batch</h3>
            <form class="form-group row" role="form" method="post" action="{{url('updateBatches')}}"  enctype="multipart/form-data">
     <input type="hidden" name="id" value="{{$batches->id}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="col-md-4"> 
                    <div class="form-group" id="classNamesetval">
                    <label>Name<span style="color: red" class="required">*</span></label>
                   
                    <input name="batchName" class="form-control" value="{{ $batches->batchName }}" required="required" placeholder="Enter Batch Name" id="batchName" readonly>
                    </div>

                    <div class="form-group">
                    <label>Class<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="class_id" id="class_id" required="required">
                        <option value="">Select One</option>
                        @foreach($classes as $class)
                        <option {{($batches->class_id == $class->id) ? 'selected' : ''}} value="{{$class->id}}">{{$class->c_name}}</option>
                        @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Section<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="section_id" id="section_id" required="required">
                        <option value="">Select One</option>
                        @foreach($sections as $section)
                        <option {{ ($batches->section_id == $section->id) ? 'selected' : '' }} value="{{$section->id}}">{{$section->sec_name}}</option>
                        @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Year<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="year_id" id="year_id" required="required">
                        <option value="">Select One</option>
                        @foreach($years as $year)
                        <option {{ ($batches->year_id == $year->id) ? 'selected' : '' }} value="{{$year->id}}">{{$year->yearName}}</option>
                        @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Employ Id</label>
                    <select custom class="form-control" name="employe_id">
                        <option value="">Select One</option>
                        @foreach($employees as $employe)
                        <option {{ ($batches->employe_id == $employe->id) ? 'selected' : '' }} value="{{$employe->id}}">{{$employe->emp_name}}</option>
                        @endforeach
                    </select>
                    </div>
                
                    <button type="submit" class="btn btn-default">Update</button>
                    <button type="reset" class="btn btn-default">Reset Button</button>
                </div>
            </form>
        </div>
     </div>
</div>

@endsection

@section('footer')
@parent

<script>
   $(document).ready(function(){
    var className= $( "#class_id option:selected" ).text();
     var section=$( "#section_id option:selected" ).text();
    var year=$("#year_id option:selected" ).text();
   
  $("#class_id").change(function(){
   className=$( "#class_id option:selected" ).text();

  temp1="<label>Name<span style='color: red' class='required'>*</span></label><input name='batchName' class='form-control' value='"+className+section+year+"' required='required' placeholder='Enter Batch Name' id='batchName' readonly>";

  
  $('#classNamesetval').html(temp1);


});

  $("#section_id").change(function(){
   section=$( "#section_id option:selected" ).text();

  temp2=" <label>Name<span style='color: red' class='required'>*</span></label><input name='batchName' class='form-control' value='"+className+section+year+"' required='required' placeholder='Enter Batch Name' id='batchName' readonly>";
  $('#classNamesetval').html(temp2);
});

 $("#year_id").change(function(){
  year= $( "#year_id option:selected" ).text();

  temp3=" <label>Name<span style='color: red' class='required'>*</span></label><input name='batchName' class='form-control' value='"+className+section+year+"' required='required' placeholder='Enter Batch Name' id='batchName' readonly>";
$('#classNamesetval').html(temp3);
});
});
    
 


</script>

@endsection