<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Dashboard Admin ZISWAF</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">

<link href="{{ URL::asset('administrator/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('administrator/css/bootstrap-responsive.min.css')}}" rel="stylesheet">

<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">

<link href="{{ URL::asset('administrator/css/font-awesome.css')}}" rel="stylesheet">
<link href="{{ URL::asset('administrator/css/style.css')}}" rel="stylesheet">
<link href="{{ URL::asset('administrator/css/pages/dashboard.css')}}" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>

    @if (Auth::guest())
      <meta http-equiv="refresh" content="0;URL='{{ url('/login') }}'" />
    @elseif (Auth::user()->admin==1)

<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                     class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="{{ url('administrator/home') }}">User Management ZISWAF </a>
       <div class="nav-collapse">
        <ul class="nav pull-right">
          
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i> {{ Auth::user()->name }} <b class="caret"></b></a>
            <ul class="dropdown-menu">
              
			  <li><a></a></li>
              <li><a href="{{ url('/logout') }}">Logout</a></li>
            </ul>
          </li>
        </ul>
        <form class="navbar-search pull-right">
          <input type="text" class="search-query" placeholder="Search">
        </form>
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->

<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li><a href="{{ url('administrator/home') }}"><i class="icon-dashboard"></i><span>Home</span> </a> </li>
        <li><a href="{{ url('administrator/manageuser') }}/{{ Auth::user()->id }}"><i class="icon-user"></i><span>Pengguna</span> </a> </li>
        <li><a href="{{ url('administrator/verifikasi') }}/{{ Auth::user()->id }}"><i class="icon-ok"></i><span>Verifikasi</span> </a> </li>
        <li><a href="{{ url('administrator/umkm') }}/{{ Auth::user()->id }}"><i class="icon-home"></i><span>UMKM</span> </a> </li>
    		<li><a href="{{ url('administrator/pendanaan') }}/{{ Auth::user()->id }}"><i class="icon-file"></i><span>Proyek</span> </a> </li> 
        <li><a href="{{ url('administrator/dana') }}/{{ Auth::user()->id }}"><i class="icon-money"></i><span>Pendanaan</span> </a> </li>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->

@yield('content')

<div class="extra">
  <div class="extra-inner">
    <div class="container">
      <div class="row">
                    <div class="span3">
                        <h4>
                            About Micro Monitoring System</h4>
                        <ul>
                            <li><a href="javascript:;">Crowdfunding ZISWAF</a></li>
                            <li><a href="javascript:;">Reporting System</a></li>
                            <li><a href="javascript:;">Decision Making System</a></li>
                            <li><a href="javascript:;">Micro Monitoring System</a></li>
                        </ul>
                    </div>
                    <!-- /span3 -->
                    <div class="span3">
                        <h4>
                            Support</h4>
                        <ul>
                            <li><a href="javascript:;">Frequently Asked Questions</a></li>
                            <li><a href="javascript:;">Ask a Question</a></li>
                            <li><a href="javascript:;">Feedback</a></li>
                        </ul>
                    </div>
                    <!-- /span3 -->
                    <div class="span3">
                        <h4>
                            Something Legal</h4>
                        <ul>
                            <li><a href="javascript:;">Read License</a></li>
                            <li><a href="javascript:;">Terms of Use</a></li>
                            <li><a href="javascript:;">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <!-- /span3 -->
                    <div class="span3">
                        <h4>
                            Open Source MMS</h4>
                        <ul>
                            <li><a href="http://;">Open Source MMS</a></li>
                            <li><a href="http://;">API MMS</a></li>
                            
                        </ul>
                    </div>
                    <!-- /span3 -->
                </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /extra-inner --> 
</div>
<!-- /extra -->
<div class="footer">
  <div class="footer-inner">
    <div class="container">
      <div class="row">
        <div class="span12"> &copy; 2016 <a href="http://www.MMS.com/">Micro Monitoring System ZISWAF</a>. </div>
        <!-- /span12 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /footer-inner --> 
</div>
<!-- /footer --> 
<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 

<script src="{{ URL::asset('administrator/js/jquery-1.7.2.min.js')}}"></script>
<script src="{{ URL::asset('administrator/js/excanvas.min.js')}}"></script>
<script src="{{ URL::asset('administrator/js/chart.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('administrator/js/bootstrap.js')}}"></script>
<script language="javascript" src="{{ URL::asset('administrator/js/full-calendar/fullcalendar.min.js')}}"></script>
<script src="{{ URL::asset('administrator/js/base.js')}}"></script>

</body>
    @elseif (Auth::user()->admin==0)
      <meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />
    
    @endif
</html>