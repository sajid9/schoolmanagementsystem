@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Edit Exam Timings')
@section('content')
<div class="panel-body">
	@include('includes.alerts')
    <div class="row">
        <div class="col-lg-12">
            <h3>Edit Exam Time</h3>
            <form role="form" method="POST" action="{{url('updateExamTime')}}">
                <div class="col-md-4">
            
                    <div class="form-group">
                        <label>Exam Timing<span style="color: red" class="required">*</span></label>
                        <input type="hidden" name="id" value="{{$examTime->id}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input name="examTimeName" class="form-control" value="{{$examTime->examTimeName}}" required="required" placeholder="Enter Timings">
                        
                    </div>
                    
                    <button type="submit" class="btn btn-default">Update</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>
            </form>
        </div>
     </div>
</div>
@endsection