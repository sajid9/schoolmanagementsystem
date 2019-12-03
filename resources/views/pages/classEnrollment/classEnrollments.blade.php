@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Class Enrollments')
@section('content')
<div class="panel-body">
	@include('includes.alerts')

    <div class="row">

       
        <div class="col-lg-12">
            <h3>Add Class Enrollment</h3>
 
             
            <form class="form-group row" role="form" method="post" action="{{url('addCEnrollments')}}"            enctype="multipart/form-data">
             {{ csrf_field() }}
            <div class="col-md-4">
                <div class="form-group">
                    <label>Admission Id<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="admission_id" id="regStd" required="required">
                        <option value="">Select One</option>
                        @foreach($admissions as $admission)
                        <option value="{{$admission->id}}">{{ $admission->registrations->firstName }}</option>

                        @endforeach
                    </select>

                </div>

                <div class="form-group">
                    <label>Batch Id<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="batch_id" id="" required="required">
                        <option value="">Select One</option>
                        @foreach($batches as $batch)
                        <option value="{{$batch->id}}">{{$batch->batchName}} / {{ $batch->classes->c_name }} / {{ $batch->sections->sec_name }} / {{ $batch->years->yearName }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="checkbox">
                    <label>
                    <input type="checkbox" data-toggle="toggle" name="is_active" value="yes" {{ (old('is_active') == 'yes') ? 'checked' : '' }} data-on="Active" data-off="Inactive">
                    </label>
                </div>
                
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Guardian First Name<span style="color: red" class="required">*</span></label>
                    <input id="gfirstName" name="gfirstName" class="form-control" placeholder="Enter First Name" value="" required="required">
                </div>
                <div class="form-group">
                    <label>Date of Birth<span style="color: red" class="required">*</span></label>
                    <input type="Date" id="dateBirth" name="dateBirth" class="form-control" value="" placeholder="Enter Date of Birth" required="required">
                </div>
            </div>

            <div class="col-md-12 " align="center">   
                <button type="submit" class="btn btn-default">Submit Button</button>
                <button type="reset" class="btn btn-default">Reset Button</button>
            </div>
            </form>
        </div>
     </div>
</div>
{{-- <template id="related_details">
    <div class="form-group">
        <label>Guardian First Name<span style="color: red" class="required">*</span></label>
        <input id="gfirstName" name="gfirstName" class="form-control" placeholder="Enter First Name" value="" required="required">
    </div>
    <div class="form-group">
        <label>Date of Birth<span style="color: red" class="required">*</span></label>
        <input type="Date" id="dateBirth" name="dateBirth" class="form-control" value="" placeholder="Enter Date of Birth" required="required">
    </div>
    
</template>
 --}}
@endsection

@section('footer')
@parent

<script>
    $(document).on('change','#regStd',function(){
        var std= $(this).val();
        var token=$('input[name="_token"]').val();
        var request = $.ajax({
          url: "http://localhost/integrate/public/fetch",
          type: "POST",
           data:{stdid:std,_token:token},
          dataType: "json"
        });
        request.done(function(msg) {
         $('#gfirstName').val(msg.gfirstName);
         $('#dateBirth').val(msg.dateBirth);
        });
        request.fail(function(jqXHR, textStatus) {
         console.log("fail");
        });
   
    });
</script>
@endsection