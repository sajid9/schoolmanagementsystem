@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Registration Form')
@section('content')
<div class="panel-body">
	@include('includes.alerts')

    <div class="row">

        
        <div class="col-lg-12">
            <h3>Add Registration</h3>

             
            <form class="form-group row" role="form" method="post" action="{{url('regStudents')}}"            enctype="multipart/form-data">
                        {{ csrf_field() }}
            <div class="col-md-4">
                <div class="form-group">
                    <label>First Name<span style="color: red" class="required">*</span></label>
                    <input name="firstName" class="form-control" placeholder="Enter First Name" required="required">
                   <!-- <p class="help-block color-red" >{{$errors->first('firstName')}}</p> -->
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
                    <input type="Date" name="dateBirth" class="form-control" placeholder="Enter Date of Birth" required="required">
                    <!-- <p class="help-block color-red" >{{$errors->first('dateBirth')}}</p>-->
                </div>
                <div class="form-group">
                    <label >Gender<span style="color: red" class="required">*</span>
                    </label>
                    <div class="form-check-inline">
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="male" name="gender" required="required">Male
                    </label>
            
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="female" name="gender" required="required">Female
                    </label>
                    </div>
                </div>

                 <div class="form-group">
                    <label>Class<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="class_id" required="required">
                        <option value="">Select One</option>
                        @foreach($classes as $class)
                        <option value="{{$class->id}}">{{$class->c_name}}</option>
                        @endforeach
                    </select>
                </div>
               
                
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Guardian First Name<span style="color: red" class="required">*</span></label>
                    <input name="gfirstName" class="form-control" placeholder="Enter First Name" required="required">
                    <!--<p class="help-block color-red" >{{$errors->first('gfirstName')}}</p>-->
                </div>
                <div class="form-group">
                    <label>Guardian Middle Name</label>
                    <input name="gmiddleName" class="form-control" placeholder="Enter Middle Name">
                   <!-- <p class="help-block color-red" >{{$errors->first('middleName')}}</p>-->
                </div>
                 <div class="form-group">
                    <label>Guardian Last Name</label>
                    <input name="glastName" class="form-control" placeholder="Enter Last Name">
                    <!-- <p class="help-block color-red" >{{$errors->first('lastName')}}</p>-->
                </div>
                <div class="form-group">
                    <label>CNIC</label>
                    <input name="cnic" class="form-control" placeholder="Enter CNIC Num">
                   <!-- <p class="help-block color-red" >{{$errors->first('birthPlace')}}</p>-->
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input name="phone" class="form-control" placeholder="Enter Phone No">
                   <!-- <p class="help-block color-red" >{{$errors->first('phone')}}</p>-->
                </div>
                
                <div class="form-group">
                    <label>Session<span style="color: red" class="required">*</span></label>
                    <select custom class="form-control" name="session_id" required="required">
                        <option value="">Select One</option>
                        @foreach($sessions as $session)
                        <option value="{{$session->id}}">{{$session->s_name}}</option>
                        @endforeach
                    </select>
                    <!--<p class="help-block color-red" >{{$errors->first('session')}}</p> -->
                </div>
                
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Mobile</label>
                    <input name="mobile" class="form-control" placeholder="Enter Mobile No">
                    <!--<p class="help-block color-red" >{{$errors->first('mobile')}}</p>-->
                </div>
                 <div class="form-group">
                    <label>Address</label>
                    <input name="address" class="form-control" placeholder="Enter Address">
                   <!-- <p class="help-block color-red" >{{$errors->first('address')}}</p>-->
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input name="email" class="form-control" placeholder="email@example.com">
                    <!--<p class="form-control-static">email@example.com</p>
                    <p class="help-block color-red" >{{$errors->first('email')}}</p>-->
                </div>

                <div class="form-group">
                    <label>Education</label>
                    <input name="education" class="form-control" placeholder="Enter Education">
                </div> 
                <div class="form-group">
                    <label>Occupation</label>
                    <input name="occupation" class="form-control" placeholder="Enter Occupation">
                </div>
                <div class="form-group">
                    <label>Income</label>
                    <input name="income" class="form-control" placeholder="Enter Income">
                </div>
               
            </div>
            <div class="col text-center">   
                <button type="submit" class="btn btn-default">Submit Button</button>
                <button type="reset" class="btn btn-default">Reset Button</button>
            </div>
            </form>
        </div>
     </div>
</div>

@endsection
