@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Edit Student Fee')
@section('content')
<div class="panel-body">
	@include('includes.alerts')
    <div class="row">
        <div class="col-lg-12">
            <h3>Edit Student Total Fee</h3>
            <form class="form-group row" role="form" method="post" action="{{url('updateStudentTotalFee')}}"  enctype="multipart/form-data">

                <div class="col-md-4"> 

                    
                    
                    <div class="form-group">
                    <label>Student Name<span style="color: red" class="required">*</span></label>
                    <input type="hidden" name="id" value="{{$totalFees->id}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <select custom class="form-control" name="enrollment_id" id="" required="required">
                        <option value="">Select One</option>
                        @foreach($enrollments as $enrollment)
                        <option {{ ($totalFees->enrollment_id == $enrollment->id) ? 'selected' : '' }} value="{{$enrollment->id}}"> {{ $enrollment->admissions->registrations->firstName }} F.Name {{ $enrollment->admissions->registrations->gfirstName }} </option>
                        @endforeach
                    </select>
                    </div>

                   <div class="form-group">
                    <label>Month<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="month_id" required="required">
                        <option value="">Select One</option>
                        @foreach($months as $month)
                        <option {{ ($totalFees->month_id == $month->id) ? 'selected' : '' }} value="{{$month->id}}">{{$month->month_name}}</option>
                        @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Amount<span style="color: red" class="required">*</span></label>
                    <input name="totalAmount" class="form-control" value="{{$totalFees->totalAmount}}" required="required" placeholder="Enter Amount">
                    </div>

                    <button type="submit" class="btn btn-default">Update Button</button>
                    <button type="reset" class="btn btn-default">Reset Button</button>
                </div>
            </form>
        </div>
     </div>
</div>


@endsection