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
			      	<div class="info-box" >
		               <div class="row-fluid stats-box" >
		                  <div class="span2">
		                  	<div class="stats-box-title">Total Lembaga ZISWAF</div>
		                    <div class="stats-box-all-info"><i  style="color:#3366cc;"></i> {{$totallembaga}} </div>
		                  </div>
		                  
		                  <div class="span2">
		                    <div class="stats-box-title">Total Bank Terdaftar</div>
		                    <div class="stats-box-all-info"><i  style="color:#F30"></i> {{$totalbank}} </div>
		                  </div>
		                  
		                  <div class="span2">
		                    <div class="stats-box-title">Total LKM</div>
		                    <div class="stats-box-all-info"><i style="color:#3C3"></i> {{$totallkm}} </div>
		                  </div>
						  
						  <div class="span2">
		                    <div class="stats-box-title">Total New UMKM</div>
		                    <div class="stats-box-all-info"><i style="color:#3C3"></i> {{$totalnewumkm}} </div>
		                  </div>
						  
						  <div class="span2">
		                    <div class="stats-box-title">Total UMKM</div>
		                    <div class="stats-box-all-info"><i style="color:#3C3"></i> {{$totalumkm}} </div>
		                  </div>
						  
						  <div class="span2">
		                    <div class="stats-box-title">Total Donatur</div>
		                    <div class="stats-box-all-info"><i style="color:#3C3"></i> {{$totaldonatur}} </div>
		                  </div>
		               </div>
		            </div>
		           </div>
				   
				   <div class="span12">
			      		
			      		<div class="widget">
								
						<div class="widget">
							<div class="span7">
								<div id="container" style="width: 700px; height: 400px; margin: 0 auto"></div>
							</div>	
							<div class="span3">
								<div id="container1" style="width: 400px; height: 400px; margin: 0 auto"></div>
							</div>
						</div>
						</div>
					</div>
		               
		         </div>
				 
				 <div class="row">
			      	<div class="span12">
			      		
							<form id="edit-profile2" class="form-vertical">
								<fieldset>                                       
									<div class="control-group">
									
									  <table class="table table-striped table-bordered">
										<thead>
										  <tr>
											<th> Nama UMKM </th>
											<th> Status UMKM </th>
											<th> Dana Dibutuhkan </th>
											<th> Didanai oleh </th>
										  </tr>
										</thead>
										<tbody>
										  <tr>
											<td> Podomoro </td>
											<td> New UMKM </td>
											<td> 2.000.000 </td>
											<td> crowdfunding</td>
										  </tr>
										</tbody>
										<tbody>
										  <tr>
											<td> Vendorra </td>
											<td> UMKM </td>
											<td> 8.000.000 </td>
											<td> Bank </td>
										  </tr>
										</tbody>
									  </table>
										
									</div> <!-- /control-group -->
		                                         
									<br />
								</fieldset>
							</form>
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
		      type: 'bar'
		   };
		   var title = {
		      text: 'Periode New UMKM &UMKM'   
		   };   
		   var xAxis = {
		      categories: [{{ $period->implode('period', ', ') }}], labels: { enabled: true, formatter: function() { return this.value + ' tahun'; } }
		   };
		   var credits = {
		      enabled: false
		   };
		   var series= [{
		      name: 'New UMKM',
		            data: [{{ $period->implode('newUmkm', ', ') }}]
		        }, {
		            name: 'UMKM',
		            data: [{{ $period->implode('umkm', ', ') }}]
		        }
		   ];     
		      
		   var json = {};   
		   json.chart = chart; 
		   json.title = title; 
		   json.xAxis = xAxis;
		   json.credits = credits;
		   json.series = series;
		   $('#container').highcharts(json);
		  
		});
		</script>
		<script language="JavaScript">
		$(document).ready(function() {  
		   var chart = {
		       plotBackgroundColor: null,
		       plotBorderWidth: null,
		       plotShadow: false
		   };
		   var title = {
		      text: 'New UMKM & UMKM'   
		   };      
		   var tooltip = {
		      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
		   };
		   var plotOptions = {
		      pie: {
		         allowPointSelect: true,
		         cursor: 'pointer',
		         dataLabels: {
		            enabled: true,
		            format: '<b>{point.name}%</b>: {point.percentage:.1f} %',
		            style: {
		               color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
		            }
		         }
		      }
		   };
		   var series= [{
		      type: 'pie',
		      name: 'New UMKM vs UMKM',
		      data: [
		         ['UMKM', {{ count($umkm) }}],
		         {
		            name: 'New UMKM',
		            y: {{ count($newUmkm) }},
		            sliced: true,
		            selected: true
		         },
		      ]
		   }];     
		      
		   var json = {};   
		   json.chart = chart; 
		   json.title = title;     
		   json.tooltip = tooltip;  
		   json.series = series;
		   json.plotOptions = plotOptions;
		   $('#container1').highcharts(json);  
		});
		</script>
	
@endsection
