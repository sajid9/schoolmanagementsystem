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
            <h3>Admission Form</h3>

             
            <form class="form-group row" role="form" method="post" action="{{url('admitStudents')}}"            enctype="multipart/form-data">
                        {{ csrf_field() }}
            <div class="col-md-4">
                <div class="form-group">
                    <label>Registration Id<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="registration_id" id="regStd" required="required">
                        <option value="">Select One</option>
                        @foreach($registrations as $reg)
                        <option value="{{$reg->id}}">{{$reg->firstName}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Guardian First Name<span style="color: red" class="required">*</span></label>
                    <input id="gfirstName" name="gfirstName" class="form-control" placeholder="Enter First Name" value="" required="required">
                </div>
                <div class="form-group">
                    <label>Admission Number<span style="color: red" class="required">*</span></label>
                    <input name="admissionNum" value="" class="form-control" placeholder="Enter Admission Number" >
                </div>
                <div class="form-group">
                    <label>Admission Date<span style="color: red" class="required">*</span></label>
                    <input type="Date" name="admissionDate" value="{{date('Y-m-d')}}" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <label>Roll Number</label>
                    <input name="rollnumber" class="form-control" placeholder="Enter Roll Number" required="required">
                </div>
                
                
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>Category<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="category_id" required="required">
                        <option value="">Select One</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->cat_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group"> 
                    <label>Blood Group </label>
                    <input name="bloodGroup" class="form-control" placeholder="Enter Blood Group" >
                </div>
                <div class="form-group">
                    <label>Birth Place</label>
                    <input name="birthPlace" class="form-control" placeholder="Enter Birth Place">
                   <!-- <p class="help-block color-red" >{{$errors->first('middleName')}}</p>-->
                </div>
                <div class="form-group">
                    <label>Nationality</label>
                    <select custom class="form-control" name="nationality">
                        <option value="">Select One</option>
                        <option>Pakistan1</option>
                        <option>Pakistan2</option>
                        <option>Pakistan3</option>
                    </select>
                  <!--  <p class="help-block color-red" >{{$errors->first('nationality')}}</p>-->
                </div>
                <div class="form-group">
                    <label>Mother Tongue</label>
                    <input name="tongue" class="form-control" placeholder="Enter Mother Tongue">
                  <!--  <p class="help-block color-red" >{{$errors->first('tongue')}}</p>-->
                </div>
                 
            </div>
            <div class="col-md-4">

                <div class="form-group">
                    <label>Religion<span style="color: red" class="required">*</span></label>
                    <input name="religion" class="form-control" placeholder="Enter Religion">
                   <!-- <p class="help-block color-red" >{{$errors->first('religion')}}</p>-->
                </div>

                <div class="form-group">
                    <label>Country</label>
                    <select custom class="form-control" name="country">
                        <option value="">Select One</option>
                        <option>Pakistan1</option>
                        <option>Pakistan2</option>
                        <option>Pakistan3</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Disease</label>
                    <input  name="disease" class="form-control" placeholder="Enter Disease If Any!" >
                </div>

                <strong>Upload Photo</strong>
                <div class="form-group">
                  <div class="input-group-prepend"></div>
                  
                    <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="inputGroupFile01"
                      aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01"></label>
                    </div>
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

@endsection

@section('footer')
@parent

<script>
    $(document).on('change','#regStd',function(){
        var std= $(this).val();
        var token=$('input[name="_token"]').val();
        var request = $.ajax({
          url: "{{url('fetch')}}",
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