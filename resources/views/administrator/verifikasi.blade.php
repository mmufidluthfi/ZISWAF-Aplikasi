@extends('layouts.administratorZISWAF')

@section('content')
<!--main content start-->
<section id="main-content">
<section class="wrapper">
<div class="container">
<div class="row">
	<div class="col-lg-9">
		<h3 class="page-header"><i class="icon-list-alt"></i> Transaksi </h3>						
	</div>
</div>
</div>

<div class="row">
<div class="main">
	<div class="main-inner">
	    <div class="container">
	      <div class="row">
	      	<div class="span12">      		

	  			<!-- /widget-header -->
					
					<div class="widget-content">
						<div class="tabbable">
						<ul class="nav nav-tabs">
						  <li>
						    <a href="#formcontrols" data-toggle="tab">Crowdfunding</a>
						  </li>
						  <li class="active"><a href="#jscontrols" data-toggle="tab">Bank</a></li>
						</ul>
						
						<br>
						
							<div class="tab-content">
								<div class="tab-pane" id="formcontrols">
									
										<fieldset>	
										<div class="control-group">
											<div id="profile" class="tab-pane">	
											<div class="widget-content">		

												<table class="table table-striped table-bordered">
								                <thead>
								                  <tr>
								                    <th>No Transaksi</th>
													<th>Nama Pendonasi</th>
													<th>Judul Pendanaan</th>
													<th>Kategori</th>
													<th>Nominal Donasi</th>
													<th>Tanggal Donasi</th>
													<th>Konfirmasi</th>
													<th>Edit Status <br>Pilih Opsi, Lalu Klik "Update"</th>
													<th>Action</th>
													<th>Status</th>
								                  </tr>
								                </thead>
								                <tbody>
								                @foreach($transaksipendanaan as $tpd)
													<tr>
									                  	<td> {{$tpd->id_transaksi}} </td>
									                    <td> {{$tpd->name}} </td>
														<td> {{$tpd->nama_proyek}} </td>
														<td> <center>{{$tpd->kategori}}</center> </td>
														<td> {{$tpd->nominal}} </td>
														<td> {{$tpd->tanggal_transaksi}} </td>
														<td><?php 
																$statuskonfirmasi1 = $tpd->konfirmasi;
																$statuskonfirmasi2 = "belum";
																
																if ($statuskonfirmasi1 == $statuskonfirmasi2) {
																	echo "Belum";
																} else {
																	echo "<a target='_blank' href='../transaksi/".$statuskonfirmasi1."'><b><font color='green'>Download Bukti</font></b></a>";
																}
															?>
														</td>
														<td> <br>
															<center>
															<form action="{{ URL::to('updatestatus') }}" method="post">
																{!! csrf_field() !!}
																<input type="hidden" value="{{ csrf_token() }}" name="_token">
																<input type="hidden" value="{{$tpd->id_transaksi}}" name="id_transaksiDonasi">
																<input type="hidden" value="{{$tpd->id_pendanaan}}" name="id_pendanaanDonasi">
																<input type="hidden" value="{{$tpd->nominal}}" name="nominal_pendanaanDonasi">
																
																  <select name="editstatus">
																    <option value="#">Ubah Status</option>
																    <option value="1">Sukses</option>
																    <option value="0">Pending</option>
																    <option value="2">Gagal</option>
																  </select>
														 </td><td>  
															  <input type="submit" value="Update">
															</form>
															</center>
														</td>
														<td class="td-actions">
															<center>
																<?php 
																	$statuspending = "0";
																	$statusberhasil = "1";
																	$statusgagal = "2";

																	if ($tpd->status == $statusberhasil) {
																		echo "<a href='#' class='btn btn-small btn-success'><i class='btn-icon-only icon-ok'></i></a>";
																	} else if ($tpd->status == $statuspending) {
																		echo "<a href='#' class='btn btn-small btn-warning'><i class='btn-icon-only icon-time'></i></a>";
																	} else {
																		echo "<a href='#' class='btn btn-danger btn-small'><i class='btn-icon-only icon-remove'> </i></a>";
																	}
																?>
															</center>
														</td>
									                </tr>
								                @endforeach
								                </tbody>
								              	</table>

								              	<?php echo $transaksipendanaan->render(); ?>
							              	</div>          
                                            </div>
										</div>
										</fieldset>
									
								</div>
								
								<div class="tab-pane active" id="jscontrols">
									<form id="edit-profile2" class="form-vertical">
										<fieldset>                                            
											<div class="control-group">
											<div id="profile" class="tab-pane">
												<div class="widget-content">

										              <table class="table table-striped table-bordered">
										                <thead>
										                  <tr>
										                    <th> No.Transaksi </th>
										                    <th> Nama Bank </th>
															<th> Nama UMKM </th>
															<th> Nominal </th>
															<th> Tanggal Transaksi </th>
															<th> Status </th>
															<th> Invoice </th>
										                  </tr>
										                </thead>
										                <tbody>
										                  <tr>
										                    <td> 1 </td>
															<td> Bank Mandiri Syariah </td>
															<td> Podomoro </td>
															<td> 500000000 </td>
															<td> 2016-04-21 </td>
															 <td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
															<td class="td-actions"><a href="javascript:;" class="btn btn-info btn-sm">Download</a> </td>
										                  </tr>
										                </tbody>
										              </table>

										        </div>    
                                            </div>
											</div> <!-- /controls -->	
										</fieldset>
									</form>
								</div>
								
							</div>
						  
						  
						</div>
					</div> <!-- /widget-content -->
						
			</div> <!-- /widget -->	
		  </div> <!-- /span8 -->	      	
	    </div> <!-- /row -->
	</div> <!-- /container -->
</div> <!-- /main-inner -->
</div> <!-- /main -->

</section>
</section>



@endsection