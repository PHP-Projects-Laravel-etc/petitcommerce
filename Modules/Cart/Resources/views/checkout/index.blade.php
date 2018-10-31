@extends('shop::layouts.master')
@section('title','SEPET GÖRÜNTÜLEME |')
@section('shop_styles')
	{{ Html::style(mix('assets/common/css/parsley.css')) }}
@endsection

@section('content')
	<body class="animsition">

		<!-- Header -->
		@include('shop::partials._shopping_header')

		<div class="row mt-5">
			<div class="col-sm-10 col-md-8 col-lg-4 ml-5">
				<div class="p-b-30 m-lr-15-sm">
					{!! Form::open(['route'=>['payment.create'],'data-parsley-validate' => '']) !!}
					<h5 class="mtext-108 cl2 p-b-7">
						{{__('views.shop.account_info_adress')}}
					</h5>
					<p class="stext-102 cl6">
						Adres Bilgileriniz ürünleri göndermemiz için gereklidir.
					</p>
					<div class="row p-b-25 mt-3">
					<div class="col-12 p-b-5">
						<label class="stext-102 cl3" for="city">Adres İsmi</label>
						<select class=" size-111 bor8 stext-102 cl2 p-lr-20" name="adress_id" id="account_name">
							<option value="">Bir Adres Seçin</option>

							@foreach($user->accounts as $adress)
								<option value="{{$adress->id}}">{{$adress->account_name}}</option>
							@endforeach
						</select>
					</div>


						<div class="col-sm-6 p-b-5 mt-3">
							<label class="stext-102 cl3" for="name">İsim</label>
							<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="name" type="text" name="name" value="" readonly required>
						</div>

						<div class="col-sm-6 p-b-5 mt-3">
							<label class="stext-102 cl3" for="lastname">Soyisim</label>
							<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="lastname" type="text" name="lastname" value="" readonly required>
						</div>

						<div class="col-12 p-b-5">
							<label class="stext-102 cl3" for="email">Email</label>
							<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="email" type="text" name="email" value="{{Auth::user()->email}}" readonly required>

						</div>

						<div class="col-12 p-b-5">
							<label class="stext-102 cl3" for="city">Şehir</label>
							<select class=" size-111 bor8 stext-102 cl2 p-lr-20" name="city" id="city" readonly required>
								<option value="">Şehir Seçin</option>
							</select>
							<input class="size-111 bor8 stext-102 cl2 p-lr-20"  type="text" name="country" value="Türkiye" hidden>

						</div>
						<div class="col-12 p-b-5">
							<label class="stext-102 cl3" for="adress">Adres</label>
							<textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="adress" name="adress" readonly required></textarea>
						</div>

						<div class="col-6 p-b-5">
							<label class="stext-102 cl3" for="zip_code">Posta Kodu</label>
							<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="zip_code" type="text" name="zip_code" value="" readonly required>
						</div>
						<div class="col-6 p-b-5">
							<label class="stext-102 cl3" for="phone">Telefon Numarası</label>
							<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="phone" type="text" name="phone" value="" readonly required>
						</div>

						<div class="col-6 p-b-5">
							<label class="stext-102 cl3" for="id_number">TC Kimlik No</label>
							<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="id_number" type="text" name="id_number" value="" readonly required>
						</div>
					</div>
				</div>


			</div>
			<div class="col-sm-10 col-md-8 col-lg-4 ml-5">
				<div class="p-b-30 m-lr-15-sm">
					@foreach(Cart::content() as $row)
						@php
							$product = Modules\Product\Entities\Product::find($row->id);
						@endphp
						<div class="row mt-3">
							<div class="col-md-3">
								<img src="{{asset('images/products/' . $product->images()->mainImage(1)->name)}}" style="width:100px; height:120px; " alt="IMG">
							</div>
							<div class="col-md-4">
								<ul>
									<li>İsim : {{$product->name}}</li>
									<li>Fiyat : <span class="simge-tl">&#8378;</span> {{$product->price}} </li>
									<li>Beden : {{$row->options->size['size_name']}} </li>
									<li>Renk : {{$row->options->color['color_name']}} </li>
									<li>Adet : {{$row->qty}} </li>
								</ul>
							</div>
						</div>
						<input type="number" name="product_human_id[]" value="{{$product->product_id}}" hidden>
						<input type="number" name="product_id[]" value="{{$product->id}}" hidden>
						<input type="text" name="product_name[]" value="{{$product->name}}" hidden>
						<input type="number" name="product_price[]" value="{{$product->price}}" hidden>
						<input type="number" name="product_qty[]" value="{{$row->qty}}" hidden>
						<input type="number" name="qty_price[]" value="{{$row->price}}" hidden>
						<input type="number" name="product_color[]" value="{{$row->options->color['color_id']}}" hidden>
						<input type="number" name="product_size[]" value="{{$row->options->size['size_id']}}" hidden>
					@endforeach
					<div class="row">
						<div class="col-sm-10 col-lg-12 col-xl-12 mt-2">
							<div class="p-lr-40 p-t-30 m-r-40 m-lr-0-xl p-lr-15-sm">
								<h4 class="mtext-109 cl2 p-b-30">
									{{__('views.shop.cart_totals')}}
								</h4>

								<div class="flex-w flex-t bor12 p-b-13">
									<div class="size-208">
										<span class="stext-110 cl2">
											{{__('views.shop.sub_totals')}}

										</span>
									</div>

									<div class="size-209">
										<span class="mtext-110 cl2">
											<span class="simge-tl">&#8378;</span>{{Cart::subtotal()}}
										</span>
									</div>
								</div>

								<div class="flex-w flex-t bor12 p-t-15 p-b-30">
									<div class="size-208 w-full-ssm">
										<span class="stext-110 cl2">
											{{__('views.shop.shipping')}}

										</span>
									</div>

									<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
										<p class="stext-111 cl6 p-t-2">
											Ürünlerimiz MNG kargo ile Gönderilmektedir
											Kapıda Ödeme - <span class="simge-tl">&#8378;</span>8 dahil değildir.

										</div>
									</div>

									<div class="flex-w flex-t p-t-27 p-b-33">
										<div class="size-208">
											<span class="mtext-101 cl2">
												<p>	{{__('views.shop.cart_tax')}}</p>
											</span>
											<span class="mtext-101 cl2 mt-2">
												<p  class="mt-2">	{{__('views.shop.cart_total')}}</p>
											</span>
										</div>

										<div class="size-209 p-t-1">
											<span class="mtext-110 cl2">
											<span class="simge-tl">&#8378;</span><span class="tax">{{Cart::tax()}}</span></br>
											<p class="mt-2"><span class="simge-tl">&#8378;</span><span class="total">{{Cart::total()}}</span></p>
											</span>

										</div>
									</div>
									<p>
										@include('partials._messages')

										<p><input type="checkbox" class="online-payment-contract" name="payment_checkbox" value="1" data-parsley-checkmin="1" id="checkbox" data-parsley-required="true" data-parsley-trigger="click">
											 <a href="#ex1" data-toggle="modal"  class="cl10" rel="modal:open">Mesafeli Satış Sözleşmesi'ni Onaylıyorum</a></p>
								</div>
							</div>
							<div class="modal fade form-spacing-top" style="padding-top:100px;" id="ex1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <h5 class="modal-title" id="exampleModalLabel"></h5>
							      <div class="modal-body text-center">
											@include('shop::partials._online_selling_contract')
							        </div>
							      </div>
							    </div>
							  </div>
						</div>

						</p>
						{{Form::submit('Ödemeye Git',['class' => 'flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer mt-3', 'name' =>'submit']) }}
					{{Form::submit('Kapıda Ödeme',['class' => 'flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer mt-3' ,'name' =>'submit']) }}

						{{Form::close() }}
					</div>
				</div>

			</div>

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

			<!--===============================================================================================-->
			<script src="{{asset('modules/shop/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
			<!--===============================================================================================-->
			{{ Html::script(mix('assets/common/js/parsley.min.js')) }}
			{{ Html::script(mix('assets/common/js/i18n/parsley-tr.js')) }}
