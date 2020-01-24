<!doctype html>
<html class="no-js" lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Pastel</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">
		
		<!-- all css here -->
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/slinky.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/ionicons.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/meanmenu.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/bundle.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
        <script src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    </head>

    <body>
    <!--div class="preloader">
    
    <svg width="200" height="200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-ripple" style="background:0 0"><circle cx="50" cy="50" r="4.719" fill="none" stroke="#1d3f72" stroke-width="2"><animate attributeName="r" calcMode="spline" values="0;40" keyTimes="0;1" dur="3" keySplines="0 0.2 0.8 1" begin="-1.5s" repeatCount="indefinite"/><animate attributeName="opacity" calcMode="spline" values="1;0" keyTimes="0;1" dur="3" keySplines="0.2 0 0.8 1" begin="-1.5s" repeatCount="indefinite"/></circle><circle cx="50" cy="50" r="27.591" fill="none" stroke="#5699d2" stroke-width="2"><animate attributeName="r" calcMode="spline" values="0;40" keyTimes="0;1" dur="3" keySplines="0 0.2 0.8 1" begin="0s" repeatCount="indefinite"/><animate attributeName="opacity" calcMode="spline" values="1;0" keyTimes="0;1" dur="3" keySplines="0.2 0 0.8 1" begin="0s" repeatCount="indefinite"/></circle></svg>
    
  </div-->
        <!-- header start -->
        <div class="wrapper">
        @guest
         <!-- Newsletter Popup Start -->
         <div class="popup_wrapper hidden-sm hidden-xs" id="modalLogin">
                <div class="test">
                    <span class="popup_off">Close</span>
                    <div class="subscribe_area text-center">
                        <h2>Abonnez-vous</h2>
                        <p>Connecter vous pour gagner des offres pastel</p>
                        <div id="mc_embed_signup" class="subscribe-bottom">
                            <form action="{{ url('login') }}" method="post" id="login" name="mc-embedded-subscribe-form" class="validate" >
                       
                        @csrf
                                <div id="mc_embed_signup_scroll" class="mc-form">
                                <input id="name" type="hidden" class="@error('name') is-invalid @enderror" placeholder="Enter your name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              
                                    <input id="tel" type="hidden" class="@error('tel') is-invalid @enderror mt-1" name="tel" value="{{ old('tel') }}" placeholder="Enter your phone number" required autocomplete="tel" autofocus>

                                @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                               
                                    <input type="email" class="email @error('email') is-invalid @enderror mt-1" placeholder="Enter your email address" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 
                                    <input id="adresse" type="hidden" class="@error('adresse') is-invalid @enderror mt-1" placeholder="Enter your address" name="adresse" value="{{ old('adresse') }}" required autocomplete="adresse" autofocus>

                                        @error('adresse')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                   
                                    <input id="password" type="password" name="password" class="mt-1 password @error('password') is-invalid @enderror" placeholder="Enter your password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror   
                                    
                                    <input id="password-confirm" type="hidden" class="mt-1 password" name="password_confirmation" placeholder="Confirm your password" required autocomplete="new-password">
                                    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                    <div class="mc-news" aria-hidden="true"><input type="text" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value=""></div>
                                    <div class="clear-2"><input type="submit" value="Connexion" name="Connexion" id="buttony" class="button"></div>
                                </div>
                            </form>
                        </div>
                        <div class="subscribe-bottom mt-15" id="buttonx">
                        <a class="myClickableThingy"  style="color:blue" onclick="register(1)">Inscription</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Newsletter Popup End -->
          @else
             
           @endguest
            <!-- sidebar-cart start -->
            <div class="sidebar-cart onepage-sidebar-area">
                <div class="wrap-sidebar">
                    <div class="sidebar-cart-all">
                        <div class="sidebar-cart-icon">
                            <button class="op-sidebar-close"><span class="ion-android-close"></span></button>
                        </div>
                        <div class="cart-content" >
                            <h3>Shopping Cart</h3>
                            <ul id="cartpastel">
                                




                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main-search start -->
            <div class="main-search-active">
                <div class="sidebar-search-icon">
                    <button class="search-close"><span class="ion-android-close"></span></button>
                </div>
                <div class="sidebar-search-input">
                    <form>
                        <div class="form-search">
                            <input id="search" class="input-text" value="" placeholder="Search Entire Store" type="search">
                            <button>
                                <i class="ion-ios-search-strong"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- main-search start -->
            <div class="cur-lang-acc-active">
                <div class="wrap-sidebar">
                    <div class="sidebar-nav-icon">
                        <button class="op-sidebar-close"><span class="ion-android-close"></span></button>
                    </div>
                    <div class="cur-lang-acc-all">
                        <div class="single-currency-language-account">
                            <div class="cur-lang-acc-title">
                                <h4>Currency: <span>DH </span></h4>
                            </div>
                            <div class="cur-lang-acc-dropdown">
                                <ul>
                                    <li><a href="#">Dirham  Marocain</a></li>
                                </ul>
                            </div>
                        </div>
                   
                        <div class="single-currency-language-account">
                            <div class="cur-lang-acc-title">
                                <h4>My Account:</h4>
                            </div>
                            <div class="cur-lang-acc-dropdown">
                                <ul>
                             
                                    <li><a href="register.html">register</a></li>
                                    <li><a href="wishlist.html">My Wish List</a></li>
                                    <li><a href="login.html">Sign In </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @yield('content')
            <header class="pl-155 pr-155 intelligent-header">
                <div class="header-area header-area-2">
                    <div class="container-fluid p-0">
                        <div class="row no-gutters">
                            <div class="col-lg-2 col-md-3 col-3">
                                <div class="logo">
                                    
                                    <h3 style="color:#fff"><a href="{{url('/')}}">Pastel</a></h3>
                                    
                                </div>
                            </div>
                            <div class="col-md-8 col-6 menu-none-block menu-center">
                          
                                <div class="main-menu">
                                    <nav>
                                       <ul>
                                       <li><a href="{{url('allproduct/')}}">Nouveautés</a></li>
                                        <li><a href="{{url('allproduct/')}}">best seller</a></li>
                                   <li><a href="{{url('allproduct/')}}">vernis</a></li>
                                   <li><a href="{{url('allproduct/')}}">lèvres</a></li>
                                   <li><a href="{{url('allproduct/')}}">teint</a></li>
                                   <li><a href="{{url('allproduct/')}}">yeux</a></li>
                                   <li><a href="{{url('allproduct/')}}">accessoires</a></li>
                                               
                                        </ul>
                                    </nav>
                                </div>
                            
                            </div>
                            <div class="col-lg-2 col-md-3 col-3 float-right">
                                <div class="header-search-cart">
                                <div class="header-search common-style">
                                        <button class="sidebar-trigger-search">
                                            <span class="ion-ios-search-strong"></span>
                                        </button>
                                    </div>
                                    <div class="header-cart common-style">
                                        <button class="sidebar-trigger" onclick="opencard()">
                                            <span class="ion-bag"></span>                               
                                        </button>
                                    </div>
                                    <div class="header-sidebar common-style">
                                    <div class="main-menu">
                                    <nav>
                                       <ul>
                                            <li>
                                        <button style=" background-color: Transparent;
    background-repeat:no-repeat;
    border: none;
    cursor:pointer;
    overflow: hidden;
    outline:none;">
                                            <span class="ion-person"></span>
                                        </button>
                                        
                                        <ul class="dropdown">
                                        @guest
          <li > <a class="myClickableThingy" onclick="$('.popup_wrapper').css({
            'opacity': '1',
            'visibility': 'visible'
             });">{{ __('Login') }}</a> </li>
          @else
          
          <li > <a id="navbarDropdown" class="nav-link " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" > {{ Auth::user()->name }} </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"> <a class="dropdown-item" href="{{ url('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> {{ __('Se déconnecter') }} </a>
              <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
          @endguest
                                                </ul>
                                    
                                    </li>
