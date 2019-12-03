@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Admission Form')
@section('content')
<div class="panel-body">
    @include('includes.alerts')

    <div class="row">

       
        <div class="col-lg-12">
            <h3>Edit Admission</h3>
             
            <form class="form-group row" role="form" method="post" action="{{url('updateAdmission')}}"    enctype="multipart/form-data">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Registration Id<span style="color: red" class="required">*</span></label>
                    <input type="hidden" name="id" value="{{$admission->id}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <select custom class="form-control" name="registration_id" id="regStd" required="required">
                        <option value="">Select One</option>
                        @foreach($registrations as $registration)
                        <option value="{{ $registration->id }}" {{($registration->id == $admission->registration_id) ? 'selected': ''}}>{{ $registration->firstName }}  </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Guardian First Name<span style="color: red" class="required">*</span></label>
                    <input id="gfirstName" name="gfirstName" class="form-control" placeholder="Enter First Name" value="{{$admission->gfirstName}}" required="required">
                </div>
                <div class="form-group">
                    <label>Admission Number<span style="color: red" class="required">*</span></label>
                    <input name="admissionNum" value="{{$admission->admissionNum}}" class="form-control" placeholder="Enter Admission Number" >
                </div>
                <div class="form-group">
                    <label>Admission Date<span style="color: red" class="required">*</span></label>
                    <input type="Date" name="admissionDate" value="{{$admission->admissionDate}}" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <label>Roll Number</label>
                    <input name="rollnumber" value="{{$admission->rollnumber}}" class="form-control" placeholder="Enter Roll Number" required="required">
                </div>
                
                
            </div>

            <div class="col-md-4">

                <div class="form-group">
                    <label>Category<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="category_id" required="required">
                        <option value="">Select One</option>
                        @foreach($categories as $category)
                        <option {{($admission->category_id == $category->id) ? 'selected': ''}} value="{{$category->id}}">{{$category->cat_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group"> 
                    <label>Blood Group </label>
                    <input name="bloodGroup" class="form-control" value="{{$admission->bloodGroup}}" placeholder="Enter Blood Group" >
                </div>
                <div class="form-group">
                    <label>Birth Place</label>
                    <input name="birthPlace" class="form-control" value="{{$admission->birthPlace}}" placeholder="Enter Birth Place">
                </div>
                <div class="form-group">
                    <label>Nationality</label>
                    <select custom class="form-control" name="nationality">
                        <option value="{{($admission->nationality == 'nationality') ? 'selected': ''}}" >{{$admission->nationality}}</option>
                    </select>
                </div>
                
                
                <div class="form-group">
                    <label>Mother Tongue</label>
                    <input name="tongue" class="form-control" value="{{$admission->tongue}}" placeholder="Enter Mother Tongue">
                </div>
            </div>
            <div class="col-md-4">

                <div class="form-group">
                    <label>Religion<span style="color: red" class="required">*</span></label>
                    <input name="religion" class="form-control" value="{{$admission->religion}}" placeholder="Enter Religion">
                </div>

                <div class="form-group">
                    <label>Country</label>
                    <select custom class="form-control" name="country">
                        <option value="{{($admission->country == 'country') ? 'selected': ''}}">{{$admission->country}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Disease</label>
                    <input  name="disease" class="form-control" value="{{$admission->disease}}" placeholder="Enter Disease If Any!" >
                </div>

                <strong>Upload Photo</strong>
                <div class="form-group">
                  <div class="input-group-prepend"></div>
                  
                    <div class="custom-file">
                    <input type="file" name="image" value="" class="custom-file-input" id="inputGroupFile01"
                      aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01"></label>
                    </div>
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
        });
        request.fail(function(jqXHR, textStatus) {
         console.log("fail");
        });
   
    });
</script>
@endsection