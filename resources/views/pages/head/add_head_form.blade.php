{{-- extend  --}}
@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.footer2')
@extends('includes.sidebar2')

{{-- page titles --}}
@section('title', 'Dashboard')
@section('pagetitle', 'Add head')

@section('content')
<div class="panel panel-default">
<div class="panel-heading">
    Add New Head
</div>
<div class="panel-body">

{{-- form start  --}}
<form method="post" action="{{url('expenditure/savehead')}}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
    <label for="head">Head Name <span class="text-danger">*</span></label>
    <input type="text" name="head_name" value="{{old('head_name')}}" class="form-control" id="head" aria-describedby="head" placeholder="Head Name">
    <small id="head" class="form-text text-muted text-danger">{{$errors->first('head_name')}}</small>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox" data-toggle="toggle" name="is_active" value="yes" {{ (old('is_active') == 'yes') ? 'checked' : '' }} data-on="Active" data-off="Inactive">
    </label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button> <a href="{{url('expenditure/headlisting')}}" class="btn btn-default">Back</a>
</form>
{{-- form end --}}

</div>
</div>
@endsection