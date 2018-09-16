<?php

namespace Modules\Cart\Http\Controllers;


require (base_path('vendor/iyzico/iyzipay-php/IyzipayBootstrap.php'));
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Cart\Entities\Onlineorder;
use Modules\Cart\Emails\SendSaleSuccess;
use Modules\Cart\Emails\AdminSaleSuccess;
use Session;
use Mail;
use Auth;
use Modules\Product\Entities\Product;
use Modules\Cart\Entities\Payment;
use App\Models\Auth\User\User;
use Cart;

class CheckoutController extends Controller
{
  /**
  * Display a listing of the resource.
  * @return Response
  */
  public function index()
  {
    if(!Auth::user()){
      return redirect()->route('login')->withError('Önce Kayıt olun veya giriş yapın');
    }
    $user = User::find(Auth::user()->id);
    if(!$user->accounts) {
      return redirect()->route('account.create')->withError("Adres Bilgilerinizin olması Gerekli");
    }
    return view('cart::checkout.index')->withUser($user);
  }

  /**
  * Show the form for creating a new resource.
  * @return Response
  */

  public function checkoutRequest(Request $request) {
    $post = $request;

    ####################### DÜZENLEMESİ ZORUNLU ALANLAR #######################
    #
    ## API Entegrasyon Bilgileri - Mağaza paneline giriş yaparak BİLGİ sayfasından alabilirsiniz.
    $merchant_key 	= 'ng6rd4NDRtEnPiWj';
    $merchant_salt	= 'cRJ3xzTbCG85fWo9';
    ###########################################################################

    ####### Bu kısımda herhangi bir değişiklik yapmanıza gerek yoktur. #######
    #
    ## POST değerleri ile hash oluştur.
    $hash = base64_encode( hash_hmac('sha256', $post['merchant_oid'].$merchant_salt.$post['status'].$post['total_amount'], $merchant_key, true) );
    #
    ## Oluşturulan hash'i, paytr'dan gelen post içindeki hash ile karşılaştır (isteğin paytr'dan geldiğine ve değişmediğine emin olmak için)
    ## Bu işlemi yapmazsanız maddi zarara uğramanız olasıdır.
    if( $hash != $post['hash'] ) {
      die('PAYTR notification failed: bad hash');
      ###########################################################################
    }
    ## BURADA YAPILMASI GEREKENLER
    ## 1) Siparişin durumunu $post['merchant_oid'] değerini kullanarak veri tabanınızdan sorgulayın.
    ## 2) Eğer sipariş zaten daha önceden onaylandıysa veya iptal edildiyse  echo "OK"; exit; yaparak sonlandırın.

    /* Sipariş durum sorgulama örnek
    $durum = SQL
    if($durum == "onay" || $durum == "iptal"){
    echo "OK";
    exit;
  }
  */

  if( $post['status'] == 'success' ) { ## Ödeme Onaylandı

    $orders = Onlineorder::where('basketId',$post['merchant_oid'])->get();
    foreach($orders as $order) {
      $order->status = 1;
      $order->save();
      $order->productsale->statu = true;
      $order->productsale->save();
    }
    Mail::to(User::where('email','ugur.muslim@gmail.com')->first())->send(new AdminSaleSuccess($orders[0]->sale_package_id,$orders[0]->$adress_id));


    ## BURADA YAPILMASI GEREKENLER
    ## 1) Siparişi onaylayın.
    ## 2) Eğer müşterinize mesaj / SMS / e-posta gibi bilgilendirme yapacaksanız bu aşamada yapmalısınız.
    ## 3) 1. ADIM'da gönderilen payment_amount sipariş tutarı taksitli alışveriş yapılması durumunda
    ## değişebilir. Güncel tutarı $post['total_amount'] değerinden alarak muhasebe işlemlerinizde kullanabilirsiniz.

  } else { ## Ödemeye Onay Verilmedi

    ## BURADA YAPILMASI GEREKENLER
    ## 1) Siparişi iptal edin.
    ## 2) Eğer ödemenin onaylanmama sebebini kayıt edecekseniz aşağıdaki değerleri kullanabilirsiniz.
    ## $post['failed_reason_code'] - başarısız hata kodu
    ## $post['failed_reason_msg'] - başarısız hata mesajı

  }

  ## Bildirimin alındığını PayTR sistemine bildir.
  echo "OK";
  exit;

}
public function create(Request $request)
{
  /*  $request->validate(array(
  'payment_checkbox' => 'required',
  ));


  $user = User::find(Auth::user()->id);
  $shopPay = new Payment();
  if($request->submit == "Kapıda Ödeme") {
    $shopPay->paymentDoor($request);
    return view('cart::checkout.result');
  }
  else {
    $a = $shopPay->iyizipay($request);
    $payment_form = '<div id="iyzipay-checkout-form" class="popup"></div>';
    return view('cart::checkout.payment')->withPaymentform($payment_form);
  }*/

  $merchant_id 	= '121812';
  $merchant_key 	= 'ng6rd4NDRtEnPiWj';
  $merchant_salt	= 'cRJ3xzTbCG85fWo9';
  #
  $online_order = new Onlineorder;
  $basketId = 2;
  if(count($online_order->get())) {
    $basketId = $online_order->nextBasketId();
  }

  ## Müşterinizin sitenizde kayıtlı veya form vasıtasıyla aldığınız eposta adresi
  $email = $request->email;
  #
  ## Tahsil edilecek tutar.
  $payment_amount	= Cart::total() * 100; //9.99 için 9.99 * 100 = 999 gönderilmelidir.
  #
  ## Sipariş numarası: Her işlemde benzersiz olmalıdır!! Bu bilgi bildirim sayfanıza yapılacak bildirimde geri gönderilir.
  $merchant_oid = rand(1000,2000);
  #
  ## Müşterinizin sitenizde kayıtlı veya form aracılığıyla aldığınız ad ve soyad bilgisi
  $user_name = $request->name . $request->last_name;
  #
  ## Müşterinizin sitenizde kayıtlı veya form aracılığıyla aldığınız adres bilgisi
  $user_address = $request->adress;
  #
  ## Müşterinizin sitenizde kayıtlı veya form aracılığıyla aldığınız telefon bilgisi
  $user_phone = $request->phone;
  #
  ## Başarılı ödeme sonrası müşterinizin yönlendirileceği sayfa
  ## !!! Bu sayfa siparişi onaylayacağınız sayfa değildir! Yalnızca müşterinizi bilgilendireceğiniz sayfadır!
  ## !!! Siparişi onaylayacağız sayfa "Bildirim URL" sayfasıdır (Bakınız: 2.ADIM Klasörü).
  $merchant_ok_url = route('payment.success');
  #
  ## Ödeme sürecinde beklenmedik bir hata oluşması durumunda müşterinizin yönlendirileceği sayfa
  ## !!! Bu sayfa siparişi iptal edeceğiniz sayfa değildir! Yalnızca müşterinizi bilgilendireceğiniz sayfadır!
  ## !!! Siparişi iptal edeceğiniz sayfa "Bildirim URL" sayfasıdır (Bakınız: 2.ADIM Klasörü).
  $merchant_fail_url = route('payment.fail');
  #
  ## Müşterinin sepet/sipariş içeriği
  $basket = [];
  foreach(Cart::content() as $row) {
    $basket[] = ['Ürün Ad' => $row->name, 'Birim Fiyat' => $row->price, 'Adet'=>$row->qty];
    $payment = new Payment;
    $product_sale = $payment->saveProductSale($row,false);
    $online_order = new OnlineOrder;
    $adress_id = $request->adress_id;
    $online_order->createOrder($merchant_oid ,$adress_id,$product_sale);

  }
  $orders = Onlineorder::where('basketId',$merchant_oid)->get();
  Mail::to(User::where('id',$orders[0]->productsale->customer_id)->first())->send(new SendSaleSuccess($orders[0]->sale_package_id,$orders[0]->adress_id));
  Mail::to(User::where('email','ugur.muslim@gmail.com')->first())->send(new AdminSaleSuccess($orders[0]->sale_package_id,$orders[0]->adress_id));

  $user_basket = base64_encode(json_encode($basket));
  #
  /* ÖRNEK $user_basket oluşturma - Ürün adedine göre array'leri çoğaltabilirsiniz
  $user_basket = base64_encode(json_encode(array(
  array("Örnek ürün 1", "18.00", 1), // 1. ürün (Ürün Ad - Birim Fiyat - Adet )
  array("Örnek ürün 2", "33.25", 2), // 2. ürün (Ürün Ad - Birim Fiyat - Adet )
  array("Örnek ürün 3", "45.42", 1)  // 3. ürün (Ürün Ad - Birim Fiyat - Adet )
  )));
  */
  ############################################################################################
  ## Kullanıcının IP adresi
  if( isset( $_SERVER["HTTP_CLIENT_IP"] ) ) {
    $ip = $_SERVER["HTTP_CLIENT_IP"];
  } elseif( isset( $_SERVER["HTTP_CF_CONNECTING_IP"] ) ) {
    $ip = $_SERVER["HTTP_CF_CONNECTING_IP"];
  }  elseif( isset( $_SERVER["HTTP_X_FORWARDED_FOR"] ) ) {
    $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
  } else {
    $ip = $_SERVER["REMOTE_ADDR"];
  }

  ## !!! Eğer bu örnek kodu sunucuda değil local makinanızda çalıştırıyorsanız
  ## buraya dış ip adresinizi (https://www.whatismyip.com/) yazmalısınız. Aksi halde geçersiz paytr_token hatası alırsınız.
  $user_ip="88.235.39.173";
  ##
  ## İşlem zaman aşımı süresi - dakika cinsinden
  $timeout_limit = "30";

  ## Hata mesajlarının ekrana basılması için entegrasyon ve test sürecinde 1 olarak bırakın. Daha sonra 0 yapabilirsiniz.
  $debug_on = 1;

  ## Mağaza canlı modda iken test işlem yapmak için 1 olarak gönderilebilir.
  $test_mode = 1;

  $no_installment	= 1; // Taksit yapılmasını istemiyorsanız, sadece tek çekim sunacaksanız 1 yapın

  ## Sayfada görüntülenecek taksit adedini sınırlamak istiyorsanız uygun şekilde değiştirin.
  ## Sıfır (0) gönderilmesi durumunda yürürlükteki en fazla izin verilen taksit geçerli olur.
  $max_installment = 0;

  $currency = "TL";

  ####### Bu kısımda herhangi bir değişiklik yapmanıza gerek yoktur. #######
  $hash_str = $merchant_id .$user_ip .$merchant_oid .$email .$payment_amount .$user_basket.$no_installment.$max_installment.$currency.$test_mode;
  $paytr_token=base64_encode(hash_hmac('sha256',$hash_str.$merchant_salt,$merchant_key,true));
  $post_vals=array(
  'merchant_id'=>$merchant_id,
  'user_ip'=>$user_ip,
  'merchant_oid'=>$merchant_oid,
  'email'=>$email,
  'payment_amount'=>$payment_amount,
  'user_basket'=>$user_basket,
  'paytr_token'=>$paytr_token,
  'debug_on'=>$debug_on,
  'no_installment'=>$no_installment,
  'max_installment'=>$max_installment,
  'user_name'=>$user_name,
  'user_address'=>$user_address,
  'user_phone'=>$user_phone,
  'merchant_ok_url'=>$merchant_ok_url,
  'merchant_fail_url'=>$merchant_fail_url,
  'timeout_limit'=>$timeout_limit,
  'currency'=>$currency,
  'test_mode'=>$test_mode
  );





  $ch=curl_init();
  curl_setopt($ch, CURLOPT_URL, "https://www.paytr.com/odeme/api/get-token");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1) ;
  curl_setopt($ch, CURLOPT_POSTFIELDS, $post_vals);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
  curl_setopt($ch, CURLOPT_TIMEOUT, 20);
  $result = @curl_exec($ch);
  if(curl_errno($ch))
  die("PAYTR IFRAME connection error. err:".curl_error($ch));

  curl_close($ch);

  $result=json_decode($result,1);

  if($result['status']=='success') {
    $token=$result['token'];
    return view('cart::checkout.payment')->with('token',$token);
  }
  else {
    die("PAYTR IFRAME failed. reason:".$result['reason']);
    #########################################################################
  }
}

/**
* Store a newly created resource in storage.
* @param  Request $request
* @return Response
*/
public function store(Request $request)
{
}

/**
* Show the specified resource.
* @return Response
*/

public function success()
{
  $payment = new Payment;
  foreach(Cart::content() as $row) {
    $product = Product::find($row->id);
    $payment->decrementProductQuantity($product,$row);
    return view('cart::checkout.success');
  }
}

public function fail()
{
  return view('cart::checkout.fail');

}


public function show()
{
  return view('cart::show');
}

/**
* Show the form for editing the specified resource.
* @return Response
*/
public function edit()
{
  return view('cart::edit');
}

/**
* Update the specified resource in storage.
* @param  Request $request
* @return Response
*/
public function update(Request $request)
{
}

/**
* Remove the specified resource from storage.
* @return Response
*/
public function destroy()
{
}
}
