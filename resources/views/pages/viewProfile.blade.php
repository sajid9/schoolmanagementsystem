@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Student Details ')
@section('content')

 <div class="row">
  @include('includes.alerts')
  <!--  <div class="col-lg-12"> -->
     
       
            <!-- /.panel-heading -->
        
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>First Name:</strong>
                 <strong>{{ $reg->firstName }}</strong>
            </div>
       
            <div class="form-group">
                <strong>Middle Name:</strong>
               <strong>{{ $reg->middleName }}</strong> 
            </div>
        
            <div class="form-group">
                <strong>Last Name:</strong>
               <strong>{{ $reg->lastName }}</strong>
            </div>
        
            <div class="form-group">
                <strong>Date Of Birth:</strong>
               <strong>{{ $reg->dateBirth }}</strong>
            </div>
        
            <div class="form-group">
                <strong>Gender:</strong>
               <strong>{{ $reg->gender }}</strong>
            </div>
            <div class="form-group">
                <strong>Class:</strong>
               <strong>{{$reg->classes->c_name}}</strong>
            </div>
            <div class="form-group">
                <strong>Session:</strong>
               <strong>{{$reg->session->s_name}}</strong>
            </div>
            <div class="form-group">
                <strong>Address:</strong>
               <strong>{{ $reg->address }}</strong>
            </div>
            <div class="form-group">
                <strong>Phone:</strong>
               <strong>{{ $reg->phone }}</strong>
            </div>
        
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Father First Name:</strong>
               <strong>{{$reg->gfirstName }}</strong>
            </div>

            <div class="form-group">
                <strong>Father Middle Name:</strong>
               <strong>{{$reg->gmiddleName }}</strong>
            </div>
        
            <div class="form-group">
                <strong>Father last Name:</strong>
               <strong>{{$reg->glastName }}</strong>
            </div>
        
            <div class="form-group">
                <strong>CNIC:</strong>
               <strong>{{ $reg->cnic }}</strong>
            </div>
        
            
        
            <div class="form-group">
                <strong>Mobile:</strong>
               <strong>{{ $reg->mobile }}</strong>
            </div>
        
            
            <div class="form-group">
                <strong>Email:</strong>
               <strong>{{ $reg->email }}</strong>
            </div>
            <div class="form-group">
                <strong>Education:</strong>
               <strong>{{ $reg->education }}</strong>
            </div>
            <div class="form-group">
                <strong>Occupation:</strong>
               <strong>{{ $reg->occupation }}</strong>
            </div>
            <div class="form-group">
                <strong>Income:</strong>
               <strong>{{ $reg->income }}</strong>
            </div>
            
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
          <button class="btn btn-primary"   id="mycustomprint">print</button>
        </div>
        <!-- /.panel -->
 <!--    </div> -->
    <!-- /.col-lg-12 -->
</div>


@endsection
@section('footer')
@parent
<script>
	$(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true
                });

                 $('#mycustomprint').click(function(){

    window.print();
  })
            });



</script>

@endsection