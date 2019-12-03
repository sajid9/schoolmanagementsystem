@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.sidebar2')
@extends('includes.footer2')
@section('title','Time Table List')
@section('content')

 <div class="row">
  @include('includes.alerts')
   <div class="col-lg-12">
    <form class="form-inline" method="POST" action="{{ url('timetablesearch') }}" style="margin-bottom: 20px;">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="form-group">
        <label for="batch">Batches:</label>
        <select class="form-control" id="batch" name="batch">
          <option value="">Select Batch</option>
          @foreach($batches as $batch)
          <option value="{{ $batch->id }}">{{ $batch->batchName." | ".$batch->classes->c_name." | ".$batch->sections->sec_name." | ".$batch->years->yearName }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label><button type="submit" class="btn btn-default">Search</button></label>
        
      </div>
    </form>
     <div class="panel panel-default">
       <div class="panel-heading" style="text-align: center;font-size: 20px;">
            <strong>Batch: </strong>{{@$timetable[0]->batches->batchName}}
            <strong>Class: </strong>{{@$timetable[0]->batches->classes->c_name}}
            <strong>Section: </strong>{{@$timetable[0]->batches->sections->sec_name}}   
            <strong>Year: </strong>{{@$timetable[0]->batches->years->yearName}}   
       </div>
            <!-- /.panel-heading -->
          {{-- intialize empty array for days and time to remove repeatation and also check days --}}
        <?php $days = array(); $time=array();?>
         <div class="panel-body">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <th>Time</th>
                  {{-- show days in header and remove repeatation --}}
                  @foreach($timetable as $table)
                  @if(!in_array($table->periods->days->day_name,$days))
                  <th>{{$table->periods->days->day_name}}</th>
                  @php array_push($days,$table->periods->days->day_name); @endphp
                  @endif
                  @endforeach
                </thead>
                <tbody>
                  {{-- show time in rows and remove time repeatation --}}
                  @foreach($timetable as $table)
                  @if(!in_array($table->periods->times->time_name,$time))
                  <tr>
                    <td>{{$table->periods->times->time_name}}</td>
                    @php
                    /*daynamic days subjects show in colums */
                    for($i=0; $i< sizeof($days);$i++){
                      /*get subject from database through day and time*/
                      $subject = CH::getsubject($days[$i],$table->periods->times->time_name);
                      echo "<td>".$subject->subjects->sub_name."</td>";
                    } 
                    @endphp
                  </tr>
                  @php array_push($time,$table->periods->times->time_name); @endphp
                  @endif
                  
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