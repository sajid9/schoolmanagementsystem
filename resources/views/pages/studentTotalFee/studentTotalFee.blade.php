@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Student Fee')
@section('content')
<div class="panel-body">
	@include('includes.alerts')
    <div class="row">
        <div class="col-lg-12">
            <h3>Add Student Total Fee</h3>
            <form role="form" method="post" action="{{url('addStudentTotalFee')}}">
             {{ csrf_field() }}

                <div class="col-md-4">
                    <div class="form-group">
                    <label>Student Name<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="enrollment_id" id="" required="required">
                        <option value="">Select One</option>
                        @foreach($enrollments as $enrollment)
                        <option value="{{$enrollment->id}}"> {{ $enrollment->admissions->registrations->firstName }} F.Name {{ $enrollment->admissions->registrations->gfirstName }} </option>
                        @endforeach
                    </select>
                    </div>

                   
                   <div class="form-group">
                    <label>Month<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="month_id" required="required">
                        <option value="">Select One</option>
                        @foreach($months as $month)
                        <option value="{{$month->id}}">{{$month->month_name}}</option>
                        @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Total Amount<span style="color: red" class="required">*</span></label>
                    <input name="totalAmount" class="form-control"  required="required" placeholder="Enter Amount">
                    </div>

                    <button type="submit" class="btn btn-default">Submit Button</button>
                    <button type="reset" class="btn btn-default">Reset Button</button>
                </div>
            </form>
        </div>
     </div>
</div>

@endsection