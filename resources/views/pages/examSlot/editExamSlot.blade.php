@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Edit Exam Slot')
@section('content')
<div class="panel-body">
	@include('includes.alerts')
    <div class="row">
        <div class="col-lg-12">
            <h3>Edit Exam Slot</h3>
            <form class="form-group row" role="form" method="post" action="{{url('updateExamSlot')}}"  enctype="multipart/form-data">

                <div class="col-md-4"> 
                    
                    <div class="form-group">
                    <label>Class Room<span style="color: red" class="required">*</span></label>
                    <input type="hidden" name="id" value="{{$examSlots->id}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <select custom class="form-control" name="classRoom_id" required="required">
                        <option value="">Select One</option>
                        @foreach($classRooms as $classRoom)
                        <option {{ ($examSlots->classRoom_id == $classRoom->id) ? 'selected' : '' }} value="{{$classRoom->id}}">{{$classRoom->cRoom_name}}</option>
                        @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Day<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="day_id" required="required">
                        <option value="">Select One</option>
                        @foreach($days as $day)
                        <option {{ ($examSlots->day_id == $day->id) ? 'selected' : '' }} value="{{$day->id}}">{{$day->day_name}}</option>
                        @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Exam Time<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="examTime_id" required="required">
                        <option value="">Select One</option>
                        @foreach($examTimes as $examTime)
                        <option {{($examSlots->examTime_id == $examTime->id) ? 'selected' : ''}} value="{{$examTime->id}}">{{$examTime->examTimeName}}</option>
                        @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Date<span style="color: red" class="required">*</span></label>
                    <input type="Date" name="slot_date" value="{{ $examSlots->slot_date }}" class="form-control" required="required">
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