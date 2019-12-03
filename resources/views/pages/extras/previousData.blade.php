@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Previous Details')
@section('content')
<div class="panel-body">
 @include('includes.alerts')
    <div class="row">
   
        <div class="col-lg-12">
 
            <form role="form" method="post" action="{{url('candidateDetails')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
    
                <h3>Previous Educational Details</h3>
                <!--<a href="{{ url('/previousData')}}" type="button" class="btn btn-primary btn-sm pull-right">Add Subject</a> -->
                <div class="form-group">
                    <label>Institution Name</label>
                    <input type="hidden" name="id" value="{{$registration->id}}">
                    <input name="instName" class="form-control" placeholder="Enter Institution Name">
                   <!-- <p class="help-block color-red" >{{$errors->first('firstName')}}</p> -->
                </div>
                 <div class="form-group">
                    <label>Class</label>
                    <input name="class" class="form-control" placeholder="Enter Course">
                    <!-- <p class="help-block color-red" >{{$errors->first('lastName')}}</p>-->
                </div>
                <div class="form-group">
                    <label>Year</label>
                    <input name="year" class="form-control" placeholder="Enter Year">
                   <!-- <p class="help-block color-red" >{{$errors->first('relation')}}</p> -->
                </div>
                
                <div class="form-group">
                    <label>Total Marks</label>
                    <input name="marks" class="form-control" placeholder="Enter Marks">
                   <!-- <p class="help-block color-red" >{{$errors->first('birthPlace')}}</p>-->
                </div>
               

                <button type="submit" class="btn btn-default">Submit Button</button>
                <button type="reset" class="btn btn-default">Reset Button</button>
            </form>
        </div>
    </div>
</div>

@endsection
