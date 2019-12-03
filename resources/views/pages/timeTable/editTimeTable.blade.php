@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Edit Time Table')
@section('content')
<div class="panel-body">
	@include('includes.alerts')
    <div class="row">
        <div class="col-lg-12">
            <h3>Edit Time Table</h3>
            <form class="form-group row" role="form" method="post" action="{{url('updateTimeTable')}}"  enctype="multipart/form-data">

                <div class="col-md-6"> 

                    <div class="form-group">
                    <label>Period<span style="color: red" class="required">*</span></label>
                    <input type="hidden" name="id" value="{{$timeTables->id}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <select custom class="form-control" name="period_id" required="required">
                        <option value="">Select One</option>
                        @foreach($periods as $period)
                        <option {{($timeTables->period_id == $period->id) ? 'selected' : ''}} value="{{$period->id}}">{{$period->periodName}} / {{ $period->times->time_name }} / {{ $period->days->day_name }} / {{ $period->classRooms->cRoom_name }}</option>
                        @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Subject<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="subject_id" required="required">
                        <option value="">Select One</option>
                        @foreach($subjects as $subject)
                        <option {{ ($timeTables->subject_id == $subject->id) ? 'selected' : '' }} value="{{$subject->id}}">{{$subject->sub_name}}</option>
                        @endforeach
                    </select>
                    </div>

                   <div class="form-group">
                    <label>Batch Id<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="batch_id" id="" required="required">
                        <option value="">Select One</option>
                        @foreach($batches as $batch)
                        <option value="{{$batch->id}}" {{ ($batch->id == $timeTables->batch_id) ? 'selected':'' }}>{{$batch->batchName}} / {{ $batch->classes->c_name }} / {{ $batch->sections->sec_name }} / {{ $batch->years->yearName }}</option>
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