@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Exam Schedule')
@section('content')
<div class="panel-body">
	@include('includes.alerts')
    <div class="row">
        <div class="col-lg-12">
            <h3>Add Exam Schedule</h3>
            <form role="form" method="post" action="{{url('addExamSchedule')}}">
             {{ csrf_field() }}

                <div class="col-md-4">
                     <div class="form-group">
                    <label>Exam Slot<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="examSlot_id" id="" required="required">
                        <option value="">Select One</option>
                        @foreach($examSlots as $examSlot)
                        <option value="{{$examSlot->id}}"> {{ $examSlot->classRooms->cRoom_name }} / {{ $examSlot->days->day_name }} / {{ $examSlot->examTimes->examTimeName }} / {{ $examSlot->slot_date }}</option>
                        @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Batch<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="batch_id" required="required">
                        <option value="">Select One</option>
                        @foreach($batches as $batch)
                        <option value="{{$batch->id}}">{{$batch->batchName}} / {{$batch->classes->c_name}} / {{$batch->sections->sec_name}}</option>
                        @endforeach
                    </select>
                    </div>
                    
                    <div class="form-group">
                    <label>Subject<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="subject_id" required="required">
                        <option value="">Select One</option>
                        @foreach($subjects as $subject)
                        <option value="{{$subject->id}}">{{$subject->sub_name}}</option>
                        @endforeach
                    </select>
                    </div>
                    
                   <div class="form-group">
                    <label>Exam Term<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="examTerm_id" required="required">
                        <option value="">Select One</option>
                        @foreach($examTerms as $examTerm)
                        <option value="{{$examTerm->id}}">{{$examTerm->examTermName}}</option>
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