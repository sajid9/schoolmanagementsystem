@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Results')
@section('content')
<div class="panel-body">
	@include('includes.alerts')
    <div class="row">
        <div class="col-lg-12">
            <h3>Add Results</h3>
            <form role="form" method="post" action="{{url('addResults')}}">
             {{ csrf_field() }}

                <div class="col-md-4">
                   <div class="form-group">
                    <label>Admission Id<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="admission_id" id="regStd" required="required">
                        <option value="">Select One</option>
                        @foreach($admissions as $admission)
                        <option value="{{$admission->id}}">{{ $admission->registrations->firstName }} / {{ $admission->gfirstName }} / {{ $admission->rollnumber }}</option>

                        @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Exam Schedule Id<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="examSchedule_id" id="" required="required">
                        <option value="">Select One</option>
                        @foreach($examSchedules as $examSchedule)
                        <option value="{{$examSchedule->id}}">{{ $examSchedule->batches->classes->c_name }} / {{ $examSchedule->subjects->sub_name }} / {{ $examSchedule->examTerms->examTermName }}</option>

                        @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Total Marks<span style="color: red" class="required">*</span></label>
                    <input name="total_marks" class="form-control" required="required" placeholder="Enter Total Marks">
                    </div>

                    <div class="form-group">
                    <label>Obtained Marks<span style="color: red" class="required">*</span></label>
                    <input name="obtain_marks" class="form-control" required="required" placeholder="Enter Obtained Marks">
                    </div>
                    
                    <div class="form-group">
                    <label>Passing Marks<span style="color: red" class="required">*</span></label>
                    <input name="pass_marks" class="form-control" required="required" placeholder="Enter Passing Marks">
                    </div>

                    <div class="form-group">
                    <label>Grade<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="grade_id" required="required">
                        <option value="">Select One</option>
                        @foreach($grades as $grade)
                        <option value="{{$grade->id}}">{{$grade->grade_name}}</option>
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

@endsection