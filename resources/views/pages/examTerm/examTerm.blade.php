@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Exam Term')
@section('content')
<div class="panel-body">
	@include('includes.alerts')
    <div class="row">
        <div class="col-lg-12">
            <h3>Add Exam Term</h3>
            <form role="form" method="post" action="{{url('addExamTerm')}}">
             {{ csrf_field() }}

                <div class="col-md-4"> 
                    <div class="form-group">
                    <label>Exam Term<span style="color: red" class="required">*</span></label>
                    <input name="examTermName" class="form-control" required="required" placeholder="Enter ExamTerm">
                    </div>
                    <!--<div class="form-group">
                        <label id="checkbox">Status</label>
                        <div class="checkbox">
                            <input type="checkbox" name="status" id="status" checked="checked">
                        </div>
                    </div>
                    <input type="hidden" name="class_status" id="class_status" value="active"> -->
                
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