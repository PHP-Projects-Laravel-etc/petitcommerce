@extends('shop::layouts.master')
@section('shop_styles')
  {{ Html::style(mix('assets/common/css/parsley.css')) }}
  @section('title','MESAFELİ SÖZLEŞME |')
  @section('content')
    <body class="animsition">

      <!-- Header -->
      @include('shop::partials._shopping_header')

      <!-- Cart -->
      @include('shop::partials._shopping_cart')

      <!-- breadcrumb -->
      <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
          <a href="{{route('shop.index')}}" class="stext-109 cl8 hov-cl1 trans-04">
            {{__('views.shop.menu_home')}}
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
          </a>

          <a href="{{route('shop.privacy')}}" class="stext-109 cl8 hov-cl1 trans-04">
            Gizlilik Politikası
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
          </a>

        </div>
      </div>
      <section class="privacy_policy">

        <div class="container">
          @include('shop::partials._online_selling_contract')


          </div>
        </section>
        <!-- Footer -->
        <div class="mt-5">

          @include('shop::partials._footer')
        </div>
        <!-- Back to top -->
        <div class="btn-back-to-top" id="myBtn">
          <span class="symbol-btn-back-to-top">
            <i class="zmdi zmdi-chevron-up"></i>
          </span>
        </div>


      @endsection
      @section('shop_scripts')
        @include('shop::partials._shopping_javascript')
      @endsection
