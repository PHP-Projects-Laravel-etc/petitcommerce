@extends('shop::layouts.master')
@section('shop_styles')
  {{ Html::style(mix('assets/common/css/parsley.css')) }}
  @section('title','ÖDEME VE TESLİMAT |')
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
          <h1 class="mt-5">Ödeme ve Teslimat </h1>
            <div class="mt-3">1) Banka Havalesi veya EFT (Elektronik Fon Transferi) yaparak</div>
            <div>Yapı Kredi bankası hesabımıza yapabilirsiniz</div>
            <div><br />
            </div>
            <div>2) Sitemiz üzerinden kredi kartlarınız ile</div>
            <div>Her türlü kredi kartınıza online tek ödeme ya da taksit imkânlarımızdan yararlanabilirsiniz. Online ödemelerinizde siparişiniz sonunda kredi kartınızdan tutar çekim işlemi gerçekleşecektir. Muhtemel sipariş iptali veya stok sorunları nedeniyle sipariş iptallerinde kredi kartınıza para iadesi 3 iş günü içerisinde yapılacaktır.</div>
            <div><br />
            </div>
            <div>3) Sipariş Bedeli İadesi&nbsp;</div>
            <div>Siparişlerinizin olası sebeplerle iptali durumunda; Dilan Giyim Uğur Müslim Şirketi üç iş günü içerisinde ürün bedelini hesabınıza ve/veya kredi kartınıza iade eder. Ancak, banka hesap bilgilerinizi ve/veya kredi kartı bilgilerinizi doğru ve eksiksiz olarak şirketimiz finans yetkililerine bildirmeniz gerekmektedir.&nbsp;</div>
            <div><br />
            </div>
            <div>4) Teslimat&nbsp;</div>
            <div>Sipariş etmiş olduğunuz ürünleri aynı gün kargoya teslim etmeye gayret ediyoruz. Temini zaman alan ürünler için kargo teslim süresi ürün detayında belirtildiği gibi 3 iş günüdür. Gecikmesi muhtemel teslimat durumunda size bilgi verilecektir.&nbsp;</div>
            <div>Ürün teslimatının aksamadan gerçekleştirilebilmesi için lütfen gün içinde bulunduğunuz yerin adresini teslimat adresi olarak bildiriniz.&nbsp;</div>
            <div>Talepleriniz sipariş sonunda belirlemiş olduğunuz teslimat tipine göre hazırlanmak üzere işleme alınacaktır. İstanbul merkezli şirketimizden ürünler MNG kargo firmasıyla gönderilecektir. Siparişleriniz onaylandıktan sonra en geç 2 (iki) iş günü sonunda Kargo firmasına teslim edilir.&nbsp;</div>
            <div>Müşteri temsilcimize danışarak değişik teslimat şartları konusunda görüşebilirsiniz. Ayrıca kargo teslimatları sadece Türkiye için geçerlidir</div>
            <div><br />
            </div>
            <div>5) Ödeme Takibi&nbsp;</div>
            <div>Söz konusu sistem herhangi bir sorun nedeni ile işlemi gerçekleştiremiyorsa ödeme sayfası sonucunda ziyaretçimiz bu durumdan haberdar edilmektedir.&nbsp;</div>
            <div>Belirtilen adreste herhangi bir hata durumunda teslimatı gerçekleşemeyen sipariş ile ilgili olarak siparişi veren ile bağlantı kurulmaktadır.</div>
            <div>Ziyaretçimiz tarafından belirtilen e-posta adresinin geçerliliği siparişin aktarılmasını takiben gönderilen otomatik e-posta ile teyit edilmektedir.&nbsp;</div>
            <div>Teslimatın gerçekleşmesi konusunda müşteri kadar kredi kartı sistemini kullandığımız bankaya karşı da sorumluluğumuz söz konusudur.&nbsp;</div>
            <div>&nbsp;</div>
            <div>&nbsp;Lütfen dikkat ediniz!</div>
            <div>Sevkiyat sırasında zarar gördüğünü düşündüğünüz paketleri, teslim aldığınız firma yetkilisi önünde açıp kontrol ediniz. Eğer üründe herhangi bir zarar olduğunu düşünüyorsanız kargo firmasına tutanak tutturularak ürünü teslim almayınız.&nbsp;</div>
            <div>Ürün teslim alındıktan sonra kargo firmasının görevini tam olarak yerine getirdiği kabul edilmektedir.&nbsp;</div>
            <div>Ürün hasarlı ise: Hazırlamış olduğunuz tutanağı en kısa zamanda 0212 245 48 52 numaralı fax’a gönderin ve durumu ugur.muslim@gmail.com mail adresine bildiriniz.&nbsp;</div>
            <div>Bu işlemleri gerçekleştirdiğiniz takdirde paketinizle ilgili çalışmalara başlayarak, en kısa zamanda teslimatın tekrarlanmasını sağlayacağız.</div>
            <div>Bu e-posta içinde ürünü neden iade etmek istediğinizi kısaca açıklarsanız ürün ile ilgili çalışmalarımızda bize yardımcı olmuş olursunuz.</div>
            <div>&nbsp;</div>
            <div><br />
            </div>
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
