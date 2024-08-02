<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from portotheme.com/html/porto_ecommerce/demo23.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 03:04:51 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Porto - Bootstrap eCommerce Template</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Porto - Bootstrap eCommerce Template">
    <meta name="author" content="SW-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('images/icons/favicon.png') }}">


    <script>
        WebFontConfig = {
            google: {
                families: ['Open+Sans:300,400,600,700,800', 'Poppins:200,300,400,500,600,700,800',
                    'Oswald:300,400,500,600,700,800', 'Nanum+Brush+Script:400,700,800'
                ]
            }
        };
        (function(d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = '{{ asset('js/webfont.js') }}';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('lib/bootstrap.css') }}"> --}}

    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('css/demo23.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
</head>

<body>
    <div class="page-wrapper">
        <div class="top-notice font2">
            <div class="container-fluid text-center text-dark">
                <i class="icon-shipping align-middle"></i><b class="text-uppercase">Free Shipping</b>&nbsp;on orders of
                $80 or more!
                Code:&nbsp;<b class="text-uppercase">PortoMagic</b>&nbsp;| Restrictions Apply.&nbsp;<a
                    href="demo23-shop.html" class="text-dark">See All Offers</a>
            </div>
            <button title="Close (Esc)" type="button" class="mfp-close">×</button>
        </div>

        @include('frontend.header.header')

        <main class="main">

            @if ($showBanner)
                @include('frontend.header.banner')
                @include('frontend.header.welcome')

                @include('frontend.header.cats')
            @endif

            <div class="products-container appear-animate" data-animation-name="fadeIn" data-animation-delay="200">
                <div class="container">
                    @yield('content')

                    {{-- end row --}}
                </div>
            </div>

            @include('frontend.body.brands')
        </main><!-- End .main -->

        @include('frontend.footer.footer')
    </div><!-- End .page-wrapper -->

    @include('frontend.footer.mbmenu')

    <!-- Plugins JS File -->
    <script data-cfasync="false" src="{{ asset('cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}">
    </script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/plugins.min.js') }}"></script>
    <script src="{{ asset('js/optional/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('js/jquery.plugin.min.js') }}"></script>


    <!-- Main JS File -->
    <script src="{{ asset('js/main.min.js') }}"></script>
</body>


<!-- Mirrored from portotheme.com/html/porto_ecommerce/demo23.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 03:05:19 GMT -->

</html>
