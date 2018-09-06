@extends('shop::layouts.master')
@section('shop_styles')
  {{ Html::style(mix('assets/common/css/parsley.css')) }}
  @section('title','İADE VE İPTAL |')
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

          <h2 class="mt-5">TÜKETİCİ HAKLARI – CAYMA – İPTAL İADE KOŞULLARI</h2>

          <h2 class="mt-3">GENEL:</h2>

          <p class="mt-3">1.Kullanmakta olduğunuz web sitesi üzerinden elektronik ortamda sipariş verdiğiniz takdirde, size sunulan ön bilgilendirme formunu ve mesafeli satış sözleşmesini kabul etmiş sayılırsınız.</p>
          <p>2.Alıcılar, satın aldıkları ürünün satış ve teslimi ile ilgili olarak 6502 sayılı Tüketicinin Korunması Hakkında Kanun ve Mesafeli Sözleşmeler Yönetmeliği (RG:27.11.2014/29188) hükümleri ile yürürlükteki diğer yasalara tabidir.</p>
          <p>3.Ürün sevkiyat masrafı olan kargo ücretleri alıcılar tarafından ödenecektir.</p>
          <p>4.Satın alınan her bir ürün, 30 günlük yasal süreyi aşmamak kaydı ile  alıcının gösterdiği adresteki kişi ve/veya kuruluşa teslim edilir. Bu süre içinde ürün teslim edilmez ise,  Alıcılar sözleşmeyi sona erdirebilir.</p>
          <p>5.Satın alınan ürün, eksiksiz ve siparişte belirtilen niteliklere uygun ve varsa garanti belgesi, kullanım klavuzu gibi belgelerle teslim edilmek zorundadır.</p>
          <p>6.Satın alınan ürünün satılmasının imkansızlaşması durumunda, satıcı bu durumu öğrendiğinden itibaren 3 gün içinde yazılı olarak alıcıya bu durumu bildirmek zorundadır. 14 gün içinde de toplam bedel Alıcı’ya iade edilmek zorundadır.</p>

          <h4 class="mt-3">SATIN ALINAN ÜRÜN BEDELİ ÖDENMEZ İSE:</h4>
          <p class="mt-2">7.Alıcı, satın aldığı ürün bedelini ödemez veya banka kayıtlarında iptal ederse, Satıcının ürünü teslim yükümlülüğü sona erer.</p>

          <h4 class="mt-3">KREDİ KARTININ YETKİSİZ KULLANIMI İLE YAPILAN ALIŞVERİŞLER:</h4>
          <p class="mt-2">8.Ürün teslim edildikten sonra, alıcının ödeme yaptığı kredi kartının yetkisiz kişiler tarafından haksız olarak kullanıldığı tespit edilirse ve satılan ürün bedeli ilgili banka veya finans kuruluşu tarafından Satıcı'ya ödenmez ise, Alıcı, sözleşme konusu ürünü 3 gün içerisinde nakliye gideri SATICI’ya ait olacak şekilde SATICI’ya iade etmek zorundadır.
          </p>
          <h4 class="mt-3">ÖNGÖRÜLEMEYEN SEBEPLERLE ÜRÜN SÜRESİNDE TESLİM EDİLEMEZ İSE:</h4>
          <p class="mt-2">9.Satıcı’nın öngöremeyeceği mücbir sebepler oluşursa ve ürün süresinde teslim edilemez ise, durum Alıcı’ya bildirilir. Alıcı, siparişin iptalini, ürünün benzeri ile değiştirilmesini veya engel ortadan kalkana dek teslimatın ertelenmesini talep edebilir. Alıcı siparişi iptal ederse; ödemeyi nakit ile yapmış ise iptalinden itibaren 14 gün içinde kendisine nakden bu ücret ödenir. Alıcı, ödemeyi kredi kartı ile yapmış ise ve iptal ederse, bu iptalden itibaren yine 14 gün içinde ürün bedeli bankaya iade edilir, ancak bankanın alıcının hesabına 2-3 hafta içerisinde aktarması olasıdır.
          </p>
          <h4 class="mt-3">ALICININ ÜRÜNÜ KONTROL ETME YÜKÜMLÜLÜĞÜ:</h4>
          <p class="mt-2">10.Alıcı, sözleşme konusu mal/hizmeti teslim almadan önce muayene edecek; ezik, kırık, ambalajı yırtılmış vb. hasarlı ve ayıplı mal/hizmeti kargo şirketinden teslim almayacaktır. Teslim alınan mal/hizmetin hasarsız ve sağlam olduğu kabul edilecektir. ALICI , Teslimden sonra mal/hizmeti özenle korunmak zorundadır. Cayma hakkı kullanılacaksa mal/hizmet kullanılmamalıdır. Ürünle birlikte Fatura da iade edilmelidir.
          </p>
          <h4 class="mt-3">CAYMA HAKKI:</h4>
          <p class="mt-2">11.ALICI; satın aldığı ürünün kendisine veya gösterdiği adresteki kişi/kuruluşa teslim tarihinden itibaren 14 (on dört) gün içerisinde, SATICI’ya aşağıdaki iletişim bilgileri üzerinden bildirmek şartıyla hiçbir hukuki ve cezai sorumluluk üstlenmeksizin ve hiçbir gerekçe göstermeksizin malı reddederek sözleşmeden cayma hakkını kullanabilir.
          </p>
          <h3 class="mt-3">12.SATICININ CAYMA HAKKI BİLDİRİMİ YAPILACAK İLETİŞİM BİLGİLERİ:<h3></h3>
            <p class="mt-2">ŞİRKET</p>
            <p>ADI / UNVANI: DİLAN GİYİM UĞUR MÜSLİM</p>
            <p>ADRES:  TOMTOM MAHALLESİ İSTİKLAL CADDESİ BEYOĞLU İŞ MERKEZİ NO : 187 / 58 BEYOĞLU / İSTANBUL</p>
            <p>EPOSTA: ugur.muslim@gmail.com</p>
            <p>TEL:  +90 532 640 56 18</p>
            <p>FAKS: +9 0212 245 48 52</p>

            <h4 class="mt-3">CAYMA HAKKININ SÜRESİ:</h4>
            <p class="mt-2">13.Alıcı, satın aldığı eğer bir hizmet  ise, bu 14 günlük süre sözleşmenin imzalandığı tarihten itibaren başlar. Cayma hakkı süresi sona ermeden önce, tüketicinin onayı ile hizmetin ifasına başlanan hizmet sözleşmelerinde cayma hakkı kullanılamaz.</p>
            <p>14.Cayma hakkının kullanımından kaynaklanan masraflar SATICI’ ya aittir.</p>
            <p>15.Cayma hakkının kullanılması için 14 (ondört) günlük süre içinde SATICI' ya iadeli taahhütlü posta, faks veya eposta ile yazılı bildirimde bulunulması ve ürünün işbu sözleşmede düzenlenen "Cayma Hakkı Kullanılamayacak Ürünler" hükümleri çerçevesinde kullanılmamış olması şarttır.</p>

            <h4 class="mt-3">CAYMA HAKKININ KULLANIMI:</h4>
            <p class="mt-2">16.3. kişiye veya ALICI’ ya teslim edilen ürünün faturası, (İade edilmek istenen ürünün faturası kurumsal ise, iade ederken kurumun düzenlemiş olduğu iade faturası ile birlikte gönderilmesi gerekmektedir. Faturası kurumlar adına düzenlenen sipariş iadeleri İADE FATURASI kesilmediği takdirde tamamlanamayacaktır.)</p>
            <p>17.İade formu, İade edilecek ürünlerin kutusu, ambalajı, varsa standart aksesuarları ile birlikte eksiksiz ve hasarsız olarak teslim edilmesi gerekmektedir.
            </p>
            <h4 class="mt-3">İADE KOŞULLARI:</h4>
            <p class="mt-2">18.SATICI, cayma bildiriminin kendisine ulaşmasından itibaren en geç 10 günlük süre içerisinde toplam bedeli ve ALICI’yı borç altına sokan belgeleri ALICI’ ya iade etmek ve 20 günlük süre içerisinde malı iade almakla yükümlüdür.</p>
            <p>19.ALICI’ nın kusurundan kaynaklanan bir nedenle malın değerinde bir azalma olursa veya iade imkânsızlaşırsa ALICI kusuru oranında SATICI’ nın zararlarını tazmin etmekle yükümlüdür. Ancak cayma hakkı süresi içinde malın veya ürünün usulüne uygun kullanılması sebebiyle meydana gelen değişiklik ve bozulmalardan ALICI sorumlu değildir.</p>
            <p>20.Cayma hakkının kullanılması nedeniyle SATICI tarafından düzenlenen kampanya limit tutarının altına düşülmesi halinde kampanya kapsamında faydalanılan indirim miktarı iptal edilir.
            </p>
            <h4 class="mt-3">CAYMA HAKKI KULLANILAMAYACAK ÜRÜNLER:</h4>
            <p class="mt-2">21.ALICI’nın isteği veya açıkça kişisel ihtiyaçları doğrultusunda hazırlanan ve geri gönderilmeye müsait olmayan, iç giyim alt parçaları, mayo ve bikini altları, makyaj malzemeleri, tek kullanımlık ürünler, çabuk bozulma tehlikesi olan veya son kullanma tarihi geçme ihtimali olan mallar, ALICI’ya teslim edilmesinin ardından ALICI tarafından ambalajı açıldığı takdirde iade edilmesi sağlık ve hijyen açısından uygun olmayan ürünler, teslim edildikten sonra başka ürünlerle karışan ve doğası gereği ayrıştırılması mümkün olmayan ürünler, Abonelik sözleşmesi kapsamında sağlananlar dışında, gazete ve dergi gibi süreli yayınlara ilişkin mallar, Elektronik ortamda anında ifa edilen hizmetler veya tüketiciye anında teslim edilen gayrimaddi mallar, ile ses veya görüntü kayıtlarının, kitap, dijital içerik, yazılım programlarının, veri kaydedebilme ve veri depolama cihazlarının, bilgisayar sarf malzemelerinin, ambalajının ALICI tarafından açılmış olması halinde iadesi Yönetmelik gereği mümkün değildir. Ayrıca Cayma hakkı süresi sona ermeden önce, tüketicinin onayı ile ifasına başlanan hizmetlere ilişkin cayma hakkının kullanılması da Yönetmelik gereği mümkün değildir.
            </p>
            <p>22.Kozmetik ve kişisel bakım ürünleri, iç giyim ürünleri, mayo, bikini, kitap, kopyalanabilir yazılım ve programlar, DVD, VCD, CD ve kasetler ile kırtasiye sarf malzemeleri (toner, kartuş, şerit vb.) iade edilebilmesi için ambalajlarının açılmamış, denenmemiş, bozulmamış ve kullanılmamış olmaları gerekir.
            </p>
            <h4 class="öt-3">TEMERRÜT HALİ VE HUKUKİ SONUÇLARI</h4>
            <p class="mt-2">23.ALICI, ödeme işlemlerini  kredi kartı ile yaptığı durumda temerrüde düştüğü takdirde, kart sahibi banka ile arasındaki kredi kartı sözleşmesi çerçevesinde faiz ödeyeceğini ve bankaya karşı sorumlu olacağını kabul, beyan ve taahhüt eder. Bu durumda ilgili banka hukuki yollara başvurabilir; doğacak masrafları ve vekâlet ücretini ALICI’dan talep edebilir ve her koşulda ALICI’nın borcundan dolayı temerrüde düşmesi halinde, ALICI, borcun gecikmeli ifasından dolayı SATICI’nın uğradığı zarar ve ziyanını ödeyeceğini kabul eder.
            </p>
            <h4 class="mt-3">ÖDEME VE TESLİMAT</h4>
            <p class="mt-2">24.Banka Havalesi veya EFT (Elektronik Fon Transferi) yaparak, YAPI KREDİ, bankası hesaplarımızdan (TL) herhangi birine yapabilirsiniz.</p>
            <p>25.Sitemiz üzerinden kredi kartlarınız ile, Her türlü kredi kartınıza online tek ödeme ya da online taksit imkânlarından yararlanabilirsiniz. Online ödemelerinizde siparişiniz sonunda kredi kartınızdan tutar çekim işlemi gerçekleşecektir.
            </p>
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
