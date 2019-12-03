@extends('layouts.app2')
@extends('includes.header2')
@extends('includes.footer2')
@extends('includes.sidebar2')

@section('content')
 <!-- /.row -->
<div class="row">
    <div class="col-md-12">
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
              <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
              <div class="count">0</div>
              <h3>Payable</h3>
              <p><a target="_blank" href="">Read More</a></p>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
              <div class="icon"><i class="fa fa-comments-o"></i></div>
              <div class="count">0</div>
              <h3>Receivable</h3>
              <p><a href="" target="_blank">Read More</a></p>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
              <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
              <div class="count">0</div>
              <h3>Purchase</h3>
              <p><a href="">Read More </a></p>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
              <div class="icon"><i class="fa fa-check-square-o"></i></div>
              <div class="count">0</div>
              <h3>Sale</h3>
              <p><a href="">Read More</a></p>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
@endsection