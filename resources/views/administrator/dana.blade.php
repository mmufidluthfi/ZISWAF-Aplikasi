@extends('layouts.administratorZISWAF')

@section('content')
	@if (Auth::guest())

		<meta http-equiv="refresh" content="0;URL='{{ url('/login') }}'" />

		@elseif (Auth::user()->admin==1)

			<!--main content start-->
		      <section id="main-content">
		          <section class="wrapper">
				  <div class="container">
					<div class="row">
						<div class="col-lg-9">
							<h3 class="page-header"><i class="fa fa-user-md"></i> Transaksi Pendanaan LKM </h3>
								<ol class="breadcrumb">
									
								</ol>
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
												    <a href="#formcontrols" data-toggle="tab">Input pendanaan</a>
												  </li>
												  <li  class="active"><a href="#jscontrols" data-toggle="tab">report</a></li>
												</ul>
											<br>
											
												<div class="tab-content">
													<div class="tab-pane" id="formcontrols">
														<form action="{{ URL::to('uploadtransaksipendanaan') }}" method="post" class="form-horizontal">
															<fieldset>
																{!! csrf_field() !!}
																<input type="hidden" name="id_ziswaf" value="{{ Auth::user()->id }}">
																
																<div class="control-group">								
																	<label class="control-label" for="username">Nama LKM</label>
																	<div class="controls">
																		<select name="id_lkm">
																		  @foreach($userlkm as $ulkm)
																		    <option value="{{$ulkm->id}}">{{$ulkm->name}}</option>
																		  @endforeach
																		</select>
																	</div> <!-- /controls -->				
																</div> <!-- /control-group -->

																<div class="control-group">								
																	<label class="control-label" for="username">Nama UMKM</label>
																	<div class="controls">
																		<select name="id_umkm">
																		  @foreach($userumkmpendanaan as $upd)
																		    <option value="{{$upd->id_umkm}}">{{$upd->nama_pj}}</option>
																		  @endforeach
																		</select>
																	</div> <!-- /controls -->				
																</div> <!-- /control-group -->

																<div class="control-group">								
																	<label class="control-label" for="username">Nama Transaksi</label>
																	<div class="controls">
																		<input required type="text" class="span6" name="nama_pendanaan">
																	</div> <!-- /controls -->				
																</div> <!-- /control-group -->

																<div class="control-group">	
																	<label class="control-label" for="address">Kategori</label>
						                                            <div class="controls">
						                                              <div class="btn-group">
							                                              <select name="kategori">
																		    <option value="Zakat">Zakat</option>
																		    <option value="Infaq">Infaq</option>
																		    <option value="Sadaqah">Sadaqah</option>
																		    <option value="Waqaf">Waqaf</option>
																		  </select>
						                                            	</div><!-- /controls -->			
																	</div> <!-- /control-group -->
																</div>
																
																<div class="control-group">								
																	<label class="control-label" for="namabank">Tanggal Transaksi</label>
																	<div class="controls">
																		<input required type="date" class="span6" name="tgl_pendanaan" >
																	</div> <!-- /controls -->				
																</div> <!-- /control-group -->
																
																
																
																<div class="control-group">											
																	<label class="control-label" for="Phone">Total Dana</label>
																	<div class="controls">
																		<input required type="text" class="span6" name="total_dana" >
																	</div> <!-- /controls -->				
																</div> <!-- /control-group -->
																
																
																<div class="form-actions">
																	<button type="submit" class="btn btn-primary">Save</button> 
																</div> <!-- /form-actions -->
															</fieldset>
														</form>
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
															                    <th> Nama LKM </th>
															                    <th> Nama UMKM </th>
															                    <th> Nama Transaksi </th>
															                    <th> Kategori </th>
																				<th> Tanggal Transaksi </th>
																				<th> Total Dana </th>
																				<th> Status </th>
															                  </tr>
															                </thead>
															                <tbody>
															                  @foreach($reportpendanaan as $rpdn)
																                  <tr>
																                    <td> {{$rpdn->name}} </td>
																                    <td> {{$rpdn->nama_pj}} </td>
																					<td> {{$rpdn->nama_pendanaan}} </td>
																					<td> {{$rpdn->kategori}} </td>
																					<td> {{$rpdn->tgl_pendanaan}} </td>
																					<td> {{$rpdn->total_dana}} </td>
																					<td> <center>
																						<?php 
																							$statusbelum = "0";
																							$statussudah = "1";

																							if ($rpdn->status == $statussudah) {
																								echo "<font color='green'>Sudah Diterima</font>";
																							} else if ($rpdn->status == $statusbelum) {
																								echo "<font color='red'>Belum Diterima</font>";
																							} 
																						?>
																					</center>
																					</td>
																                  </tr>
															                  @endforeach
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

	@elseif (Auth::user()->admin==0)
			<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />

	@elseif (Auth::user()->admin==2)
			<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />
			
	@elseif (Auth::user()->admin==3)
			<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />

	@elseif (Auth::user()->admin==4)
			<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />
		
	@endif
@endsection