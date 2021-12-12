<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Blood camp |  @yield('title') </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="{{asset('bloodFile/img/logo/logo_b.jpg')}}">

		<!-- CSS here -->
            <link rel="stylesheet" href="{{asset('bloodFile/css/bootstrap.min.css')}}">
            <link rel="stylesheet" href="{{asset('bloodFile/css/owl.carousel.min.css')}}">
            <link rel="stylesheet" href="{{asset('bloodFile/css/ticker-style.css')}}">
            <link rel="stylesheet" href="{{asset('bloodFile/css/flaticon.css')}}">
            <link rel="stylesheet" href="{{asset('bloodFile/css/slicknav.css')}}">
            <link rel="stylesheet" href="{{asset('bloodFile/css/animate.min.css')}}">
            <link rel="stylesheet" href="{{asset('bloodFile/css/magnific-popup.css')}}">
            <link rel="stylesheet" href="{{asset('bloodFile/css/fontawesome-all.min.css')}}">
            <link rel="stylesheet" href="{{asset('bloodFile/css/themify-icons.css')}}">
            <link rel="stylesheet" href="{{asset('bloodFile/css/slick.css')}}">
            <link rel="stylesheet" href="{{asset('bloodFile/css/nice-select.css')}}">
            <link rel="stylesheet" href="{{asset('bloodFile/css/style.css')}}">
			
			<script src="https://kit.fontawesome.com/f2ffc9d9df.js" crossorigin="anonymous"></script>

			<style type="text/css">
			.search{
				padding: 7px 22px;
				background: #007bff;
				border:#007bff;
				border-radius: 6px;
				color: white;
				float:right;
			}
			
			.search:hover{
				background: #2890ff;
				border:#2890ff;
				border-radius: 6px;
			}
			.searchbar{
				    width: 82% !important;
					float: left;
			}
			
			.logo{
				width: 65px;
				height: 73px;
			}
			.branda{
				color: #b90a00;
				font-size: 37px;
				font-family: fantasy;
			}
			.brandb{
				color: #28a745;
				font-size: 37px;
				font-family: fantasy;
			}
			.login{
				color: #28a745;
				font-family: cursive;
				font-size: 20px;
			}
			.login:hover{
				color: #28a745;
				font-family: cursive;
				font-size: 20px;
			}
			
			.userPic{
				width: 48px !important;
				height: 48px;
				border-radius: 50%;
				border: 1px solid #ddd;
			}
			.logout{
				    background: #ff4141 !important;
			}
			
			
			
			@yield('style')
			
			</style>
			
			
   </head>

   <body>
       
    <!-- Preloader Start -->
    <!-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{asset('bloodFile/img/logo/logo.png')}}" alt="">
                </div>
            </div>
        </div>
    </div> -->
    <!-- Preloader Start -->

    <header>
        <!-- Header Start -->
       <div class="header-area">
            <div class="main-header ">
                <div class="header-top black-bg d-none d-md-block">
                   <div class="container">
                       <div class="col-xl-12">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="header-info-left">
                                    <ul>     
                                        <li><img src="{{asset('bloodFile/img/icon/header_icon1.png')}}" alt=""><?php echo date('l').', '.' '.date('d').'-'.date('m').'-'.date('y') ?></li>
                                    </ul>
                                </div>
                                <div class="header-info-right">
                                    <ul class="header-social">    
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                       <li> <a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                       </div>
                   </div>
                </div>
                <div class="header-mid d-none d-md-block">
                   <div class="container">
                        <div class="row d-flex align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-3 col-lg-3 col-md-3">
                                <div class="logodiv">
                                    <a href="/"><img class="logo" src="{{asset('bloodFile/img/logo/logo_b.png')}}" alt=""> <span class="branda" >Blood</span><span class="brandb" >Camp</span></a>
                                </div>
                            </div>
                            <div class="mt-2 col-xl-6 col-lg-6 col-md-6">
							
<!--							  <input type="text" class="form-control searchbar" placeholder="search" aria-label="Recipient's username" aria-describedby="basic-addon2">
							  
							  <input  type="button" value="Search" class="ml-1 search"/>
 -->						</div>
							
							
                            <div class="col-xl-3 col-lg-3 col-md-3">
                                <div class="header-banner f-right ">
						 @if(Sentinel::check())
						 
							 <a class="login" href="/profile/{{Sentinel::getUser()->code}}">
							<img class="userPic" src="{{asset('image/'.Sentinel::getUser()->image)}}" alt="" />
                            {{Sentinel::getUser()->name}}</a>
						@else
							<img class="userPic" src="{{asset('image/user.png')}}" alt="" />
							<a class="login" href="/login">Login or sign in</a>
						@endif 
                                </div>
								
                            </div>
                        </div>
                   </div>
                </div>
               <div class="header-bottom header-sticky">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-10 col-lg-10 col-md-12 header-flex">
                                <!-- sticky -->
									
                                <div class="sticky-logo  logodiv">
                                    <a href="/"><img class="logo" src="{{asset('bloodFile/img/logo/logo_b.png')}}" alt=""> <span class="branda" >Blood</span><span class="brandb" >Camp</span></a>
                                </div>
                                <!-- Main-menu -->
                                <div class="main-menu d-none d-md-block">
                                    <nav>                  
                                        <ul id="navigation">    
                                            <li><a href="/">Home</a></li>
                                            <li><a href="/post">Public post</a></li>
                                            <li><a href="/apply-blood"> You need blood ?</a></li>
                                            <li><a href="">Blood</a>
                                                <ul class="submenu">
                                                    <li><a href="/join-blood-doner">Join a blood doner</a></li>
                                                    <li><a href="/logout"> Aply for blood</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="/contact">Contact</a></li>
											
						 @if(Sentinel::check())
							 
                                            <li><a href="#">Your profile</a>
                                                <ul class="submenu">
                                                    <li><a href="/">view profile</a></li>
                                                    <li><a href="/logout"><i class="fas fa-sign-out-alt"> </i> Logout</a></li>
                                                </ul>
                                            </li>
						@endif 
											
											
                                        </ul>
                                    </nav>
                                </div>
                            </div>             
                            <div class="col-xl-2 col-lg-2 col-md-4">
                                <div class="header-right-btn f-right d-none d-lg-block">
								
							 
                                   <a href="/apply-blood" type="button" value="Logout" class="ml-1 logout search"> Apply for blood </a>
								
								
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-md-none"></div>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
       </div>
        <!-- Header End -->
    </header>

	
	
	
	
	
	
	
