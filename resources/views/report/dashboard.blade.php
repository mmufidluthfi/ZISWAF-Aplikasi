@extends('layouts.reportlayout')

@section('content')
	
	<div class="main">
	  	<div class="main-inner">
	  	<br>
	  	    <div class="container">
	  		 <div class="row">
	  		  <div class="span12">
	  			  <div class="faq-container">
	  				<form class="faq-search">
	  					<input type="text" name="search" placeholder="Search Data"> 
	  				</form>
	  			  </div>
	  		  </div>
	  	      	
	  	      <div class="span12">
	  	        <div class="widget-header">
	  				<i class="icon-star-empty"></i>
	  				<h3>Pendanaan</h3>
	  			</div> <!-- /widget-header -->
	  			
	  	      	<div class="info-box" align="center">
	                 <div class="row-fluid stats-box">
	                    <div class="span4">
	                    	<div class="stats-box-title">New UMKM yang terdaftar</div>
	                      <div class="stats-box-all-info"><i class="icon-home" style="color:#3366cc;"></i> {{$totalumkmterdaftar}} </div>
	                    </div>
	                    
	                    <div class="span4">
	                      <div class="stats-box-title">New UMKM yang didanai</div>
	                      <div class="stats-box-all-info"><i class="icon-heart"  style="color:#F30"></i> {{$totalumkmterdaftarterdanai}} </div>
	                    </div>
	                    
	                    <div class="span4">
	                      <div class="stats-box-title">Distribusi Dana New UMKM</div>
	                      <div class="stats-box-all-info"><i class="icon-money" style="color:#3C3"></i> {{$totaltransaksi}} </div>
	                    </div>
	                 </div>
	              </div>
	             </div>
	                 
	           </div>
	           
	  		
	  		<div class="row">
	  	      	
	  	      	<div class="span12">
	  	      		
	  	      		<div class="widget">
	  						
	  				<div class="widget">
	  					<div class="widget-header"> <i class="icon-signal"></i>
	  					<h3> Pendanaan Crowdfunding UMKM </h3>
	  					</div>
	  					<!-- /widget-header -->	
	  					<div class="widget-content">
	  					<div class="span8">
	  						<div id="container3" style="width: 800px; height: 400px; margin: 0 auto"></div>
	  					</div>	
	  					<div class="span2">
	  						<div id="container1" style="width: 300px; height: 400px; margin: 0 auto"></div>
	  					</div>	
	  					</div>
	  				</div>
	  				</div>	      		
	  	      		
	  		    </div> <!-- /span6 -->
	  			
	  	      	<div class="span12">
	  	      		
	  	      		<div class="widget">
	  							
	  					<div class="widget-header"> <i class="icon-signal"></i>
	  					<h3> Pendanaan ZISWAF perBulan</h3>
	  					</div>
	  					<!-- /widget-header -->	
	  					<div class="widget-content">
	  						<div id="container" style="width: 1000px; height: 400px; margin: 0 auto"></div>
	  					<!-- /area-chart --> 
	  					</div> <!-- /widget-content -->                                                                                                                                        
	  				
	  				</div> <!-- /widget -->
	  									
	  		      </div> <!-- /span12 -->
	  	      	
	  	      </div> <!-- /row -->
	  	    </div> <!-- /container -->
	  	</div> <!-- /main-inner -->
	</div> <!-- /main -->
	
	<script language="JavaScript">
		$(document).ready(function() {
		   var title = {
		      text: 'Penyaluran ZISWAF per Bulan'   
		   };
		   var subtitle = {
		      text: ''
		   };
		   var xAxis = {
		      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
		         'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
		   };
		   var yAxis = {
		      title: {
		         text: 'Pendanaan (Rp Juta)'
		      },
		      plotLines: [{
		         value: 0,
		         width: 1,
		         color: '#808080'
		      }]
		   };   

		   var tooltip = {
		      valueSuffix: ''
		   }

		   var legend = {
		      layout: 'vertical',
		      align: 'right',
		      verticalAlign: 'middle',
		      borderWidth: 0
		   };

		   var series = {!! $s->toJson() !!};

		   var json = {};

		   json.title = title;
		   json.subtitle = subtitle;
		   json.xAxis = xAxis;
		   json.yAxis = yAxis;
		   json.tooltip = tooltip;
		   json.legend = legend;
		   json.series = series;

		   $('#container').highcharts(json);
		});
		</script>
		<script language="JavaScript">
		$(document).ready(function() {  
		   var chart = {
		      type: 'bar'
		   };
		   var title = {
		      text: 'Project Profit'   
		   };
		   var subtitle = {
		      text: ''  
		   };
		   var xAxis = {
		      categories: ['project1', 'project2', 'project3', 'project4', 'project5'],
		      title: {
		         text: null
		      }
		   };
		   var yAxis = {
		      min: 0,
		      title: {
		         text: 'Pendanaan (Rp ribu)',
		         align: 'high'
		      },
		      labels: {
		         overflow: 'justify'
		      }
		   };
		   var tooltip = {
		      valueSuffix: ' ,000 '
		   };
		   var plotOptions = {
		      bar: {
		         dataLabels: {
		            enabled: true
		         }
		      }
		   };
		   var legend = {
		      layout: 'vertical',
		      align: 'right',
		      verticalAlign: 'top',
		      x: -40,
		      y: 100,
		      floating: true,
		      borderWidth: 1,
		      backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
		      shadow: true
		   };
		   var credits = {
		      enabled: false
		   };
		   
		   var series= [{
		         name: '10 hari',
		            data: [107, 31, 635, 203, 2]
		        }, {
		            name: '20 hari',
		            data: [133, 156, 947, 408, 6]
		        }, {
		            name: '30 hari',
		            data: [973, 914, 4054, 732, 34]      
			    }
		   ];     
		      
		   var json = {};   
		   json.chart = chart; 
		   json.title = title;   
		   json.subtitle = subtitle; 
		   json.tooltip = tooltip;
		   json.xAxis = xAxis;
		   json.yAxis = yAxis;  
		   json.series = series;
		   json.plotOptions = plotOptions;
		   json.legend = legend;
		   json.credits = credits;
		   $('#container1').highcharts(json);
		  
		});
		</script>

		<script language="JavaScript">
		$(document).ready(function() {  
		   var chart = {
		      type: 'spline',
			  animation: Highcharts.svg, // don't animate in IE < IE 10.
		      marginRight: 10,
			  events: {
		         load: function () {
		            // set up the updating of the chart each second
		            var series = this.series[0];
		            setInterval(function () {
		               var x = (new Date()).getTime(), // current time
		               y = Math.random();
		               series.addPoint([x, y], true, true);
		            }, 1000);
		         }
		      }
		   };
		   var title = {
		      text: 'Pendanaan Projek per Hari'   
		   };   
		   var xAxis = {
		      type: 'datetime',
		      tickPixelInterval: 150
		   };
		   var yAxis = {
		      title: {
		         text: 'Pendanaan (Rp juta)'
		      },
		      plotLines: [{
		         value: 0,
		         width: 1,
		         color: '#808080'
		      }]
		   };
		   var tooltip = {
		      formatter: function () {
		      return '<b>' + this.series.name + '</b><br/>' +
		         Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) + '<br/>' +
		         Highcharts.numberFormat(this.y, 2);
		      }
		   };
		   var plotOptions = {
		      area: {
		         pointStart: 1940,
		         marker: {
		            enabled: false,
		            symbol: 'circle',
		            radius: 2,
		            states: {
		               hover: {
		                 enabled: true
		               }
		            }
		         }
		      }
		   };
		   var legend = {
		      enabled: false
		   };
		   var exporting = {
		      enabled: false
		   };
		   var series= [{
		      name: 'Random data',
		      data: (function () {
		         // generate an array of random data
		         var data = [],time = (new Date()).getTime(),i;
		         for (i = -19; i <= 0; i += 1) {
		            data.push({
		               x: time + i * 1000,
		               y: Math.random()
		            });
		         }
		         return data;
		      }())    
		   }];     
		      
		   var json = {};   
		   json.chart = chart; 
		   json.title = title;     
		   json.tooltip = tooltip;
		   json.xAxis = xAxis;
		   json.yAxis = yAxis; 
		   json.legend = legend;  
		   json.exporting = exporting;   
		   json.series = series;
		   json.plotOptions = plotOptions;
		   
		   
		   Highcharts.setOptions({
		      global: {
		         useUTC: false
		      }
		   });
		   $('#container3').highcharts(json);
		  
		});
		</script>

@endsection
