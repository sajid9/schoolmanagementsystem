@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Years')
@section('content')
<div class="panel-body">
	@include('includes.alerts')
    <div class="row">
        <div class="col-lg-12">
            <h3>Add Year</h3>
            <form role="form" method="post" action="{{url('addYears')}}">
             {{ csrf_field() }}

                <div class="col-md-4"> 
                    <div class="form-group">
                    <label>Name<span style="color: red" class="required">*</span></label>
                    <input name="yearName" class="form-control" required="required" placeholder="Enter Year">
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