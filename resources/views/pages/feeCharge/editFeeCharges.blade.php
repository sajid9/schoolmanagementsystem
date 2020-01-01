@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Edit Fee Charges')
@section('content')
<div class="panel-body">
	@include('includes.alerts')
    <div class="row">
        <div class="col-lg-12">
            <h3>Edit Fee Charges</h3>
            <form class="form-group row" role="form" method="post" action="{{url('updateFeeCharges')}}"  enctype="multipart/form-data">

                <div class="col-md-4"> 

                    
                    

                    <div class="form-group">
                    <label>Charges Category <span style="color: red" class="required">*</span></label>
                    <input type="hidden" name="id" value="{{$feeCharges->id}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <select custom class="form-control" name="chargCategory_id" required="required">
                        <option value="">Select One</option>
                        @foreach($chargCategories as $chargCategory)
                        <option {{ ($feeCharges->chargCategory_id == $chargCategory->id) ? 'selected' : '' }} value="{{$chargCategory->id}}">{{$chargCategory->feeChargCategory}}</option>
                        @endforeach
                    </select>
                    </div>
                    
                    <div class="form-group">
                    <label>Charges Head <span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="chargHead_id" required="required">
                        <option value="">Select One</option>
                        @foreach($chargHeads as $chargHead)
                        <option {{ ($feeCharges->chargHead_id == $chargHead->id) ? 'selected' : '' }} value="{{$chargHead->id}}">{{$chargHead->feeChargHead}}</option>
                        @endforeach
                    </select>
                    </div>
                    
                   <div class="form-group">
                    <label>Student Class<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="class_id" required="required">
                        <option value="">Select One</option>
                        @foreach($classes as $class)
                        <option {{ ($feeCharges->class_id == $class->id) ? 'selected' : '' }} value="{{$class->id}}">{{$class->c_name}}</option>
                        @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Amount<span style="color: red" class="required">*</span></label>
                    <input name="feeAmount" class="form-control" value="{{$feeCharges->feeAmount }}" required="required" placeholder="Enter Amount">
                    </div>

                    <div class="form-group">
                    <label>Transaction Type<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="transactionType" id="transactionType" placeholder="Enter Recept Type">
                        <option value="">Select One</option>
                        <option {{($feeCharges->transactionType == 'credit') ? 'selected': ''}} value="credit" >Credit</option>
                        <option {{($feeCharges->transactionType == 'debit') ? 'selected': ''}} value="debit" >Debit</option>
                    </select>
                    </div>

                    <button type="submit" class="btn btn-default">Update Button</button>
                    <button type="reset" class="btn btn-default">Reset Button</button>
                </div>
            </form>
        </div>
     </div>
</div>


@endsection