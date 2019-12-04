@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Edit Grades')
@section('content')
<div class="panel-body">
	@include('includes.alerts')
    <div class="row">
        <div class="col-lg-12">
            <h3>Edit Grade</h3>
            <form role="form" method="POST" action="{{url('updateGrades')}}">
                <div class="col-md-4">
            
                    <div class="form-group">
                    <label>Min Marks<span style="color: red" class="required">*</span></label>
                    <input type="hidden" name="id" value="{{$grade->id}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input name="min_marks" class="form-control" value="{{$grade->min_marks}}" required="required" placeholder="Enter Minimum Marks">
                    </div>
                    <div class="form-group">
                    <label>Max Marks<span style="color: red" class="required">*</span></label>
                    <input name="max_marks" class="form-control" value="{{$grade->max_marks}}" required="required" placeholder="Enter Maximum Marks">
                    </div>
                    <div class="form-group">
                    <label>Grade<span style="color: red" class="required">*</span></label>
                    <input name="grade_name" class="form-control" value="{{$grade->grade_name}}" required="required" placeholder="Enter Grade">
                    </div>
                    
                    <button type="submit" class="btn btn-default">Update</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>
            </form>
        </div>
     </div>
</div>
@endsection