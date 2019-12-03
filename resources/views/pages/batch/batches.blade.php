@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Batches')
@section('content')
<div class="panel-body">
	@include('includes.alerts')
    <div class="row">
        <div class="col-lg-12">
            <h3>Add Batch</h3>
            <form role="form" method="post" action="{{url('addBatches')}}">
             {{ csrf_field() }}

                <div class="col-md-4"> 
                    <div class="form-group">
                    <label>Name<span style="color: red" class="required">*</span></label>
                    <input name="batchName" class="form-control" required="required" placeholder="Enter Batch Name">
                    </div>
                    <div class="form-group">
                    <label>Class<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="class_id" required="required">
                        <option value="">Select One</option>
                        @foreach($classes as $class)
                        <option value="{{$class->id}}">{{$class->c_name}}</option>
                        @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Section<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="section_id" required="required">
                        <option value="">Select One</option>
                        @foreach($sections as $section)
                        <option value="{{$section->id}}">{{$section->sec_name}}</option>
                        @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Year<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="year_id" required="required">
                        <option value="">Select One</option>
                        @foreach($years as $year)
                        <option value="{{$year->id}}">{{$year->yearName}}</option>
                        @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Employ Id</label>
                    <select custom class="form-control" name="employe_id">
                        <option value="">Select One</option>
                        @foreach($employees as $employe)
                        <option value="{{$employe->id}}">{{$employe->emp_name}}</option>
                        @endforeach
                    </select>
                    </div>
                
                    <button type="submit" class="btn btn-default">Submit Button</button>
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