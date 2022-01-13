<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="author" content="{{getSystemSetting('type_name') ?? 'Manyvendor'}}">
  <meta name="keywords" content="@yield('keywords')">
  <meta name="description" content="{{getSystemSetting('type_name') ?? 'Manyvendor'}}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ getSystemSetting('type_name') }} @yield('title')</title>
  <link rel="icon" href="{{filePath(getSystemSetting('favicon_icon'))}}">
  {{-- css goes here --}}
  @include('frontend.assets.css')
  <script src="{{ asset('frontend/js/wow.min.js') }}"></script>

  {{-- Google translate --}}
  <script>
    "use strict"
        // This is google translate Scripts

        function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
        }

        // Minified Scripts
        (function(){var gtConstEvalStartTime = new Date();/*

        */
        function d(b){var a=document.getElementsByTagName("head")[0];a||(a=document.body.parentNode.appendChild(document.createElement("head")));a.appendChild(b)}function _loadJs(b){var a=document.createElement("script");a.type="text/javascript";a.charset="UTF-8";a.src=b;d(a)}function _loadCss(b){var a=document.createElement("link");a.type="text/css";a.rel="stylesheet";a.charset="UTF-8";a.href=b;d(a)}function _isNS(b){b=b.split(".");for(var a=window,c=0;c<b.length;++c)if(!(a=a[b[c]]))return!1;return!0}
        function _setupNS(b){b=b.split(".");for(var a=window,c=0;c<b.length;++c)a.hasOwnProperty?a.hasOwnProperty(b[c])?a=a[b[c]]:a=a[b[c]]={}:a=a[b[c]]||(a[b[c]]={});return a}window.addEventListener&&"undefined"==typeof document.readyState&&window.addEventListener("DOMContentLoaded",function(){document.readyState="complete"},!1);
        if (_isNS('google.translate.Element')){return}(function(){var c=_setupNS('google.translate._const');c._cest = gtConstEvalStartTime;gtConstEvalStartTime = undefined;c._cl='en';c._cuc='googleTranslateElementInit';c._cac='';c._cam='';c._ctkk='440335.1449305758';var h='translate.googleapis.com';var s=(true?'https':window.location.protocol=='https:'?'https':'http')+'://';var b=s+h;c._pah=h;c._pas=s;c._pbi=b+'/translate_static/img/te_bk.gif';c._pci=b+'/translate_static/img/te_ctrl3.gif';c._pli=b+'/translate_static/img/loading.gif';c._plla=h+'/translate_a/l';c._pmi=b+'/translate_static/img/mini_google.png';c._ps=b+'/translate_static/css/translateelement.css';c._puh='translate.google.com';_loadCss(c._ps);_loadJs(b+'/translate_static/js/element/main.js');})();})();
  </script>

  {{-- custom css goes here --}}
  @yield('css')

  {{-- VERSION 2.6 --}}
  @include('frontend.assets.color')
  {{-- VERSION 2.6::END --}}
</head>


<script defer>

// WOW JS
new WOW().init();


  /**
   * Preloader
   */

  "use strict"

  $(window).on("load", function () {
    var preLoder = $(".preloader");
    preLoder.fadeOut(1000);
  });
</script>

<body>
 @include('frontend.include.preloader')

  <div id="fb-root"></div>
  {{--this for facebook sdk--}}
  <script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v7.0&appId=2307155716247033&autoLogAppEvents=1"
    nonce="TSPkAQLi"></script>


  {{--  ajax url--}}
  @include('frontend.assets.url')

  {{-- main header --}}
  @include('frontend.include.header.header')
  {{-- mobile header --}}
  @include('frontend.include.header.mobile-header')
  {{-- shopping cart --}}
  @include('frontend.include.cart.shopping-cart')
  {{-- mobile sidebar --}}
  @include('frontend.include.sidebar.mobile.mobile-sidebar')

  {{-- content goes here::START --}}
  @yield('content')
  {{-- content goes here::END --}}

  {{-- footer --}}
  @include('frontend.include.footer.footer')

  {{-- script goes here --}}
  @include('frontend.assets.js')

  {{-- custom js goes here --}}
  @yield('js')

  {{--login modal--}}
  @include('frontend.widgets.popup.login_modal')

  <div class="modal fade" id="product-quickview" tabindex="-1" role="dialog" aria-labelledby="product-quickview"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <a href="javascript:void(0)" id="modelClose" class="modal-close" data-dismiss="modal">
          <i class="icon-cross2"></i>
        </a>

      </div>
    </div>
  </div>

  @include('backend.layouts.includes.model')

  @include('sweetalert::alert')



  


</body>


</html>