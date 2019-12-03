@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Edit Enrollment')
@section('content')
<div class="panel-body">
	@include('includes.alerts')

    <div class="row">

       
        <div class="col-lg-12">
            <h3>Edit Class Enrollment</h3>
 
             
            <form class="form-group row" role="form" method="post" action="{{url('updatecEnrollment')}}"            enctype="multipart/form-data">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Admission Id<span style="color: red" class="required">*</span></label>
                    <input type="hidden" name="id" value="{{$cenrolls->id}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <select custom class="form-control" name="admission_id" id="regStd" required="required">
                        <option value="">Select One</option>
                        @foreach($admissions as $admission)
                        <option value="{{$admission->id}}" {{( $admission->id == $cenrolls->admission_id) ? 'selected':'' }}>{{ $admission->registrations->firstName }}</option>

                        @endforeach
                    </select>

                </div>

                <div class="form-group">
                    <label>Batch Id<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="batch_id" id="" required="required">
                        <option value="">Select One</option>
                        @foreach($batches as $batch)
                        <option value="{{$batch->id}}" {{ ($batch->id == $cenrolls->batch_id) ? 'selected':'' }}>{{$batch->batchName}} / {{ $batch->classes->c_name }} / {{ $batch->sections->sec_name }} / {{ $batch->years->yearName }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="checkbox">
                    <label>
                    <input type="checkbox" data-toggle="toggle" name="is_active" value="yes" {{ ($cenrolls->is_active == 'yes') ? 'checked' : '' }} data-on="Active" data-off="Inactive">
                    </label>
                </div>
                
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Guardian First Name<span style="color: red" class="required">*</span></label>
                    <input id="gfirstName" name="gfirstName" class="form-control" placeholder="Enter First Name" value="{{$cenrolls->gfirstName}}" required="required">
                </div>
                <div class="form-group">
                    <label>Date of Birth<span style="color: red" class="required">*</span></label>
                    <input type="Date" id="dateBirth" name="dateBirth" class="form-control" value="{{$cenrolls->dateBirth}}" placeholder="Enter Date of Birth" required="required">
                </div>
            </div>

            <div class="col-md-12 " align="center">   
                <button type="submit" class="btn btn-default">Update Button</button>
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