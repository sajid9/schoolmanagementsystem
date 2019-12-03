@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Periods List')
@section('content')

 <div class="row">
  @include('includes.alerts')
   <div class="col-lg-12">
     <div class="panel panel-default">
       <div class="panel-heading">
                Periods
         <a href="{{ url('/periods')}}" type="button" class="btn btn-primary btn-sm pull-right">Add Period</a>      
       </div>
            <!-- /.panel-heading -->
         <div class="panel-body">
           <div class="table-responsive">
             <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                  <tr>
                    <th>Name</th>
	                <th>Time</th>
                  <th>Day</th>
                  <th>Class Room</th>
                  <th>Action</th>
                   </tr>
                 </thead>
                  <tbody>
	                  @foreach($periods as $period)
						<tr>
							<td>{{$period->periodName}}</td>
              <td>{{$period->times->time_name}}</td>
              <td>{{$period->days->day_name}}</td>
              <td>{{$period->classRooms->cRoom_name}}</td>
              
							
							<td>
                <a href="{{ url('editPeriods/'.$period->id)}}">
                  <i class="fa fa-edit"></i>
                </a>
                <a href="{{ url('delPeriods/'.$period->id)}}">
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