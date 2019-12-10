@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Fee Charges')
@section('content')
<div class="panel-body">
	@include('includes.alerts')
    <div class="row">
        <div class="col-lg-12">
            <h3>Add Fee Charges</h3>
            <form role="form" method="post" action="{{url('addFeeCharges')}}">
             {{ csrf_field() }}

                <div class="col-md-4">
                    <div class="form-group">
                    <label>Charges Type <span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="chargType_id" id="" required="required">
                        <option value="">Select One</option>
                        @foreach($chargTypes as $chargType)
                        <option value="{{$chargType->id}}"> {{ $chargType->feeChargType }} </option>
                        @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Charges Category <span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="chargCategory_id" required="required">
                        <option value="">Select One</option>
                        @foreach($chargCategories as $chargCategory)
                        <option value="{{$chargCategory->id}}">{{$chargCategory->feeChargCategory}}</option>
                        @endforeach
                    </select>
                    </div>
                    
                    <div class="form-group">
                    <label>Charges Head <span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="chargHead_id" required="required">
                        <option value="">Select One</option>
                        @foreach($chargHeads as $chargHead)
                        <option value="{{$chargHead->id}}">{{$chargHead->feeChargHead}}</option>
                        @endforeach
                    </select>
                    </div>
                    
                   <div class="form-group">
                    <label>Student Class<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="class_id" required="required">
                        <option value="">Select One</option>
                        @foreach($classes as $class)
                        <option value="{{$class->id}}">{{$class->c_name}}</option>
                        @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Amount<span style="color: red" class="required">*</span></label>
                    <input name="feeAmount" class="form-control"  required="required" placeholder="Enter Amount">
                    </div>
                    
                    <button type="submit" class="btn btn-default">Submit Button</button>
                    <button type="reset" class="btn btn-default">Reset Button</button>
                </div>
            </form>
        </div>
     </div>
</div>

@endsection