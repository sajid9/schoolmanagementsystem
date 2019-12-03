@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Guardian Details')
@section('content')
<div class="panel-body">
	@include('includes.alerts')
    <div class="row">
       
        <div class="col-lg-12">
             
            <form role="form" method="post" action="{{url('previousDetails')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Student Admission Number</label>
                    <input name="admissionNum" value="{{$registrations->id}}" class="form-control" >
                    <p class="help-block color-red" >{{$errors->first('admissionNum')}}</p>
                </div>
                
                <h3>Parent-Personal Details</h3>
                <div class="form-group">
                    <label>First Name<span style="color: red" class="required">*</span></label>
                    <input name="gfirstName" class="form-control" placeholder="Enter First Name">
                    <p class="help-block color-red" >{{$errors->first('firstName')}}</p>
                </div>
                 <div class="form-group">
                    <label>Last Name</label>
                    <input name="lastName" class="form-control" placeholder="Enter Last Name">
                    <!-- <p class="help-block color-red" >{{$errors->first('lastName')}}</p>-->
                </div>
                <div class="form-group">
                    <label>Relation<span style="color: red" class="required">*</span></label>
                    <input name="relation" class="form-control" placeholder="Enter Relation">
                    <p class="help-block color-red" >{{$errors->first('relation')}}</p>
                </div>
                <div class="form-group">
                    <label>Date of Birth</label>
                    <input type="Date" name="dateBirth" class="form-control" placeholder="Enter Date of Birth">
                    <p class="help-block color-red" >{{$errors->first('dateBirth')}}</p>
                </div>
                <div class="form-group">
                    <label>Education</label>
                    <input name="education" class="form-control" placeholder="Enter Education">
                   <!-- <p class="help-block color-red" >{{$errors->first('birthPlace')}}</p>-->
                </div>
                <div class="form-group">
                    <label>Occupation</label>
                    <input name="occupation" class="form-control" placeholder="Enter Occupation">
                  <!--  <p class="help-block color-red" >{{$errors->first('tongue')}}</p>-->
                </div>
                <div class="form-group">
                    <label>Income</label>
                    <input name="income" class="form-control" placeholder="Enter Income">
                   <!-- <p class="help-block color-red" >{{$errors->first('religion')}}</p>-->
                </div> <hr height="5"> 
             <h3>Parent-Contact Details</h3>
                <div class="form-group">
                    <label>Email</label>
                    <p class="form-control-static">email@example.com</p>
                    <input name="email" class="form-control" placeholder="Enter Email">
                    <!--<p class="help-block color-red" >{{$errors->first('email')}}</p>-->
                </div>
                 <div class="form-group">
                    <label>Address</label>
                    <input name="address" class="form-control" placeholder="Enter Address">
                   <!-- <p class="help-block color-red" >{{$errors->first('address')}}</p>-->
                </div>
                 <div class="form-group">
                    <label>City</label>
                    <input name="city" class="form-control" placeholder="Enter City">
                    <!--<p class="help-block color-red" >{{$errors->first('city')}}</p>-->
                 </div>
                 <div class="form-group">
                    <label>Country</label>
                    <select custom class="form-control" name="country">
                        <option value="">Select One</option>
                        <option>Pakistan1</option>
                        <option>Pakistan2</option>
                        <option>Pakistan3</option>
                    </select>
                    <!--<p class="help-block color-red" >{{$errors->first('country')}}</p>-->
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input name="phone" class="form-control" placeholder="Enter Phone No">
                   <!-- <p class="help-block color-red" >{{$errors->first('phone')}}</p>-->
                </div>
                <div class="form-group">
                    <label>Mobile</label>
                    <input name="mobile" class="form-control" placeholder="Enter Mobile No">
                    <!--<p class="help-block color-red" >{{$errors->first('mobile')}}</p>-->
                </div>

            <hr>
            <h3>Upload Photo</h3>
                <div class="form-group">
                  <div class="input-group-prepend">
                  </div>
                  <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="inputGroupFile01"
                      aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01"></label>
                      </div>
                </div>

                <button type="submit" class="btn btn-default">Submit Button</button>
                <button type="reset" class="btn btn-default">Reset Button</button>
            </form>
        </div>
     </div>
</div>

@endsection
