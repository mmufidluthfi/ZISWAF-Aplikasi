<html>
<head>
<title>Main Report</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <link href="{{ URL::asset('report/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('report/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="{{ URL::asset('report/css/font-awesome.css')}}" rel="stylesheet">
    
    <link href="{{ URL::asset('report/css/style.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('report/css/pages/dashboard.css')}}" rel="stylesheet">
    
    <link href="{{ URL::asset('report/css/pages/reports.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('report/css/pages/faq.css')}}" rel="stylesheet">
  
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   <script src="http://code.highcharts.com/highcharts.js"></script> 

</head>

<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> 
  
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="mms1.html">MMS ZISWAF</a>
           <div class="nav-collapse">
        <ul class="nav navbar-nav">
          <li>
            <a href="{{ url('report/dashboard')}}">Dashboard</a>
          </li>
          <li>
            <a href="{{ url('report/forecast')}}">Forecast</a>
          </li>
          <li>
            <a href="{{ url('report/data-browser')}}">Data Browser</a>
          </li>
        </ul>
            <ul class="nav pull-right">
              <li>
              <a href="javascript:void(0)" ><i class="icon-refresh"></i> </a>
              </li>
            </ul>
            
          </div>
          <!--/.nav-collapse --> 
        </div>
        <!-- /container --> 
      </div>
      <!-- /navbar-inner --> 
    </div>

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
                
              </div> <!-- /row -->
              
          </div> <!-- /container -->
          
        </div> <!-- /footer-inner -->
        
      </div> <!-- /footer -->
      <!-- Le javascript
      ================================================== --> 
      <!-- Placed at the end of the document so the pages load faster --> 

</body>
</html>