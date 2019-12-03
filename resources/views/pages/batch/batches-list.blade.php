@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Batches List')
@section('content')

 <div class="row">
  @include('includes.alerts')
   <div class="col-lg-12">
     <div class="panel panel-default">
       <div class="panel-heading">
                Batches
         <a href="{{ url('/batches')}}" type="button" class="btn btn-primary btn-sm pull-right">Add Batch</a>      
       </div>
            <!-- /.panel-heading -->
         <div class="panel-body">
           <div class="table-responsive">
             <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                  <tr>
                    <th>Name</th>
	                <th>Class</th>
                  <th>Section</th>
                  <th>Year</th>
                  <th>Action</th>
                   </tr>
                 </thead>
                  <tbody>
	                  @foreach($batches as $batch)
						<tr>
							<td>{{$batch->batchName}}</td>
              <td>{{$batch->classes->c_name}}</td>
              <td>{{$batch->sections->sec_name}}</td>
              <td>{{$batch->years->yearName}}</td>
              
							
							<td>
                <a href="{{ url('editBatches/'.$batch->id)}}">
                  <i class="fa fa-edit"></i>
                </a>
                <a href="{{ url('delBatches/'.$batch->id)}}">
                  <i class="fa fa-trash"></i>
                </a>
              </td>
						</tr>
	                  @endforeach
                    </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
               
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
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
            });
</script>

@endsection