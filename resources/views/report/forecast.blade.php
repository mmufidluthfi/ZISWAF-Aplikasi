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
				 </div>
				 <div class="row">
			      	
			      	<div class="span12">
			      		
			      		<div class="widget">
								
						<div class="widget">
							<div class="widget-header"> <i class="icon-star-empty"></i>
							<h3> UMKM </h3>
							</div>
							<!-- /widget-header -->	
							<div class="widget-content">
								<div id="container" style="width: 800px; height: 400px; margin: 0 auto"></div>
							</div>
						</div>
						</div>
					</div>
					
					<div class="span12">
			      		
			      		<div class="widget">
								
						<div class="widget">
							<div class="widget-header"> <i class="icon-star-empty"></i>
							<h3> UMKM </h3>
							</div>
							<!-- /widget-header -->	
							<div class="span7">
								<div id="container1" style="width: 650px; height: 400px; margin: 0 auto"></div>
							</div>	
							<div class="span3">
								<div id="container2" style="width: 400px; height: 400px; margin: 0 auto"></div>
							</div>
						</div>
						</div>
					</div>
				  </div>
				</div>
			</div>
			      	
		<script language="JavaScript">
		$(document).ready(function() {  
		   var chart = {
		      zoomType: 'xy'
		   };
		   var subtitle = {
		      text: ''   
		   };
		   var title = {
		      text: 'Perkembangan New UMKM ke UMKM'   
		   };
		   var xAxis = {
		      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
		      crosshair: true
		   };
		   var yAxis= [{ // Primary yAxis
		      labels: {
		         format: 'Rp {value} Juta',
		         style: {
		            color: Highcharts.getOptions().colors[1]
		         }
		      },
		      title: {
		         text: 'Penghasilan',
		         style: {
		            color: Highcharts.getOptions().colors[1]
		         }
		      }
		   }, { // Secondary yAxis
		      title: {
		         text: 'Pendanaan',
		         style: {
		            color: Highcharts.getOptions().colors[0]
		         }
		      },
		      labels: {
		         format: '{value} K',
		         style: {
		            color: Highcharts.getOptions().colors[0]
		         }
		      },
		      opposite: true
		   }];
		   var tooltip = {
		      shared: true
		   };
		   var legend = {
		      layout: 'vertical',
		      align: 'left',
		      x: 120,
		      verticalAlign: 'top',
		      y: 100,
		      floating: true,
		      backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
		   };
		   var series= [{
		         name: 'New UMKM',
		            type: 'column',
		            yAxis: 1,
		            data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
		            tooltip: {
		                valueSuffix: ' K '
		            }

		         }, {
		            name: 'UMKM',
		            type: 'spline',
		            data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6],
		            tooltip: {
		                valueSuffix: 'Juta'
		           }
		        }
		   ];     
		      
		   var json = {};   
		   json.chart = chart;   
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
		      text: 'Data UMKM'   
		   };
		   var subtitle = {
		      text: ''  
		   };
		   var xAxis = {
		      categories: ['UMKM1', 'UMKM2', 'UMKM3', 'UMKM4', 'UMKM5'],
		      title: {
		         text: null
		      }
		   };
		   var yAxis = {
		      min: 0,
		      title: {
		         text: 'Omset per bulan (juta)',
		         align: 'high'
		      },
		      labels: {
		         overflow: 'justify'
		      }
		   };
		   var tooltip = {
		      valueSuffix: ' millions'
		   };
		   var plotOptions = {
		      bar: {
		         dataLabels: {
		            enabled: true
		         }
		      },
			  series: {
			     stacking: 'normal'
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
		         name: 'Year 2016',
		            data: [107, 31, 635, 203, 2]
		        }, {
		            name: 'Year 2017',
		            data: [133, 156, 947, 408, 6]
		        }, {
		            name: 'Year 2018',
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
		   var title = {
		      text: 'Pendanaan Bank'   
		   };
		   var xAxis = {
		     categories: ['Bank1', 'Bank2', 'Bank3', 'Bank4', 'Bank5'],
		      title: {
		         text: null
		      }
		   };
		   var yAxis = {
		      type: 'logarithmic',
		      minorTickInterval: 1
		   };
		   var tooltip = {
		      headerFormat: '<b>{series.name}</b><br>',
		      pointFormat: '{point.x} mendanai sejumlah {point.y}'
		   };
		   var plotOptions = {
		      spline: {
		         marker: {
		            enabled: true
		         }
		      }
		   };
		   var series= [{
		         name: 'Pendanaan',
		         data: [1, 2, 4, 8, 16, 32, 64, 128, 256, 512],
		         pointStart: 1
		      }
		   ];     
		      
		   var json = {};   
		   json.title = title;   
		   json.tooltip = tooltip;
		   json.xAxis = xAxis;
		   json.yAxis = yAxis;  
		   json.series = series;
		   json.plotOptions = plotOptions;
		   $('#container2').highcharts(json);
		  
		});
		</script>

	
	
@endsection
