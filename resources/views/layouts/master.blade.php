<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>
     @yield('title')
</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.3.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" />
  <link href="{{ URL::asset('css/sales.css') }}" rel="stylesheet" />
  <link href="{{ URL::asset('css/all.min.css') }}" rel="stylesheet" />
  <link href="{{ URL::asset('css/datepicker.min.css') }}" rel="stylesheet" />
</head>
<style>
  .sidebar[data-color="orange"]:after, .off-canvas-sidebar[data-color="orange"]:after {
    background: #285381;
}
.active {
    color: #18ce0f!important;
    background: #fff!important;
}
.active i{
    color: #18ce0f!important;
}
</style>
<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        {{-- <a href="#" class="simple-text logo-mini">
          DS
        </a>
        <a href="#" class="simple-text logo-normal">
          ARS
        </a> --}}
        <img src="{{ asset('assets/images/ARS1.png') }}">

      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="/admin">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="/supplier">
              <i class="fas fa-user"></i>
              <p>suppliers</p>
            </a>
          </li>
          <li>
            <a href="#" data-toggle="collapse" data-target="#subcustomer">
              <i class="fas fa-users"></i>
              <p>Customers</p>
            </a>
            <div id="subcustomer" class="collapse">
                <ul>
                  <li>
                      <a href="/customer">
                          <i class="fas fa-user-plus"></i>
                          <p>Add Customer</p>
                      </a>
                  </li>
                  <li>
                      <a href="/rate_fixing">
                          <i class="fas fa-users"></i>
                          <p>Customer Rate Fixing</p>
                      </a>
                  </li>
                </ul>
              </div>
          </li>
          <li>

          </li>
          <li>
            <a href="#" data-toggle="collapse" data-target="#subproduct">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Create products</p>
              {{-- <div class="proarrow">
                  <i class="fas fa-chevron-left"></i>
              </div> --}}
            </a>
            <div id="subproduct" class="collapse">
              <ul>
              <li>
              <a href="/product_group">
                <i class="fas fa-object-group"></i>
                <p>Product Group</p>
              </a>
            </li>
            <li>
                <a href="/unit">
                  <i class="fab fa-buffer"></i>
                  <p>Unit</p>
                </a>
              </li>
              <li>
                  <a href="/products">
                    <i class="now-ui-icons design_bullet-list-67"></i>
                    <p>Add Product</p>
                  </a>
                </li>
              </ul>

            </div>
          </li>
          <li>
              <a href="#" data-toggle="collapse" data-target="#subtrip">
                <i class="fas fa-truck-loading"></i>
                <p>Create Trip</p>
              </a>
            <div id="subtrip" class="collapse">
              <ul>
                <li>
                    <a href="/trips">
                        <i class="fas fa-truck"></i>
                        <p>Create New Trip</p>
                    </a>
                </li>
                <li>
                    <a href="/set_trips">
                      <i class="fas fa-truck-moving"></i>
                      <p>Set Trip</p>
                    </a>
                </li>
              </ul>
            </div>
            </li>
          <li>
              <a href="#" data-toggle="collapse" data-target="#subbilling">
                <i class="fas fa-money-check"></i>
                <p>Bill Entry</p>
              </a>
              <div id="subbilling" class="collapse">
          <ul>
            <li>
                <a href="/purchase">
                  <i class="fas fa-file-invoice"></i>
                  <p>Purchase Entry</p>
                </a>
            </li>
            <li>
                <a href="/sales">
                  <i class="fas fa-file-invoice"></i>                  
                  <p>Sales Entry</p>
                </a>
            </li>
          </ul>
              </div>
            </li>
                      <li>
              <a href="#" data-toggle="collapse" data-target="#subpayment">
                <i class="fas fa-coins"></i>
                <p>Payment</p>
              </a>
              <div id="subpayment" class="collapse">
          <ul>
            <li>
                <a href="/payment-for-purchase">
                  <i class="fas fa-receipt"></i>
                  <p>Purchase</p>
                </a>
            </li>
            <li>
                <a href="/payment-for-sales">
                  <i class="fas fa-receipt"></i>                  
                  <p>Sales</p>
                </a>
            </li>
          </ul>
              </div>
            </li>
          <li>
            <a href="#">
              <i class="fas fa-truck-moving"></i>
              <p>Vechical information</p>
            </a>
          </li>
          <li>
            <a href="#" data-toggle="collapse" data-target="#subbank">
              <!-- <i class="fas fa-truck-moving"></i> -->
              <i class="fas fa-university"></i>
              <p>Bank details</p>
            </a>
            <div id="subbank" class="collapse">
              <ul>
                <li>
                    <a href="/bank-details">
                      <i class="fas fa-receipt"></i>
                      <p>Add Bank</p>
                    </a>
                </li>
