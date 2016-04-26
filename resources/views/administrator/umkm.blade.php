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
															<label class="control-label" for="username">Username</label>
															<div class="controls">
																<input type="text" class="span6" name="username" >
															</div> <!-- /controls -->				
														</div> <!-- /control-group -->
														
														<div class="control-group">											
															<label class="control-label" for="since">Password</label>
															<div class="controls">
																<input type="text" class="span6" name="password" >
															</div> <!-- /controls -->				
														</div> <!-- /control-group -->
														
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
												<form id="edit-profile2" class="form-vertical">
													<fieldset>                                                
													<div class="control-group">
														<div id="profile" class="tab-pane">
															
															<div class="widget-content">
												              <table class="table table-striped table-bordered">
												                <thead>
												                  <tr>
												                    <th> ID UMKM </th>
												                    <th> Username </th>
																	<th> Password </th>
																	<th> Nama PJ </th>
																	<th> Email </th>
																	<th> No.Hp </th>
																	<th> Alamat PJ </th>
																	<th> Alamat UMKM </th>
																	<th> Foto PJ </th>
												                    <th class="td-actions">Action </th>
												                  </tr>
												                </thead>
												                <tbody>
												                @foreach($userumkm as $usmt)
												                  <tr>
												                    <td> {{$usmt->id_umkm}} </td>
												                    <td> {{$usmt->username}} </td>
																	<td> {{$usmt->password}} </td>
																	<td> {{$usmt->nama_pj}} </td>
																	<td> {{$usmt->email}} </td>
																	<td> {{$usmt->no_hp}} </td>
																	<td> {{$usmt->alamat_pj}} </td>
																	<td> {{$usmt->alamat_umkm}} </td>
																	<td> <a target="_blank" href="{{URL::to('images/avatar/')}}/{{$usmt->foto_pj}}" class="btn btn-info btn-sm">Lihat</a></td>
												                    <td class="td-actions"><a href="javascript:;" class="btn btn-edit-profile btn-sm">Edit</a></td>
												                  </tr>
												                @endforeach
												                </tbody>
												              </table>

												              <?php echo $userumkm->render(); ?>

			            									</div>
			                                                      
			                                            </div>
													</div> <!-- /controls -->	
													</fieldset>
												</form>
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
    
    @endif
@endsection
