@extends('shop::layouts.master')

@section('title','ÖDEME EKRANI |')
@section('content')

  <iframe src="https://www.paytr.com/odeme/guvenli/<?php echo $token;?>" id="paytriframe" frameborder="0" scrolling="no" style="width: 100%;"></iframe>

@endsection
@section('shop_scripts')
  <script src="{{asset('modules/shop/vendor/jquery/jquery-3.2.1.min.js')}}"></script>

  <script src="https://www.paytr.com/js/iframeResizer.min.js"></script>
  <script>iFrameResize({},'#paytriframe');</script>

@endsection
