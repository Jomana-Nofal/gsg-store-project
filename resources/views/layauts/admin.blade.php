<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>@yield('title', '')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('adminAssets/css/bootstrap.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('adminAssets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="{{ asset('adminAssets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('adminAssets/css/style-responsive.css') }}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="{{ route('home') }}" class="logo"><b>Admin Conrtoll Panel</b></a>
            <!--logo end-->
           
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                <x-lang-switcher />
                <a href="{{route('cart.index')}}"><i class="glyphicon glyphicon-shopping-cart cart"></i></a>
                    @if(Auth::check())
                    <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf   
                        <a class="" href="route('logout')"onclick="event.preventDefault();
                            this.closest('form').submit();"> <button class="btn btn-dark" style="background-color:black;
                            color: white;
                            margin-top: 10px;">logout</button></a>                
                    </form>
                    </li>
                </ul>
            </div>
                    @else
                    <div class="btn-group auth-group">
                        <button class="btn btn-m dropdown-toggle registration" data-toggle="dropdown">Registrgation</button>
                        <ul class="dropdown-menu">
                            <li><a class="logout" href="{{route('login')}}">login</a></li>
                            <li><a class="logout" href="{{url('/register')}}">register</a></li>
                         </ul>
                    </div>
                    <!-- <li><a class="logout btn btn-dark" href="{{route('login')}}">login</a></li>
                    <li><a class="logout btn btn-dark" href="{{url('/register')}}">register</a></li> -->
                @endif
            	
        </header>

        
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                
              
              	  @if(Auth::check())
                    <p class="centered"><a href=""><img src="{{asset('adminAssets/img/ui-sam.jpg') }}" class="img-circle" width="60"></a></p>
              	  <h5 class="centered">{{Auth::user()->name}}</h5>	
                  @endif  

                  <li class="mt" style="font-size:20px;">
                    <a href="{{ route('user.products') }}">
                        <i class="fa fa-dashboard"></i>
                        <span class="span">Product Store</span>
                    </a>
                  </li>
                  @if(Auth::check())
                  
                  @if(Auth::user()->type == 'admin')
                  <li class="mt">
                      <a href="{{ route('categories.index') }}">
                          <i class="fa fa-dashboard"></i>
                          <span>Category Index</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="{{ route('categories.create') }}" >
                          <i class="fa fa-desktop"></i>
                          <span>Create Category</span>
                      </a>
                      
                  </li>

        
                 
                  <li class="sub-menu">
                      <a href="{{ route('product.index') }}" >
                          <i class="fa fa-desktop"></i>
                          <span>Product Index</span>
                      </a>
                      
                  </li>

                  <li class="sub-menu">
                      <a href="{{ route('products.create') }}" >
                          <i class="fa fa-desktop"></i>
                          <span>Create Product</span>
                      </a>
                      
                  </li>
                  <li class="sub-menu">
                      <a href="{{ route('roles.index') }}" >
                          <i class="fa fa-desktop"></i>
                          <span>Role Index</span>
                      </a>
                      
                  </li>
                  @endif
                  @if(Auth::user()->type == 'super admin')
                  <li class="sub-menu">
                      <a href="{{ route('roles.create') }}" >
                          <i class="fa fa-desktop"></i>
                          <span>Create Role</span>
                      </a>
                      
                  </li>
                 @endif
                
                @endif
               
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i>  @yield('pageTitle','')</h3>
              
            <div class="status">
            @yield('status')
            </div>

          	<div class="row mt">
          		<div class="col-lg-12">
                  @yield('content')
          		</div>
          	</div>
			
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              @2021 - Jomana Nofal
              <a href="blank.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{asset('adminAssets/js/jquery.js')}}"></script>
    <script src="{{asset('adminAssets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('adminAssets/js/jquery-ui-1.9.2.custom.min.js')}}"></script>
    <script src="{{asset('adminAssets/js/jquery.ui.touch-punch.min.js')}}"></script>
    <script class="include" type="text/javascript" src="{{asset('adminAssets/js/jquery.dcjqaccordion.2.7.js')}}"></script>
    <script src="{{asset('adminAssets/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{asset('adminAssets/js/jquery.nicescroll.js')}}" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="{{asset('adminAssets/js/common-scripts.js')}}"></script>

    <!--script for this page-->
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
