@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Edit Exam Schedule')
@section('content')
<div class="panel-body">
	@include('includes.alerts')
    <div class="row">
        <div class="col-lg-12">
            <h3>Edit Exam Schedule</h3>
            <form class="form-group row" role="form" method="post" action="{{url('updateExamSchedule')}}"  enctype="multipart/form-data">

                <div class="col-md-4"> 

                    <div class="form-group">
                    <label>Exam Slot<span style="color: red" class="required">*</span></label>
                    <input type="hidden" name="id" value="{{$examSchedules->id}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <select custom class="form-control" name="examSlot_id" id="" required="required">
                        <option value="">Select One</option>
                        @foreach($examSlots as $examSlot)
                        <option {{ ($examSchedules->examSlot_id == $examSlot->id) ? 'selected' : '' }} value="{{$examSlot->id}}"> {{ $examSlot->classRooms->cRoom_name }} / {{ $examSlot->days->day_name }} / {{ $examSlot->examTimes->examTimeName }} / {{ $examSlot->slot_date }}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                    <label>Class<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="class_id" required="required">
                        <option value="">Select One</option>
                        @foreach($classes as $class)
                        <option {{ ($examSchedules->class_id == $class->id) ?'selected':'' }} value="{{$class->id}}">{{$class->c_name}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                    <label>Subject<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="subject_id" required="required">
                        <option value="">Select One</option>
                        @foreach($subjects as $subject)
                        <option {{ ($examSchedules->subject_id == $subject->id) ? 'selected' : '' }} value="{{$subject->id}}">{{$subject->sub_name}}</option>
                        @endforeach
                    </select>
                    </div>

                   <div class="form-group">
                    <label>Exam Term<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="examTerm_id" required="required">
                        <option value="">Select One</option>
                        @foreach($examTerms as $examTerm)
                        <option {{ ($examSchedules->examTerm_id == $examTerm->id) ? 'selected':'' }} value="{{$examTerm->id}}">{{$examTerm->examTermName}}</option>
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