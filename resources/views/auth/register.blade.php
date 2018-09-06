@extends('auth.layouts.auth')

@section('body_class','register')

@section('content')
<div>
  <div class="login_wrapper">
    <div class="animate form">
      <section class="login_content">
        {{ Form::open(['route' => ['register'],'data-parsley-validate' => '']) }}
        <h1>{{ __('views.auth.register.header') }}</h1>
        <div>
          <input type="text" name="name" class="form-control"
          placeholder="{{ __('views.auth.register.input_0') }}"
          value="{{ old('name') }}" required autofocus/>
        </div>
        <div>
          <input type="email" name="email" class="form-control"
          placeholder="{{ __('views.auth.register.input_1') }}"
          required/>
        </div>
        <div>
          <input type="password" name="password" class="form-control"
          placeholder="{{ __('views.auth.register.input_2') }}"
          minlength="6" required=""/>
        </div>
        <div>
          <input type="password" name="password_confirmation" class="form-control"
          placeholder="{{ __('views.auth.register.input_3') }}"
          minlength="6" required/>
        </div>

        @if (session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
        @endif

        @if (!$errors->isEmpty())
          <div class="alert alert-danger" role="alert">
            {!! $errors->first() !!}
          </div>
        @endif


        <!-- Link to open the modal -->
        <p><input type="checkbox" name="" value="" data-parsley-checkmin="1" id="checkbox" data-parsley-required="true" data-parsley-trigger="click"> <a href="#ex1" rel="modal:open">Kullanıcı Sözleşmesi</a></p>

        @if(config('auth.captcha.registration'))
          @captcha()
        @endif

        <div>
          <button type="submit"
          class="btn btn-default submit">{{ __('views.auth.register.action_1') }}</button>
        </div>

        <div class="clearfix"></div>

        <div class="separator">
          <p class="change_link">{{ __('views.auth.register.message') }}
            <a href="{{ route('login') }}" class="to_register"> {{ __('views.auth.register.action_2') }} </a>
          </p>

          <div class="clearfix"></div>
          <br/>

          <div>
            <div class="h1">{{ config('app.name') }}</div>
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. {{ __('views.auth.register.copyright_0') }}</p>
            <p>{{ __('views.auth.register.copyright_1') }}</p>
          </div>
        </div>
        {{ Form::close() }}
      </section>
      <!-- Modal HTML embedded directly into document -->
      <div id="ex1" class="modal">
        <p><h2>SİTE KULLANIM ŞARTLARI</h2>
          <p>Lütfen sitemizi kullanmadan evvel bu ‘site kullanım şartları’nı dikkatlice okuyunuz.
            Bu alışveriş sitesini kullanan ve alışveriş yapan müşterilerimiz aşağıdaki şartları kabul etmiş varsayılmaktadır:
            Sitemizdeki web sayfaları ve ona bağlı tüm sayfalar  petitstore.web.tr adresindeki Dilan Giyim firmasının (Firma) malıdır ve onun tarafından işletilir. Sizler (‘Kullanıcı’) sitede sunulan tüm hizmetleri kullanırken aşağıdaki şartlara tabi olduğunuzu, sitedeki hizmetten yararlanmakla ve kullanmaya devam etmekle; Bağlı olduğunuz yasalara göre sözleşme imzalama hakkına, yetkisine ve hukuki ehliyetine sahip ve 18 yaşın üzerinde olduğunuzu, bu sözleşmeyi okuduğunuzu, anladığınızı ve sözleşmede yazan şartlarla bağlı olduğunuzu kabul etmiş sayılırsınız. </p>

            <p>İşbu sözleşme taraflara sözleşme konusu site ile ilgili hak ve yükümlülükler yükler ve taraflar işbu sözleşmeyi kabul ettiklerinde bahsi geçen hak ve yükümlülükleri eksiksiz, doğru, zamanında, işbu sözleşmede talep edilen şartlar dâhilinde yerine getireceklerini beyan ederler.
            </p>

            <p><h4>1. SORUMLULUKLAR</h4></p>

            <p>a.Firma, fiyatlar ve sunulan ürün ve hizmetler üzerinde değişiklik yapma hakkını her zaman saklı tutar.</p>
            <p>b.Firma, üyenin sözleşme konusu hizmetlerden, teknik arızalar dışında yararlandırılacağını kabul ve taahhüt eder.</p>
            <p>c.Kullanıcı, sitenin kullanımında tersine mühendislik yapmayacağını ya da bunların kaynak kodunu bulmak veya elde etmek amacına yönelik herhangi bir başka işlemde bulunmayacağını aksi halde ve 3. Kişiler nezdinde doğacak zararlardan sorumlu olacağını, hakkında hukuki ve cezai işlem yapılacağını peşinen kabul eder. </p>
            <p>d.Kullanıcı, site içindeki faaliyetlerinde, sitenin herhangi bir bölümünde veya iletişimlerinde genel ahlaka ve adaba aykırı, kanuna aykırı, 3. Kişilerin haklarını zedeleyen, yanıltıcı, saldırgan, müstehcen, pornografik, kişilik haklarını zedeleyen, telif haklarına aykırı, yasa dışı faaliyetleri teşvik eden içerikler üretmeyeceğini, paylaşmayacağını kabul eder. Aksi halde oluşacak zarardan tamamen kendisi sorumludur ve bu durumda ‘Site’ yetkilileri, bu tür hesapları askıya alabilir, sona erdirebilir, yasal süreç başlatma hakkını saklı tutar. Bu sebeple yargı mercilerinden etkinlik veya kullanıcı hesapları ile ilgili bilgi talepleri gelirse paylaşma hakkını saklı tutar.</p>
            <p>e.Sitenin üyelerinin birbirleri veya üçüncü şahıslarla olan ilişkileri kendi sorumluluğundadır. </p>

            <p><h4>2. Fikri Mülkiyet Hakları</h4></p>

            <p>2.1. İşbu Site’de yer alan ünvan, işletme adı, marka, patent, logo, tasarım, bilgi ve yöntem gibi tescilli veya tescilsiz tüm fikri mülkiyet hakları site işleteni ve sahibi firmaya veya belirtilen ilgilisine ait olup, ulusal ve uluslararası hukukun koruması altındadır. İşbu Site’nin ziyaret edilmesi veya bu Site’deki hizmetlerden yararlanılması söz konusu fikri mülkiyet hakları konusunda hiçbir hak vermez.</p>
            <p>2.2. Site’de yer alan bilgiler hiçbir şekilde çoğaltılamaz, yayınlanamaz, kopyalanamaz, sunulamaz ve/veya aktarılamaz. Site’nin bütünü veya bir kısmı diğer bir internet sitesinde izinsiz olarak kullanılamaz.</p>

            <p><h4>3. Gizli Bilgi</h4></p>
            <p>3.1. Firma, site üzerinden kullanıcıların ilettiği kişisel bilgileri 3. Kişilere açıklamayacaktır. Bu kişisel bilgiler; kişi adı-soyadı, adresi, telefon numarası, cep telefonu, e-posta adresi gibi Kullanıcı’yı tanımlamaya yönelik her türlü diğer bilgiyi içermekte olup, kısaca ‘Gizli Bilgiler’ olarak anılacaktır.</p>

            <p>3.2. Kullanıcı, sadece tanıtım, reklam, kampanya, promosyon, duyuru vb. pazarlama faaliyetleri kapsamında kullanılması ile sınırlı olmak üzere, Site’nin sahibi olan firmanın kendisine ait iletişim, portföy durumu ve demografik bilgilerini iştirakleri ya da bağlı bulunduğu grup şirketleri ile paylaşmasına muvafakat ettiğini kabul ve beyan eder. Bu kişisel bilgiler firma bünyesinde müşteri profili belirlemek, müşteri profiline uygun promosyon ve kampanyalar sunmak ve istatistiksel çalışmalar yapmak amacıyla kullanılabilecektir.</p>

            <p>3.3. Gizli Bilgiler, ancak resmi makamlarca usulü dairesinde bu bilgilerin talep edilmesi halinde ve yürürlükteki emredici mevzuat hükümleri gereğince resmi makamlara açıklama yapılmasının zorunlu olduğu durumlarda resmi makamlara açıklanabilecektir.</p>

            <p>4. Garanti Vermeme: İŞBU SÖZLEŞME MADDESİ UYGULANABİLİR KANUNUN İZİN VERDİĞİ AZAMİ ÖLÇÜDE GEÇERLİ OLACAKTIR. FİRMA TARAFINDAN SUNULAN HİZMETLER "OLDUĞU GİBİ” VE "MÜMKÜN OLDUĞU” TEMELDE SUNULMAKTA VE PAZARLANABİLİRLİK, BELİRLİ BİR AMACA UYGUNLUK VEYA İHLAL ETMEME KONUSUNDA TÜM ZIMNİ GARANTİLER DE DÂHİL OLMAK ÜZERE HİZMETLER VEYA UYGULAMA İLE İLGİLİ OLARAK (BUNLARDA YER ALAN TÜM BİLGİLER DÂHİL) SARİH VEYA ZIMNİ, KANUNİ VEYA BAŞKA BİR NİTELİKTE HİÇBİR GARANTİDE BULUNMAMAKTADIR.</p>

            <p><h4>5. Kayıt ve Güvenlik</h4></p>
            <p>Kullanıcı, doğru, eksiksiz ve güncel kayıt bilgilerini vermek zorundadır. Aksi halde bu Sözleşme ihlal edilmiş sayılacak ve Kullanıcı bilgilendirilmeksizin hesap kapatılabilecektir.</p>
            <p>Kullanıcı, site ve üçüncü taraf sitelerdeki şifre ve hesap güvenliğinden kendisi sorumludur. Aksi halde oluşacak veri kayıplarından ve güvenlik ihlallerinden veya donanım ve cihazların zarar görmesinden Firma sorumlu tutulamaz.</p>

            <p><h4>6. Mücbir Sebep</h4></p>

            <p>Tarafların kontrolünde olmayan; tabii afetler, yangın, patlamalar, iç savaşlar, savaşlar, ayaklanmalar, halk hareketleri, seferberlik ilanı, grev, lokavt ve salgın hastalıklar, altyapı ve internet arızaları, elektrik kesintisi gibi sebeplerden (aşağıda birlikte "Mücbir Sebep” olarak anılacaktır.) dolayı sözleşmeden doğan yükümlülükler taraflarca ifa edilemez hale gelirse, taraflar bundan sorumlu değildir. Bu sürede Taraflar’ın işbu Sözleşme’den doğan hak ve yükümlülükleri askıya alınır.</p>

            <p><h4>7. Sözleşmenin Bütünlüğü ve Uygulanabilirlik</h4></p>

            <p>İşbu sözleşme şartlarından biri, kısmen veya tamamen geçersiz hale gelirse, sözleşmenin geri kalanı geçerliliğini korumaya devam eder.</p>

            <p><h4>8. Sözleşmede Yapılacak Değişiklikler</h4></p>

            <p>Firma, dilediği zaman sitede sunulan hizmetleri ve işbu sözleşme şartlarını kısmen veya tamamen değiştirebilir. Değişiklikler sitede yayınlandığı tarihten itibaren geçerli olacaktır. Değişiklikleri takip etmek Kullanıcı’nın sorumluluğundadır. Kullanıcı, sunulan hizmetlerden yararlanmaya devam etmekle bu değişiklikleri de kabul etmiş sayılır.</p>

            <p><h4>9. Tebligat</h4></p>
            <p>İşbu Sözleşme ile ilgili taraflara gönderilecek olan tüm bildirimler, Firma’nın bilinen e.posta adresi ve kullanıcının üyelik formunda belirttiği e.posta adresi vasıtasıyla yapılacaktır. Kullanıcı, üye olurken belirttiği adresin geçerli tebligat adresi olduğunu, değişmesi durumunda 5 gün içinde yazılı olarak diğer tarafa bildireceğini, aksi halde bu adrese yapılacak tebligatların geçerli sayılacağını kabul eder.</p>

            <p><h4>10. Delil Sözleşmesi</h4></p>
            <p>Taraflar arasında işbu sözleşme ile ilgili işlemler için çıkabilecek her türlü uyuşmazlıklarda Taraflar’ın defter, kayıt ve belgeleri ile ve bilgisayar kayıtları ve faks kayıtları 6100 sayılı Hukuk Muhakemeleri Kanunu uyarınca delil olarak kabul edilecek olup, kullanıcı bu kayıtlara itiraz etmeyeceğini kabul eder.</p>

            <p><h4>11. Uyuşmazlıkların Çözümü</h4></p>
            <p>İşbu Sözleşme’nin uygulanmasından veya yorumlanmasından doğacak her türlü uyuşmazlığın çözümünde İstanbul (Merkez) Adliyesi Mahkemeleri ve İcra Daireleri yetkilidir.</p>
          </p>

          <p><h4>12. ÖDEME</h4></p>
          <p>_Müşteri (son kullanıcı), ödeme yöntemine, üyeliğine ve siparişine ilişkin bilgilerin, ödemenin gerçekleştirilebilmesi ve ödeme usulsüzlüklerinin önlenmesi, araştırılması ve tespit edilmesini temin amacıyla iyzico Ödeme Hizmetleri A.Ş.’ye aktarılmasına ve iyzico tarafından https://www.iyzico.com/gizlilik-politikasi/ adresindeki Gizlilik Politikası’nın en güncel halinde açıklandığı şekilde işlenmesine ve saklanmasına rıza göstermektedir.</p>
          <a href="#" rel="modal:close">Kapat</a>
        </div>
      </div>
    </div>
  </div>
@endsection
<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
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
@section('styles')
  @parent
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

  {{ Html::style(mix('assets/auth/css/register.css')) }}
@endsection