<!--                 <li>
                    <a href="/debit">
                      <i class="fas fa-receipt"></i>                  
                      <p>Debit</p>
                    </a>
                </li> -->
                <li>
                    <a href="/transaction_details">
                      <i class="fas fa-receipt"></i>                  
                      <p>Bank Transaction</p>
                    </a>
                </li>
              </ul>
                  </div>
          </li>
            <li>
            <a href="#" data-toggle="collapse" data-target="#subcodlist">
              <i class="fas fa-hand-holding-usd"></i>
              <p>COD details</p>
            </a>
            <div id="subcodlist" class="collapse">
              <ul>
                <li>
                    <a href="/purchase_cod">
                      <i class="fas fa-receipt"></i>
                      <p>Purchase COD</p>
                    </a>
                </li>
                <li>
                    <a href="/sales_cod">
                      <i class="fas fa-receipt"></i>                  
                      <p>Sales COD</p>
                    </a>
                </li>
              </ul>
                  </div>


          </li>


          <li>
            <a href="/stock_details">
              <i class="fas fa-clipboard-list"></i>
              <p>Stock details</p>
            </a>
          </li>
          <li >
            <a href="#" data-toggle="collapse" data-target="#subreport">
              <i class="fas fa-file-alt"></i>
              <p>Purchase Report</p>
            </a>
            <div id="subreport" class="collapse">
              <ul>
                <li>
                    <a href="/consolidation">
                      <i class="fas fa-receipt"></i>
                      <p>Consolidation</p>
                    </a>
                </li>
                <li>
                    <a href="/report">
                      <i class="fas fa-receipt"></i>                  
                      <p>Day</p>
                    </a>
                </li>
                <li>
                    <a href="/month_and_week_report">
                      <i class="fas fa-receipt"></i>                  
                      <p>weekly & Monthly </p>
                    </a>
                </li>
              </ul>
                  </div>
          </li>
          <li >
            <a href="#" data-toggle="collapse" data-target="#subcustomerreport">
              <i class="fas fa-file-alt"></i>
              <p>Sales Report</p>
            </a>
            <div id="subcustomerreport" class="collapse">
              <ul>
                <li>
                    <a href="/sales_consolidation">
                      <i class="fas fa-receipt"></i>
                      <p>Consolidation</p>
                    </a>
                </li>
                <li>
                    <a href="/sales_day_report">
                      <i class="fas fa-receipt"></i>                  
                      <p>Day</p>
                    </a>
                </li>
                <li>
                    <a href="/sales_month_and_week_report">
                      <i class="fas fa-receipt"></i>                  
                      <p>weekly & Monthly </p>
                    </a>
                </li>
              </ul>
                  </div>
          </li>
          <li >
            <a href="#" data-toggle="collapse" data-target="#subpurchasepaymentreport">
              <i class="fas fa-file-alt"></i>
              <p>Purchase Payment Report</p>
            </a>
            <div id="subpurchasepaymentreport" class="collapse">
              <ul>
                <li>
                    <a href="/purchasepayment_day_report">
                      <i class="fas fa-receipt"></i>                  
                      <p>Day</p>
                    </a>
                </li>
                <li>
                    <a href="/purchasepayment_month_report">
                      <i class="fas fa-receipt"></i>                  
                      <p>weekly & Monthly </p>
                    </a>
                </li>
              </ul>
                  </div>
          </li>
          <li >
            <a href="#" data-toggle="collapse" data-target="#subsalespaymentreport">
              <i class="fas fa-file-alt"></i>
              <p>Sales Payment Report</p>
            </a>
            <div id="subsalespaymentreport" class="collapse">
              <ul>
                <li>
                    <a href="/salespayment_day_report">
                      <i class="fas fa-receipt"></i>                  
                      <p>Day</p>
                    </a>
                </li>
                <li>
                    <a href="/salespayment_month_report">
                      <i class="fas fa-receipt"></i>                  
                      <p>weekly & Monthly </p>
                    </a>
                </li>
              </ul>
                  </div>
          </li>
          {{-- <li class="active-pro">
            <a href="./upgrade.html">
              <i class="now-ui-icons arrows-1_cloud-download-93"></i>
              <p>Upgrade to PRO</p>
            </a>
          </li> --}}
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
                  <div id="sidebar-btn">
     <span></span>
     <span></span>
     <span></span>
     </div>
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            
            <a class="navbar-brand" href="#pablo">@yield('navbar_brand')</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            {{-- <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
            </form> --}}
            <ul class="navbar-nav">
              {{-- <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons media-2_sound-wave"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li> --}}
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }} 
                  </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('password.change') }}">
                          <i class="fas fa-key"></i>
                          {{ __('Change password') }}
                      </a>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                       <i class="fas fa-sign-out-alt"></i>
                          {{ __('Logout') }}
                      </a>
                    
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>



                  </div>
              </li>
              {{-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons location_world"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li> --}}
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">

            @yield('content')


      </div>
      <footer class="footer">
        <div class="container-fluid">
          {{-- <nav>
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
              <li>
                <a href="http://presentation.creative-tim.com">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
            </ul>
          </nav> --}}
          <div class="copyright" id="copyright">
            &copy;
            <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by
            <a href="http://ivisual.in/" target="_blank">I visual</a>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>

  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.3.0" type="text/javascript"></script>
  <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script src="{{ asset('js/supplier.js') }}" defer></script>
  <script src="{{ asset('js/customer.js') }}" defer></script>
  <script src="{{ asset('js/datepicker.min.js') }}" defer></script>

        <script type="text/javascript">
            @yield ('scripts')
$(function() {
  $('.nav a[href^="/' + location.pathname.split("/")[1] + '"]').addClass('active');
 
});
            $('#sidebar-btn').on('click', function () {
                $('.sidebar').toggleClass('visible');
                $('#main-panel').toggleClass('bodycollapse');
                
               
            });

      $(document).ready(function(){
  let active = document.getElementsByClassName("active")[0];

  let parentNodes = active.parentNode.parentNode.parentNode;
  parentNodes.classList.add("show")
});      
        </script>
</body>

</html>