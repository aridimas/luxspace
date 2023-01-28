<!DOCTYPE html>
<html class="no-js" lang="">
  <head>
    <meta charset="utf-8" />
    <title>LuxSpace</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="@foreach ($sitesetting as $name){{ $name->site_name }}"/>@endforeach
    <meta name="description" content="@foreach ($sitesetting as $description){{ $description->site_description }}"/>@endforeach
    <meta property="og:url" content="www.luxspace.com" />
    <meta property="og:image" content="@foreach ($sitesetting as $thumbnail){{ $thumbnail->thumbnail_url }}"/>@endforeach
    <meta property="og:image:alt" content="@foreach ($sitesetting as $name){{ $name->site_name }}"/>@endforeach
    <!-- TYPE BELOW IS PROBABLY: 'website' or 'article' or look on https://ogp.me/#types -->
    <meta property="og:type" content='website'/>

    <link rel="manifest" href="site.webmanifest" />
    <link rel="apple-touch-icon" href="@foreach ($sitesetting as $icon){{ $icon->icon_url }}"/>@endforeach
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="{{url('/frontend/css/app.css')}}" />
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{url('/frontend/css/bootstrap.min.css')}}"type="text/css" media="all"/>
  <link rel="stylesheet" href="{{url('/frontend/css/settings.css')}}" type="text/css" media="all"/>
  <link rel="stylesheet" href="{{url('/frontend/css/prettyPhoto.css')}}" type="text/css" media="all" />
  <link rel="stylesheet" href="{{url('/frontend/css/magnific-popup.css')}}" type="text/css" media="all" />
  <link rel="stylesheet" href="{{url('/frontend/css/font-awesome.min.')}}css" type="text/css" media="all" />
  <link rel="stylesheet" href="{{url('/frontend/css/elegantIcon.css')}}" type="text/css" media="all"/>
  <link rel="stylesheet" href="{{url('/frontend/css/owl.carousel.css')}}" type="text/css" media="all" />
  <link rel="stylesheet" href="{{url('/frontend/css/owl.theme.css')}}" type="text/css" media="all" />
  <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800" rel="stylesheet">
  <link rel="stylesheet" href="{{url('/frontend/css/style.css')}}" type="text/css" media="all"/>
  <link rel="stylesheet" href="{{url('css/custom.css')}}" type="text/css" media="all"/>
    <link rel="icon" href="{{url('/storage/icon/icon.jpg')}}" />

    <meta name="theme-color" content="#000" />
    <link rel="icon" href="{{url('/storage/icon/icon.jpg')}}">
    <link href="{{url('/frontend/css/app.minify.css')}}" rel="stylesheet">
  </head>

  <body>
    <!-- Add your site or application content here -->

    @include('components.frontend.navbar')

    @yield('content')

    @include('components.frontend.footer')

    

    <!-- START: LOAD SVG -->
    <!-- <svg width="23" height="26" class="hidden" id="icon-play">
      <path
        d="M21 9.536c2.667 1.54 2.667 5.39 0 6.928l-15 8.66c-2.667 1.54-6-.385-6-3.464V4.34C0 1.26 3.333-.664 6 .876l15 8.66z"
        fill="#fff"
      />
    </svg> -->
    <!-- END: LOAD SVG  -->

    <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
    <script>
      window.ga = function () {
        ga.q.push(arguments);
      };
      ga.q = [];
      ga.l = +new Date();
      ga("create", "UA-XXXXX-Y", "auto");
      ga("set", "anonymizeIp", true);
      ga("set", "transport", "beacon");
      ga("send", "pageview");
    </script>
    <script src="https://www.google-analytics.com/analytics.js" async></script>
  <script src="{{url('/frontend/js/app.js')}}"></script>
  
  <script  src="{{url('/frontend/js/jquery.min.js')}}"></script>
  <script  src="{{url('/frontend/js/jquery-migrate.min.js')}}"></script>
  <script  src="{{url('/frontend/js/bootstrap.min.js')}}"></script>
  <script  src="{{url('/frontend/js/jquery.themepunch.tools.min.js')}}"></script>
  <script  src="{{url('/frontend/js/jquery.themepunch.revolution.min.js')}}"></script>
  <script  src="{{url('/frontend/js/modernizr-2.7.1.min.js')}}"></script>
  <script  src="{{url('/frontend/js/jquery.prettyPhoto.js')}}"></script>
  <script  src="{{url('/frontend/js/jquery.prettyPhoto.init.min.js')}}"></script>
  <script  src="{{url('/frontend/js/jquery.magnific-popup.js')}}"></script>
  <script  src="{{url('/frontend/js/off-cavnas.js')}}"></script>
  <script  src="{{url('/frontend/js/imagesloaded.pkgd.min.js')}}"></script>
  <script  src="{{url('/frontend/js/isotope.pkgd.min.js')}}"></script>
  <script  src="{{url('/frontend/js/owl.carousel.min.js')}}"></script>
  <script  src="{{url('/frontend/js/jquery.countdown.min.js')}}"></script>
  <script  src="{{url('/frontend/js/script.js')}}"></script>

  <script  src="{{url('/frontend/js/extensions/revolution.extension.video.min.js')}}"></script>
  <script  src="{{url('/frontend/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
  <script  src="{{url('/frontend/js/extensions/revolution.extension.actions.min.js')}}"></script>
  <script  src="{{url('/frontend/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
  <script  src="{{url('/frontend/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
  <script  src="{{url('/frontend/js/extensions/revolution.extension.navigation.min.js')}}"></script>
  <script  src="{{url('/frontend/js/extensions/revolution.extension.migration.min.js')}}"></script>
  <script  src="{{url('/frontend/js/extensions/revolution.extension.parallax.min.js')}}"></script>
 </body>
</html>