</ul>
</nav>
                                       
</div>          
                                    </div>
                                </div>
                            </div>
                            <div class="mobile-menu-area d-md-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none">
                                <div class="mobile-menu">
                                    <nav id="mobile-menu-active">
                                        <ul class="menu-overflow">
                                        <li><a href="{{url('allproduct/')}}">Nouveautés</a></li>
                                        <li><a href="{{url('allproduct/')}}">best seller</a></li>
                                   <li><a href="{{url('allproduct/')}}">vernis</a></li>
                                   <li><a href="{{url('allproduct/')}}">lèvres</a></li>
                                   <li><a href="{{url('allproduct/')}}">teint</a></li>
                                   <li><a href="{{url('allproduct/')}}">yeux</a></li>
                                   <li><a href="{{url('allproduct/')}}">accessoires</a></li>
                                       
                                        </ul>
                                    </nav>							
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="header-space"></div>
            <!-- header end --> 
            <footer class="footer-area gray-bg pt-20 pb-95">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-5 col-12">
                            <div class="footer-widget">
                                <div class="footer-widget-l-content">
                                    <h4>20 Years Experience</h4>
                                    <ul>
                                        <li><a href="#"><i class="ion-social-twitter"></i></a></li> 
                                        <li><a href="#"><i class="ion-social-tumblr"></i></a></li>
                                        <li><a href="#"><i class="ion-social-facebook"></i></a></li> 
                                        <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li> 
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-7 col-12">
                            <div class="footer-widget">
                                <div class="footer-widget-m-content text-center">
                                    <div class="footer-logo">
                                    <h1 style="color:#fff">Pastel</h1>
                                    </div>
                                    <div class="footer-nav">
                                        <nav>
                                            <ul>
                                                <li><a href="#">home</a></li>
                                                <li><a href="#">about us</a></li>
                                                <li><a href="#">shop </a></li>
                                                <li><a href="#"> blog </a></li>
                                                <li><a href="#">pages </a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <p>Copyright <i class="fa fa-copyright"></i> 2020 <a href="#" target="_blank" >Developped & designed by Smartmove.</a> All rights reserved. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-12">
                            <div class="footer-widget f-right">
                                <div class="footer-widget-r-content">
                                    <ul>
                                        <li><span>Phone :</span> +00 123 54 0056</li>
                                        <li><span>Email : </span> <a href="#">pastel@gmail.com</a></li>
                                        <li><span>Address :</span> Maroc</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="ion-android-close" aria-hidden="true"></span>
                </button>
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="qwick-view-left">
                                <div class="quick-view-learg-img">
                                    <div class="quick-view-tab-content tab-content">
                                        <div class="tab-pane active show fade" id="modal1" role="tabpanel">
                                            <img src="{{asset('assets/img/quick-view/l1.jpg')}}" alt="">
                                        </div>
                                        <div class="tab-pane fade" id="modal2" role="tabpanel">
                                            <img src="{{asset('assets/img/quick-view/l2.jpg')}}" alt="">
                                        </div>
                                        <div class="tab-pane fade" id="modal3" role="tabpanel">
                                            <img src="{{asset('assets/img/quick-view/l3.jpg')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="quick-view-list nav" role="tablist">
                                    <a class="active" href="#modal1" data-toggle="tab" role="tab" aria-selected="true" aria-controls="home1">
                                        <img src="{{asset('assets/img/quick-view/ls1.jpg')}}" alt="">
                                    </a>
                                    <a href="#modal2" data-toggle="tab" role="tab" aria-selected="false" aria-controls="home2">
                                        <img src="{{asset('assets/img/quick-view/s2.jpg')}}" alt="">
                                    </a>
                                    <a href="#modal3" data-toggle="tab" role="tab" aria-selected="false" aria-controls="home3">
                                        <img src="{{asset('assets/img/quick-view/s3.jpg')}}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="qwick-view-right">
                                <div class="qwick-view-content">
                                    <h3>Handcrafted Supper Mug</h3>
                                    <div class="price">
                                        <span class="new">$90.00</span>
                                        <span class="old">$120.00  </span>
                                    </div>
                                    <div class="rating-number">
                                        <div class="quick-view-rating">
                                            <i class="ion-ios-star red-star"></i>
                                            <i class="ion-ios-star red-star"></i>
                                            <i class="ion-android-star-outline"></i>
                                            <i class="ion-android-star-outline"></i>
                                            <i class="ion-android-star-outline"></i>
                                        </div>
                                        <div class="quick-view-number">
                                            <span>2 Ratting (S)</span>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do tempor incididun ut labore et dolore magna aliqua. Ut enim ad mi , quis nostrud veniam exercitation .</p>
                                    <div class="quick-view-select">
                                        <div class="select-option-part">
                                            <label>Color*</label>
                                            <select class="select">
                                                <option value="">- Please Select -</option>
                                                <option value="">orange</option>
                                                <option value="">pink</option>
                                                <option value="">yellow</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="quickview-plus-minus">
                                        <div class="cart-plus-minus">
											<input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
										</div>
                                        <div class="quickview-btn-cart">
                                            <a class="btn-hover-black" href="#">add to cart</a>
                                        </div>
                                        <div class="quickview-btn-wishlist">
                                            <a class="btn-hover" href="#"><i class="ion-ios-heart-outline"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
     
  
        </div>
		
		
		





        
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="ion-android-close" aria-hidden="true"></span>
                </button>
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="qwick-view-left">
                                <div class="quick-view-learg-img">
                                    <div class="quick-view-tab-content tab-content">
                                        <div class="tab-pane active show fade" id="modal1" role="tabpanel">
                                            <img src="asset('storage/'.$produit->photo)" alt="">
                                        </div>
                                        <div class="tab-pane fade" id="modal2" role="tabpanel">
                                            <img src="asset('storage/'.$produit->photo)" alt="">
                                        </div>
                                        <div class="tab-pane fade" id="modal3" role="tabpanel">
                                            <img src="asset('storage/'.$produit->photo)" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="quick-view-list nav" role="tablist">
                                    <a class="active" href="#modal1" data-toggle="tab" role="tab" aria-selected="true" aria-controls="home1">
                                        <img src="{{asset('assets/img/quick-view/ls1.jpg')}}" alt="">
                                    </a>
                                    <a href="#modal2" data-toggle="tab" role="tab" aria-selected="false" aria-controls="home2">
                                        <img src="{{asset('assets/img/quick-view/s2.jpg')}}" alt="">
                                    </a>
                                    <a href="#modal3" data-toggle="tab" role="tab" aria-selected="false" aria-controls="home3">
                                        <img src="{{asset('assets/img/quick-view/s3.jpg')}}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="qwick-view-right">
                                <div class="qwick-view-content">
                                    <h3>$produit->name</h3>
                                    <div class="price">
                                        <span class="new">$$produit->prix_initial</span>
                                        <span class="old">$120.00  </span>
                                    </div>
                                    <div class="rating-number">
                                        <div class="quick-view-rating">
                                            <i class="ion-ios-star red-star"></i>
                                            <i class="ion-ios-star red-star"></i>
                                            <i class="ion-android-star-outline"></i>
                                            <i class="ion-android-star-outline"></i>
                                            <i class="ion-android-star-outline"></i>
                                        </div>
                                        <div class="quick-view-number">
                                            <span>2 Ratting (S)</span>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do tempor incididun ut labore et dolore magna aliqua. Ut enim ad mi , quis nostrud veniam exercitation .</p>
                                    <div class="quick-view-select">
                                        <div class="select-option-part">
                                            <label>Color*</label>
                                            <select class="select">
                                                <option value="">- Please Select -</option>
                                                <option value="">orange</option>
                                                <option value="">pink</option>
                                                <option value="">yellow</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="quickview-plus-minus">
                                        <div class="cart-plus-minus">
											<input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
										</div>
                                        <div class="quickview-btn-cart">
                                            <a class="btn-hover-black" href="#">add to cart</a>
                                        </div>
                                        <div class="quickview-btn-wishlist">
                                            <a class="btn-hover" href="#"><i class="ion-ios-heart-outline"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
     
  
        </div>

       
        <div class="modal fade" id="modalNew" tabindex="-1" role="dialog" aria-hidden="true">
             
     
  
        </div>
		
		
		
		<!-- all js here -->
        <script src="{{asset('assets/js/vendor/jquery-1.12.0.min.js')}}"></script>
        <script src="{{asset('assets/js/popper.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>
        <script src="{{asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
        <script src="{{asset('assets/js/waypoints.min.js')}}"></script>
        <script src="{{asset('assets/js/slinky.min.js')}}"></script>
        <script src="{{asset('assets/js/ajax-mail.js')}}"></script>
        <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins.js')}}"></script>
        <script src="{{asset('assets/js/main.js')}}"></script>
        <script src="{{asset('assets/js/axios.js')}}"></script>
        <script>
  function opencard()
    {
        $.get('../getpanier/',function(data){
        $('#cartpastel').html(data);
        var menuTrigger = $('button.sidebar-trigger'),
        endTrigger = $('button.op-sidebar-close'),
        container = $('.sidebar-cart'),
        wrapper = $('.wrapper');
    
    wrapper.prepend('<div class="body-overlay"></div>');
    menuTrigger.on('click', function() {
        container.addClass('inside');
        wrapper.addClass('overlay-active');
    });
    
    endTrigger.on('click', function() {
        container.removeClass('inside');
        wrapper.removeClass('overlay-active');
    });
    
    $('.body-overlay').on('click', function() {
        container.removeClass('inside');
        wrapper.removeClass('overlay-active');
    });
      });
     
    }

    function deleteCart2(id){
                  $.get('../deletecart/'+id,function(data){
    if(data['error']==0){
        $( "#sptotal" ).html($( "#totalpan" ).val()-$( "#price"+id ).val()*$( "#qtepan"+id ).val());
        $( "#totalpan").val($( "#totalpan" ).val()-$( "#price"+id ).val()*$( "#qtepan"+id ).val());
        $( "#card"+id ).remove();

    }
		         });
            }

                  
           
    
            </script>
        @yield('vuejsscript')
    </body>
</html>
