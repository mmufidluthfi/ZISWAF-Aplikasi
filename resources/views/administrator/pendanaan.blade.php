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
					<h3 class="page-header"><i class="fa fa-user-md"></i> Proyek </h3>
					<ol class="breadcrumb">
						<p><font color="green"><center><?php echo Session::get('message-inputberhasil'); ?></font></center></p>
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
							    <a href="#formcontrols" data-toggle="tab">Pendaftaran Proyek</a>
							  </li>
							  <li  class="active"><a href="#jscontrols" data-toggle="tab">List Proyek</a></li>
							</ul>
												
							<div class="tab-content">
								<div class="tab-pane" id="formcontrols">
									<form action="{{ URL::to('uploadpendanaan') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
										<fieldset>
											{!! csrf_field() !!}

											<input type="hidden" value="0" name="sementara_dana">
						                    <input type="hidden" value="0" name="status">
						                    <input type="hidden" name="tgl_transaksi" value="tgl_transaksi">
						                    <input type="hidden" value="{{ Auth::user()->id }}" name="lembagaID">
											
											
											<div class="control-group">											
												<label class="control-label" for="username">ID UMKM - Lihat Tabel UMKM</label>
												<div class="controls">
													<input type="text" class="span6" name="id_umkm">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">											
												<label class="control-label" for="since">Nama Proyek</label>
												<div class="controls">
													<input type="text" class="span6" name="nama_proyek" >
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
											<br>
											<div class="control-group">											
												<label class="control-label" for="since">Total Dana yang Dibutuhkan</label>
												<div class="controls">
													<input type="text" class="span6" name="total_dana" >
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											<div class="control-group">			
												<label class="control-label" for="since">Deskripsi</label>								
												<div class="controls">
													<div id="sample">
													  <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> 
													  <script type="text/javascript">
													    //<![CDATA[
													          bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
													    //]]>
													  </script>
													  
													  <textarea class="post" name="deskripsi" style="width: 600px; height: 100px;">
													       Masukkan Informasi Laporan Pendanaan ZISWAF Produktif
													  </textarea>
													</div>
													<!-- <textarea class="post" name="deskripsi" rows="5"></textarea> -->
												</div>
											</div> <!-- /control-group -->
											
											<div class="control-group">											
												<label class="control-label" for="since">Upload Foto Proyek</label>
												<div class="controls">
													<input type="file" name="file" id="file">
												</div> <!-- /controls -->				
											</div> <!-- /control-group -->
											
											
											<div class="form-actions">
												<button type="submit" class="btn btn-primary">Simpan</button> 
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
									                    <th>Nama</th>
														<th>Nama Proyek</th>
														<th>Kategori</th>
														<th>Dana Sementara</th>
														<th>Total Dana</th>
														<th>Deskripsi</th>
														<th>Foto Proyek</th>
														<th>Foto PJ</th>
														<th>Tanggal Pendanaan</th>
									                  </tr>
									                </thead>
									                <tbody>
									                	@foreach($pendanaanadmin as $pda)
															<script>
																function myFunction() {
																    var myWindow = window.open("", "MsgWindow", "width=800,height=500");
																    myWindow.document.write("{{$pda->deskripsi}}");
																}
															</script>

										                  <tr>
										                    <td> {{$pda->nama_pj}} </td>
										                    <td> {{$pda->nama_proyek}} </td>
															<td> {{$pda->kategori}} </td>
															<td> {{$pda->sementara_dana}} </td>
															<td> {{$pda->total_dana}} </td>
															<td><center><button onclick="myFunction()">Tampilkan</button></center></td>
															<td class="td-actions"><a target="_blank" href="{{URL::to('images/proyek/')}}/{{$pda->foto_proyek}}" class="btn btn-info btn-sm">Lihat</a> </td>
															<td class="td-actions"><a target="_blank" href="{{URL::to('images/avatar/')}}/{{$pda->foto_pj}}" class="btn btn-info btn-sm">Lihat</a> </td>
															<td> {{$pda->tgl_pendanaan}} </td>
															
										                  </tr>
														@endforeach									                  
									                
									                </tbody>
									              </table>

									              <?php echo $pendanaanadmin->render(); ?>

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
    
    @endif
@endsection