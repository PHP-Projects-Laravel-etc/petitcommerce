<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
<!--
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-125905724-1"></script>
  <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-125905724-1');
  </script>

  <!-- Google Tag Manager -
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-P47RKGT');</script>
 End Google Tag Manager -->
<title>@yield('title') PETITSTORE</title>
<meta charset="UTF-8">
<meta name="description" content="Petit store kaliteli ürünleri ucuza bulabildiğiniz bir platformdur. Giyim , Aksesuar, Çanta kategorilerinde 100'den fazla ürün sizi bekliyor.">
<meta name="viewport" content="width=device-width, initial-scale=1">
@include('shop::partials._shopping_head')
@yield('shop_styles')
</head>
<body>
  <!-- Google Tag Manager (noscript)
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P47RKGT"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
End Google Tag Manager (noscript) -->
  @yield('content')

  @yield('shop_scripts')
  @include('shop::partials._cart_panel_delete_javascript')


  {{-- Laravel Mix - JS File --}}
  {{-- <script src="{{ mix('js/shop.js') }}"></script> --}}
</body>
</html>
