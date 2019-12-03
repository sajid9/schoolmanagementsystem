@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Exam Slot')
@section('content')
<div class="panel-body">
	@include('includes.alerts')
    <div class="row">
        <div class="col-lg-12">
            <h3>Add Exam Slot</h3>
            <form role="form" method="post" action="{{url('addExamSlot')}}">
             {{ csrf_field() }}

                <div class="col-md-4">

                    <div class="form-group">
                    <label>Class Room<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="classRoom_id" required="required">
                        <option value="">Select One</option>
                        @foreach($classRooms as $classRoom)
                        <option value="{{$classRoom->id}}">{{$classRoom->cRoom_name}}</option>
                        @endforeach
                    </select>
                    </div> 

                    <div class="form-group">
                    <label>Day<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="day_id" required="required">
                        <option value="">Select One</option>
                        @foreach($days as $day)
                        <option value="{{$day->id}}">{{$day->day_name}}</option>
                        @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Exam Time<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="examTime_id" required="required">
                        <option value="">Select One</option>
                        @foreach($examTimes as $examTime)
                        <option value="{{$examTime->id}}">{{$examTime->examTimeName}}</option>
                        @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Date<span style="color: red" class="required">*</span></label>
                    <input type="Date" name="slot_date" value="" class="form-control" required="required">
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