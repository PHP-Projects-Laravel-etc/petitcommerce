@extends('shop::layouts.master')
@section('title','KATEGORİ ÜRÜNLER |')
@section('content')
	<body class="animsition">
		<!-- Header -->
		@include('shop::partials._shopping_header')
		<!-- Cart -->
		@include('shop::partials._shopping_cart')
		<!-- Product Detail -->
		<div class="btn-back-to-top" id="myBtn">
			<span class="symbol-btn-back-to-top">
				<i class="zmdi zmdi-chevron-up"></i>
			</span>
		</div>
		<section class="bg0 p-t-23 p-b-140">
      @if(!$categories)
    	<h2 class="text-center"><strong>{{$category->name}}</strong></h2>
    @endif
      <div class="container">
				<div class="row isotope-grid mt-5">
          @foreach($categories as $category)
  				@if($category->image()->where('type',2)->first())

  				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
  				<!-- Block2 -->
  				<div class="block2">
  				<a href="{{route('categories.products',$category->slug)}}">
  				<div class="block2-pic hov-img0">
  				<img src="{{asset('images/categories/' . $category->image()->where('type',2)->first()->name)}}" style="width:255px; height:315px;" alt="{{$category->slug}}">
  				<a href="{{route('categories.products',$category->slug)}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
  				{{ $category->name}}
  			</a>
  			<a href="{{route('categories.products',$category->slug)}}" class="btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 category-name">
  			{{ $category->name}}
  		</a>
  	</div>

  </div>
  </div>
  @endif
  @endforeach
				</div>
        @if(!$categories)
        {{ $products->links("pagination::bootstrap-4") }}
      @endif
      </div>

		</section>
		<!-- Footer -->
		@include('shop::partials._footer')
		<!-- Back to top -->
	@endsection
	@section('shop_scripts')
		@include('shop::partials._shopping_javascript')
	@endsection
