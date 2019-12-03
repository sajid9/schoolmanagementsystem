@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Admission Form')
@section('content')
<h3>Fields Marked with <span style="color: red" class="required">*</span> Must Be Filled.</h3>
<div class="panel-body">
	@include('includes.alerts')

    <div class="row">

       
        <div class="col-lg-12">

             
            <form class="form-group row" role="form" method="post" action="{{url('step2Guardian')}}"            enctype="multipart/form-data">
                        {{ csrf_field() }}
                <div class="form-group">
                    <label>Admission Number<span style="color: red" class="required">*</span></label>
                    <input name="admissionNum" value="{{(isset($register->id)) ? $register->id + 1 : 1}}" class="form-control" >
                    <p class="help-block color-red" >{{$errors->first('admissionNum')}}</p>
                </div>
                <div class="form-group">
                    <label>Admission Date<span style="color: red" class="required">*</span></label>
                    <input type="Date" name="admissionDate" value="{{date('Y-m-d')}}" class="form-control">
                    <p class="help-block color-red" >{{$errors->first('admissionDate')}}</p>
                </div>

                <h3>Personal Details</h3>
                <div class="form-group">
                    <label>First Name<span style="color: red" class="required">*</span></label>
                    <input name="firstName" class="form-control" placeholder="Enter First Name" required="required">
                    <p class="help-block color-red" >{{$errors->first('firstName')}}</p>
                </div>
                <div class="form-group">
                    <label>Middle Name</label>
                    <input name="middleName" class="form-control" placeholder="Enter Middle Name">
                   <!-- <p class="help-block color-red" >{{$errors->first('middleName')}}</p>-->
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input name="lastName" class="form-control" placeholder="Enter Last Name">
                    <!-- <p class="help-block color-red" >{{$errors->first('lastName')}}</p>-->
                </div>
                <div class="form-group">
                    <label>Date of Birth<span style="color: red" class="required">*</span></label>
                    <input type="Date" name="dateBirth" class="form-control" placeholder="Enter Date of Birth">
                    <p class="help-block color-red" >{{$errors->first('dateBirth')}}</p>
                </div>
                <div class="form-group">
                    <label >Gender<span style="color: red" class="required">*</span></label>
                    <div class="form-check-inline">
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="male" name="gender">Male
                    </label>
            
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="female" name="gender">Female
                    </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Blood Group</label>
                    <select custom class="form-control" name="bloodGroup">
                        <option value="">Select One</option>
                        <option>A+</option>
                        <option>A-</option>
                        <option>B+</option>
                        <option>B-</option>
                        <option>AB+</option>
                        <option>AB-</option>
                    </select>
                   <!-- <p class="help-block color-red" >{{$errors->first('bloodGroup')}}</p>-->
                </div>
                <div class="form-group">
                    <label>Birth Place</label>
                    <input name="birthPlace" class="form-control" placeholder="Enter Birth Place">
                   <!-- <p class="help-block color-red" >{{$errors->first('birthPlace')}}</p>-->
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
                <div class="form-group">
                    <label>Category</label>
                    <select custom class="form-control" name="category">
                        <option value="">Select One</option>
                        <option>staff child</option>
                        <option>financially weak student</option>
                        <option>sibling institution</option>
                    </select>
                  <!--  <p class="help-block color-red" >{{$errors->first('category')}}</p>-->
                </div>
                <div class="form-group">
                    <label>Religion<span style="color: red" class="required">*</span></label>
                    <input name="religion" class="form-control" placeholder="Enter Religion">
                   <!-- <p class="help-block color-red" >{{$errors->first('religion')}}</p>-->
                </div> <hr height="5"> 
                <h3>Contact Details</h3>
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
                    <label>PIN Code</label>
                    <input name="pin" class="form-control" placeholder="Enter PIN Code">
                   <!-- <p class="help-block color-red" >{{$errors->first('pin')}}</p>-->
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

                <div class="form-group">
                    <label>Email</label>
                    <p class="form-control-static">email@example.com</p>
                    <input name="email" class="form-control" placeholder="Enter Email">
                    <!--<p class="help-block color-red" >{{$errors->first('email')}}</p>-->
                </div> <hr>
                <h3>Course & Batch Details</h3>
                <div class="form-group">
                    <label>Class<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="class">
                        <option value="">Select One</option>
                        <option>class1</option>
                        <option>class2</option>
                        <option>class3</option>
                    </select>
                    <p class="help-block color-red" >{{$errors->first('course')}}</p>
                </div>
                <div class="form-group">
                    <label>Batch<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="batch">
                        <option value="">Select One</option>
                        <option>14-15</option>
                        <option>15-16</option>
                        <option>16-17</option>
                        <option>17-18</option>
                    </select>
                    <p class="help-block color-red" >{{$errors->first('batch')}}</p>
                </div>
                <div class="form-group">
                    <label>Roll Number</label>
                    <input name="rollnumber" class="form-control" placeholder="Enter Roll Number">
                  <!--  <p class="help-block color-red" >{{$errors->first('rollnumber')}}</p>-->
                </div> <hr>
                <h3>Settings</h3>
                <div class="form-group">
                    <label>Biometric ID</label>
                    <input name="biometric" class="form-control" placeholder="Enter Biometric ID">
                   <!-- <p class="help-block color-red" >{{$errors->first('biometric')}}</p>-->
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="" name="enableEmail">Enable Email Features
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="assign_trans" value="" name="assignTransport">Assign Transport
                        </label>
                    </div>
                </div>
                <div id="trans_mod"></div>
                <div id="mod-select"></div>

                    <hr>
                <h3>Upload Photo</h3>
                <div class="form-group">
                  <div class="input-group-prepend"></div>
                  
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
<template id="transport-mode">
    <div class="form-group">
        <label>Transport Mode</label>
        <select custom class="form-control" id="mod_select" name="transport">
            <option value="">Select a mode</option>
            <option value="two_way">Two-way Transport</option>
            <option value="one_pickup">One-way Pickup</option>
            <option value="one_drop">One-way drop</option>
        </select>
       <!-- <p class="help-block color-red" >{{$errors->first('transport')}}</p>-->
    </div>
