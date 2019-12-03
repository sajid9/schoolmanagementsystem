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

                <div class="col-md-4"> 
                    <div class="form-group">
                    <label>Name<span style="color: red" class="required">*</span></label>
                    <input type="hidden" name="id" value="{{$batches->id}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input name="batchName" class="form-control" value="{{ $batches->batchName }}" required="required" placeholder="Enter Batch Name">
                    </div>

                    <div class="form-group">
                    <label>Class<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="class_id" required="required">
                        <option value="">Select One</option>
                        @foreach($classes as $class)
                        <option {{($batches->class_id == $class->id) ? 'selected' : ''}} value="{{$class->id}}">{{$class->c_name}}</option>
                        @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Section<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="section_id" required="required">
                        <option value="">Select One</option>
                        @foreach($sections as $section)
                        <option {{ ($batches->section_id == $section->id) ? 'selected' : '' }} value="{{$section->id}}">{{$section->sec_name}}</option>
                        @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Year<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="year_id" required="required">
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
<script>
    $(document).ready(function(){
      $('#status').bootstrapToogle({
        on: 'active',
        off: 'inactive'
      });  
    });
</script>

@endsection