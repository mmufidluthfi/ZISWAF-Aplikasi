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
					<h3 class="page-header"><i class="fa fa-user-md"></i> UMKM </h3>
					<ol class="breadcrumb">
						<p><font color="green"><center><?php echo Session::get('message-inputberhasil'); ?></font></center></p>
						<p><center><font color="red"><?php echo Session::get('message-pesanerror'); ?></font></center></p>
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
									    <a href="#formcontrols" data-toggle="tab">Pendaftaran UMKM</a>
									  </li>
									  <li  class="active"><a href="#jscontrols" data-toggle="tab">List UMKM</a></li>
									</ul>
									
									<br>
									
										<div class="tab-content">
											<div class="tab-pane" id="formcontrols">
												<form action="{{ URL::to('uploadumkm') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
													<fieldset>
														{!! csrf_field() !!}

														<input type="hidden" value="{{ Auth::user()->id }}" name="lembagaID">
														
														<div class="control-group">											
															<label class="control-label" for="subject">Nama Penanggung Jawab</label>
															<div class="controls">
																<input type="text" class="span6" name="nama_pj" >
															</div> <!-- /controls -->				
														</div> <!-- /control-group -->
														
														
														<div class="control-group">											
															<label class="control-label" for="Owner">Alamat Email Penanggung Jawab</label>
															<div class="controls">
																<input type="text" class="span6" name="email" >
															</div> <!-- /controls -->				
														</div> <!-- /control-group -->
														
														<div class="control-group">											
															<label class="control-label" for="city">Nomor HP Penanggung Jawab</label>
															<div class="controls">
																<input type="text" class="span6" name="no_hp" >
															</div> <!-- /controls -->				
														</div> <!-- /control-group -->
														
														<div class="control-group">											
															<label class="control-label" for="city">Alamat Penanggung Jawab</label>
															<div class="controls">
																<input type="text" class="span6" name="alamat_pj" >
															</div> <!-- /controls -->				
														</div> <!-- /control-group -->
														
														<div class="control-group">											
															<label class="control-label" for="city">Alamat UMKM</label>
															<div class="controls">
																<input type="text" class="span6" name="alamat_umkm" >
															</div> <!-- /controls -->				
														</div> <!-- /control-group -->

														<div class="control-group">											
															<label class="control-label" for="city">Tanggal Mendaftar</label>
															<div class="controls">
																<input type="date" class="span6" name="tgl_daftarumkm" >
															</div> <!-- /controls -->				
														</div> <!-- /control-group -->

														<div class="control-group">											
															<label class="control-label" for="address">Upload Foto Profile:</label>
															
															
				                                            <div class="controls">
				                                            <input type="file" name="file" id="file">		
															</div> <!-- /controls -->				
														</div> <!-- /control-group -->
														
														
														
														<div class="form-actions">
															<button type="submit" class="btn btn-primary">Submit</button> 
														</div> <!-- /form-actions -->
													</fieldset>
												</form>
											</div>

											<div class="tab-pane active" id="jscontrols">
													<fieldset>                                                
													<div class="control-group">
														<div id="profile" class="tab-pane">
															
															<div class="widget-content">
												              <table class="table table-striped table-bordered">
												                <thead>
												                  <tr>
																	<th> Nama UMKM </th>
																	<th> Email </th>
																	<th> No.Hp </th>
																	<th> Alamat PJ </th>
																	<th> Alamat UMKM </th>
																	<th> Tanggal Daftar </th>
																	<th> Foto PJ </th>
												                    <th> Ubah Status UMKM </th>
																	<th> Action </th>
																	<th> Status </th>
												                  </tr>
												                </thead>
												                <tbody>
												                @foreach($userumkm as $usmt)
												                  <tr>
																	<td> {{$usmt->nama_pj}} </td>
																	<td> {{$usmt->email}} </td>
																	<td> {{$usmt->no_hp}} </td>
																	<td> {{$usmt->alamat_pj}} </td>
																	<td> {{$usmt->alamat_umkm}} </td>
																	<td> {{$usmt->tgl_daftarumkm}} </td>
																	<td> <a target="_blank" href="{{URL::to('images/avatar/')}}/{{$usmt->foto_pj}}" class="btn btn-info btn-sm">Lihat</a></td>
												                    <td><br>
																	<form action="{{ URL::to('updatestatusumkm') }}" method="post">
																		{!! csrf_field() !!}
																			
																			<input type="hidden" value="{{$usmt->id_umkm}}" name="id_umkm">

																			<input type="hidden" value="{{ Auth::user()->id }}" name="id_lembaga">
																			<input type="hidden" value="{{ csrf_token() }}" name="_token">
																		
																			  <select name="status_umkm">
																			    <option value="1">UMKM</option>
																			    <option value="0">New UMKM</option>
																			  </select>
												                    </td>
												                    <td> 
												                    	<input type="submit" value="Update">
												                    	
												                    </td>
												                    </form> 
												                    <td>
													                    <center>
																			<?php 
																				$usmtlama = "0";
																				$usmtbaru = "1";

																				if ($usmt->status_umkm == $usmtbaru) {
																					echo "<a href='#' class='btn btn-small btn-success'>UMKM</a>";
																				} else {
																					echo "<a href='#' class='btn btn-danger btn-small'>New UMKM</a>";
																				}
																			?>
																		</center>
																	</td>
												                  </tr>
												                @endforeach
												                </tbody>
												              </table>

												              <?php echo $userumkm->render(); ?>

			            									</div>
			                                                      
			                                            </div>
													</div> <!-- /controls -->	
													</fieldset>
											</div>
										</div>	
								</div>
							</div>
								
		
					</div> <!-- /widget-content -->
				  </div> <!-- /widget -->
				</div> <!-- /span8 -->
			</div> <!-- /row -->
			</div> <!-- /container -->    
		</div> <!-- /main-inner -->

		 <!-- /main -->

		</section>
	</section>

	@elseif (Auth::user()->admin==0)
			<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />

	@elseif (Auth::user()->admin==2)
			<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />

	@elseif (Auth::user()->admin==4)
			<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />
    @endif
@endsection
