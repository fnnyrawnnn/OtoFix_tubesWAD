<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>Orders</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- bootstrap css -->
   <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
   <!-- style css -->
   <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}">
   <!-- Responsive-->
   <link rel="stylesheet" href="{{ URL::asset('assets/css/responsive.css') }}">
   <!-- fevicon -->
   <link rel="icon" href="{{ asset('assets/images/fevicon.png') }}" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="{{ asset('assets/css/jquery.mCustomScrollbar.min.css') }}">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
      media="screen">
   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
   <!-- loader  -->
   <div class="loader_bg">
      <div class="loader"><img src="{{ asset('assets/images/loading.gif') }}" alt="#" /></div>
   </div>
   <!-- end loader -->
   <!-- header -->
   <header>
      <!-- header inner -->
      <div class="header fixed-top">
         <div class="container-fluid">
            <div class="row">
               <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                  <div class="full">
                     <div class="center-desk">
                        <div class="logo">
                           <a href="index"><img src="{{ asset('assets/images/otofix_logo.png') }}" alt="#" style="width: 136px" /></a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                  <nav class="navigation navbar navbar-expand-md navbar-dark ">
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04"
                        aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                     </button>
                     <div class="collapse navbar-collapse" id="navbarsExample04">
                        <ul class="navbar-nav mr-auto">
                           <li class="nav-item">
                              <a class="nav-link" href="index"> Home </a>
                           </li>
                           <li class="nav-item active">
                              <a class="nav-link" href="orders">Orders</a>
                           </li>
                           @if (Route::has('login'))
                              @auth
                                 <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline"></a>
                              @else
                                 <li class="nav-item d_none">
                                    <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-user-circle padd_right"
                                          aria-hidden="true"></i>Login</a>
                                 </li>
                                 @if (Route::has('register'))
                                    <li class="nav-item d_none">
                                       <a class="nav-link" href="{{ route('register') }}"><i class="fa fa-user-circle padd_right"
                                             aria-hidden="true"></i>Register</a>
                                    </li>
                                    @else
                                    <li class="nav-item dropdown">
                                       <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                          Dropdown
                                       </a>
                                       <ul class="dropdown-menu">
                                          <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementbyId('logout-form').submit();">{{ __('Logout') }}</a></li>
                                       <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                          @csrf
                                       </form>
                                       </ul>
                                    </li>
                                 @endif
                              @endauth
                           @endif
                        </ul>
                     </div>
                  </nav>
               </div>
            </div>
         </div>
      </div>
   </header>
   <!-- end header inner -->
   <!-- end header -->

   <!-- testimonial -->
   <div class="wedo" style="margin: 120px 0px 60px 0px;">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="titlepage">
                  <h2>Orders</h2>
               </div>
            </div>
         </div>
         <div class="shell">
            <div class="container">
               <div class="row">
                  @foreach ($products as $prod)
                  <div class="col-md-3">
                     <div class="wsk-cp-product">
                        <div class="wsk-cp-img">
                           <img
                              src="{{ $prod->img }}"
                              alt="Product" class="img-responsive" />
                        </div>
                        <div class="wsk-cp-text">
                           <div class="category">
                              <a href="#" style="background-color: rgb(231, 187, 9);"><span>On Going</span></a>
                           </div>
                           <div class="title-product">
                              <h3>{{ $prod->name }}</h3>
                           </div>
                           <div class="description-prod">
                              <p>{{ $prod->services }}</p>
                           </div>
                           <div class="card-footer">
                              <div class="wcf-left"><span class="price" style="color:black;">Total: IDR 129.000</span></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
            </div>
         </div>
      </div>
   </div>

   </div>
   <!--  footer -->
   <footer id="contact">
      <div class="footer">
         <div class="copyright">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <p>Copyright 2022 All Right Reserved By OtoFix</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </footer>
   <!-- end footer -->
   <!-- Javascript files-->
   <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
   <script src="{{ asset('assets/js/popper.min.js') }}"></script>
   <script src="{{ asset('asset/js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ asset('assets/js/jquery-3.0.0.min.js') }}"></script>
   <!-- sidebar -->
   <script src="{{ asset('assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
   <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>