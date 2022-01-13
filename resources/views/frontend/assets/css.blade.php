<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700&amp;amp;subset=latin-ext"
    rel="stylesheet" async>
{{-- <link rel="stylesheet" href="{{ asset('frontend/plugins/font-awesome/css/font-awesome.css') }}"> --}}
<link async rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link async rel="stylesheet" href="{{ asset('frontend/fonts/Linearicons/Linearicons/Font/demo-files/demo.css') }}">
<link async rel="stylesheet" href="{{ asset('frontend/plugins/bootstrap4/css/bootstrap.css') }}">
<link async rel="stylesheet" href="{{ asset('frontend/plugins/owl-carousel/assets/owl.carousel.css') }}">
<link async rel="stylesheet" href="{{ asset('frontend/plugins/slick/slick/slick.css') }}">
<link async rel="stylesheet" href="{{ asset('frontend/plugins/jquery-ui/jquery-ui.css') }}">
<link async rel="stylesheet" href="{{ asset('frontend/css/util.css') }}">
<link async rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
<link async rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
<link async rel="stylesheet" href="{{ asset('frontend/css/market-place-3.css') }}">
<link async rel="stylesheet" href="{{asset('backend/plugins/sweetalert2/sweetalert2.css')}}">
<link async rel="stylesheet" href="{{asset('backend/plugins/toastr/toastr.css')}}">
<link async rel="stylesheet" href="{{asset('frontend/css/line-awesome.css')}}">
<link async rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
<link async rel="stylesheet" href="{{asset('frontend/css/version3.css')}}">



@if (config('manyvendor.border') == 'no-border')
    <link rel="stylesheet" href="{{asset('frontend/css/no-border.css')}}" async>
@endif

<style>
.color-active {
    color: {
            {
            getSystemSetting('secondary_color')
        }
    }

    ;
}

.translated-ltr {
    margin-top: -40px;
}

.translated-ltr {
    margin-top: -40px;
}

.goog-te-banner-frame {
    display: none;
    margin-top: -20px;
}

.goog-logo-link {
    display: none !important;
}

.goog-te-combo {
    /* color: red !important; */
}

.goog-te-gadget {
    color: transparent !important;
    /* margin-top: 20px; */
    position: absolute !important;
    top: -18px !important;
}

.google_translate_element{
    display: inline-block !important;
    position: absolute !important;
    top: -18px !important;
}

</style>
<script src="{{ asset('frontend/plugins/jquery.js') }}"></script>