<script type="text/javascript">
var name = $('#checkbox1').parsley();
window.Parsley.on('field:error', function(evt) {
	 console.log('field error:' + evt.$element.attr('name'));
 })
 window.Parsley.on('field:success', function(evt) {
	 console.log('field success:' + evt.$element.attr('name'));
 })
 window.Parsley.on('field:validate', function(evt) {
	 console.log('field validate:' + evt.$element.attr('name'))
 })
 window.Parsley.on('field:validated', function(evt) {
	 console.log('field validated:' + evt.$element.attr('name'))
 })

</script>
</script>
			<script src="{{asset('modules/shop/vendor/animsition/js/animsition.min.js')}}"></script>
			<!--===============================================================================================-->
			<script src="{{asset('modules/shop/vendor/bootstrap/js/popper.js')}}"></script>
			<script src="{{asset('modules/shop/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
			<!--===============================================================================================-->
			<script src="{{asset('modules/shop/vendor/select2/select2.min.js')}}"></script>
			<script>
				$(".js-select2").each(function(){
					$(this).select2({
						minimumResultsForSearch: 20,
						dropdownParent: $(this).next('.dropDownSelect2')
					});
				})
			</script>
			<!--===============================================================================================-->
			<script src="{{asset('modules/shop/vendor/MagnificPopup/jquery.magnific-popup.min.js')}}"></script>
			<!--===============================================================================================-->
			<script src="{{asset('modules/shop/vendor/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>

			<script>

				$('.js-pscroll').each(function(){
					$(this).css('position','relative');
					$(this).css('overflow','hidden');
					var ps = new PerfectScrollbar(this, {
						wheelSpeed: 1,
						scrollingThreshold: 1000,
						wheelPropagation: false,
					});

					$(window).on('resize', function(){
						ps.update();
					})
				});


			</script>

			@include('shop::partials._account_city_javascript')

			<!--===============================================================================================-->
			<script src="{{asset('modules/shop/js/main.js')}}"></script>

		@endsection