</template>
<template id="Two-way">
    <div class="form-group">
        <label>Pickup route</label>
        <select custom class="form-control" name="pickupRoute">
            <option value="">Select pickup route</option>
            <option>a</option>
            <option>b</option>
            <option>c</option>
        </select>
       <!-- <p class="help-block color-red" >{{$errors->first('pickupRoute')}}</p>-->
    </div>
    <div class="form-group">
        <label>Drop route</label>
        <select custom class="form-control" name="dropRoute">
            <option value="">Select drop route</option>
            <option>a</option>
            <option>b</option>
            <option>c</option>
        </select>
       <!-- <p class="help-block color-red" >{{$errors->first('dropRoute')}}</p>-->
    </div>
    <div class="form-group">
        <label>Pickup stop</label>
        <select custom class="form-control" name="pickupStop">
            <option value="">Select pickup stop</option>
            <option>a</option>
            <option>b</option>
            <option>c</option>
        </select>
        <!--<p class="help-block color-red" >{{$errors->first('pickupStop')}}</p>-->
    </div>
     <div class="form-group">
        <label>Drop stop</label>
        <select custom class="form-control" name="dropStop">
            <option value="">Select drop stop</option>
            <option>a</option>
            <option>b</option>
            <option>c</option>
        </select>
        <!--<p class="help-block color-red" >{{$errors->first('dropStop')}}</p>-->
    </div>
    <div class="form-group">
        <label>Transport Fee</label>
        <input name="fee" class="form-control" placeholder="Enter Fee">
        <!--<p class="help-block color-red" >{{$errors->first('fee')}}</p>-->
    </div>
</template>
<template id="one-pickup">
    <div class="form-group">
        <label>Pickup route</label>
        <select custom class="form-control" name="pickupRoute">
            <option value="">Select pickup route</option>
            <option>a</option>
            <option>b</option>
            <option>c</option>
        </select>
        <!--<p class="help-block color-red" >{{$errors->first('pickupRoute')}}</p>-->
    </div>
    <div class="form-group">
        <label>Pickup stop</label>
        <select custom class="form-control" name="pickupStop">
            <option value="">Select pickup stop</option>
            <option>a</option>
            <option>b</option>
            <option>c</option>
        </select>
        <!--<p class="help-block color-red" >{{$errors->first('pickupStop')}}</p>-->
    </div>
    <div class="form-group">
        <label>Transport Fee</label>
        <input name="fee" class="form-control" placeholder="Enter Fee">
        <!--<p class="help-block color-red" >{{$errors->first('fee')}}</p>-->
    </div>
</template>
<template id="one-drop">
    <div class="form-group">
        <label>Drop route</label>
        <select custom class="form-control" name="dropRoute">
            <option value="">Select drop route</option>
            <option>a</option>
            <option>b</option>
            <option>c</option>
        </select>
       <!-- <p class="help-block color-red" >{{$errors->first('dropRoute')}}</p>-->
    </div>
    <div class="form-group">
        <label>Drop stop</label>
        <select custom class="form-control" name="dropStop">
            <option value="">Select drop stop</option>
            <option>a</option>
            <option>b</option>
            <option>c</option>
        </select>
       <!-- <p class="help-block color-red" >{{$errors->first('dropStop')}}</p>-->
    </div>
    <div class="form-group">
        <label>Transport Fee</label>
        <input name="fee" class="form-control" placeholder="Enter Fee">
       <!-- <p class="help-block color-red" >{{$errors->first('fee')}}</p>-->
    </div>
</template>
@endsection
@section('footer')
@parent
<script>
    $('#assign_trans').on('click',function(){
        if($(this).is(':checked')){
            var temp = $('#transport-mode').html();
            $('#trans_mod').html(temp);
        }else{
             $('#trans_mod').html('');
        }
    })
</script>
<script>

    $(document).on('change','#mod_select',function(){
        if ($(this).val() == 'two_way') {
            var temp = $('#Two-way').html();
            $('#mod-select').html(temp);
        }
        else if($(this).val() == 'one_pickup'){
            var temp = $('#one-pickup').html();
            $('#mod-select').html(temp);
        } 
        else if($(this).val() == 'one_drop'){
            var temp = $('#one-drop').html();
            $('#mod-select').html(temp);
        } 
        else{
           $('#mod-select').html('');
        }
    })
</script>
@endsection