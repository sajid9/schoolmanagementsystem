@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Edit Period')
@section('content')
<div class="panel-body">
	@include('includes.alerts')
    <div class="row">
        <div class="col-lg-12">
            <h3>Edit Period</h3>
            <form class="form-group row" role="form" method="post" action="{{url('updatePeriods')}}"  enctype="multipart/form-data">

                <div class="col-md-4"> 
                    <div class="form-group">
                    <label>Name<span style="color: red" class="required">*</span></label>
                    <input type="hidden" name="id" value="{{$periods->id}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input name="periodName" class="form-control" value="{{ $periods->periodName }}" required="required" placeholder="Enter Period Name">
                    </div>

                    <div class="form-group">
                    <label>Time<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="time_id" required="required">
                        <option value="">Select One</option>
                        @foreach($times as $time)
                        <option {{($periods->time_id == $time->id) ? 'selected' : ''}} value="{{$time->id}}">{{$time->time_name}}</option>
                        @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Day<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="day_id" required="required">
                        <option value="">Select One</option>
                        @foreach($days as $day)
                        <option {{ ($periods->day_id == $day->id) ? 'selected' : '' }} value="{{$day->id}}">{{$day->day_name}}</option>
                        @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Class Room<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="classRoom_id" required="required">
                        <option value="">Select One</option>
                        @foreach($classRooms as $classRoom)
                        <option {{ ($periods->classRoom_id == $classRoom->id) ? 'selected' : '' }} value="{{$classRoom->id}}">{{$classRoom->cRoom_name}}</option>
                        @endforeach
                    </select>
                    </div>

                   
                    <button type="submit" class="btn btn-default">Update Button</button>
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