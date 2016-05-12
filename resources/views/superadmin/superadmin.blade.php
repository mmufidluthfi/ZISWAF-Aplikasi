@extends('layouts.administratorZISWAF')

@section('content')
	@if (Auth::guest())

		<meta http-equiv="refresh" content="0;URL='{{ url('/login') }}'" />

	@elseif (Auth::user()->admin==4)
		<!--main content start-->
      <section id="main-content">
      <section class="wrapper">
		  <div class="container">
			<div class="row">
				<div class="col-lg-9"><br>
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
										    <a href="#daftarAkun" data-toggle="tab">Pendaftaran Akun Lembaga</a>
										  </li>
										  <li>
										    <a href="#lihatAkun" data-toggle="tab">List Lemabaga ZISWAF</a>
										  </li>
										  <li>
										    <a href="#daftarBank" data-toggle="tab">Pendaftaran akun Bank</a>
										  </li>
										  <li class="active">
										    <a href="#lihatBank" data-toggle="tab">List Bank</a>
										  </li>
										</ul>
									
										<br>
									
										<div class="tab-content">
											<div class="tab-pane " id="daftarAkun">
												<form class="form-horizontal" role="form" method="POST" action="{{ URL::to('daftarlembaga') }}">
													{!! csrf_field() !!}
													<fieldset>
													
														<input type="hidden" value="default.png" name="url_foto">

								                        <!-- Register LKM -->
								                        <input type="hidden" value="2" name="admin">
														
														<div class="control-group form-group{{ $errors->has('name') ? ' has-error' : '' }}">
								                            <label class="col-md-4 control-label">Nama Lembaga</label>

								                            <div class="col-md-6 controls">
								                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">

								                                @if ($errors->has('name'))
								                                    <span class="help-block">
								                                        <strong>{{ $errors->first('name') }}</strong>
								                                    </span>
								                                @endif
								                            </div>
								                        </div>
														
														<div class="control-group form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								                            <label class="col-md-4 control-label">Email Lembaga</label>

								                            <div class="col-md-6 controls" >
								                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

								                                @if ($errors->has('email'))
								                                    <span class="help-block">
								                                        <strong>{{ $errors->first('email') }}</strong>
								                                    </span>
								                                @endif
								                            </div>
								                        </div>

								                        <div class="control-group form-group{{ $errors->has('password') ? ' has-error' : '' }}">
								                            <label class="col-md-4 control-label">Password</label>

								                            <div class="col-md-6 controls">
								                                <input type="password" class="form-control" name="password">

								                                @if ($errors->has('password'))
								                                    <span class="help-block">
								                                        <strong>{{ $errors->first('password') }}</strong>
								                                    </span>
								                                @endif
								                            </div>
								                        </div>

								                        <div class="control-group form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
								                            <label class="col-md-4 control-label">Konfirmasi Password</label>

								                            <div class="col-md-6 controls">
								                                <input type="password" class="form-control" name="password_confirmation">

								                                @if ($errors->has('password_confirmation'))
								                                    <span class="help-block">
								                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
								                                    </span>
								                                @endif
								                            </div>
								                        </div>

														
														<div class="form-group">
								                            <div class="col-md-6 col-md-offset-4">
								                                <button type="submit" class="btn btn-primary">
								                                    <i class="fa fa-btn fa-user"></i>Daftar Lembaga
								                                </button>
								                            </div>
								                        </div>

													</fieldset>
												</form>
											</div>

											<div class="tab-pane" id="lihatAkun">
												<form id="edit-profile2" class="form-vertical">
													<fieldset>
														                                
														<div class="control-group">
														<div id="list_ukm" class="tab-pane">
															
															<div class="widget-content">
															  <table class="table table-striped table-bordered">
																<thead>
																  <tr>
																	<th> ID Lembaga </th>
																	<th> Nama Lembaga </th>
																	<th> Email </th>
																	<th> Password </th>
																	<th class="td-actions"> Action </th>
																  </tr>
																</thead>
																<tbody>
																@foreach($listlembaga as $lbg)
																  <tr>
																	<td>{{$lbg->id}}</td>
																	<td>{{$lbg->name}}</td>
																	<td>{{$lbg->email}} </td>
																	<td>{{$lbg->password}}</td>
																	<td class="td-actions"><center><a href="javascript:;" class="btn btn-info btn-sm">Detail</a> <a href="javascript:;" class="btn btn-primary btn-sm">Edit</a> <a href="javascript:;" class="btn btn-danger btn-sm">Delete</a></center></td>
																  </tr>
																 @endforeach
																</tbody>
															  </table>
															</div>
														</div> <!-- /controls -->	
														</div> <!-- /control-group -->
													</fieldset>
												</form>
											</div>

											<div class="tab-pane" id="daftarBank">
												<form class="form-horizontal" role="form" method="POST" action="{{ URL::to('input_bank') }}">
													{!! csrf_field() !!}
													<fieldset>
														<input type="hidden" value="default.png" name="url_foto">

								                        <!-- Register LKM -->
								                        <input type="hidden" value="3" name="admin">
														
														<div class="control-group form-group{{ $errors->has('name') ? ' has-error' : '' }}">
								                            <label class="col-md-4 control-label">Nama Bank</label>

								                            <div class="col-md-6 controls">
								                                <input required type="text" class="form-control" name="name" value="{{ old('name') }}">

								                                @if ($errors->has('name'))
								                                    <span class="help-block">
								                                        <strong>{{ $errors->first('name') }}</strong>
								                                    </span>
								                                @endif
								                            </div>
								                        </div>
														
														<div class="control-group form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								                            <label class="col-md-4 control-label">Email Bank</label>

								                            <div class="col-md-6 controls" >
								                                <input required type="email" class="form-control" name="email" value="{{ old('email') }}">

								                                @if ($errors->has('email'))
								                                    <span class="help-block">
								                                        <strong>{{ $errors->first('email') }}</strong>
								                                    </span>
								                                @endif
								                            </div>
								                        </div>

								                        <div class="control-group form-group{{ $errors->has('password') ? ' has-error' : '' }}">
								                            <label class="col-md-4 control-label">Password</label>

								                            <div class="col-md-6 controls">
								                                <input required type="password" class="form-control" name="password">

								                                @if ($errors->has('password'))
								                                    <span class="help-block">
								                                        <strong>{{ $errors->first('password') }}</strong>
								                                    </span>
								                                @endif
								                            </div>
								                        </div>

								                        <div class="control-group form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
								                            <label class="col-md-4 control-label">Konfirmasi Password</label>

								                            <div class="col-md-6 controls">
								                                <input required type="password" class="form-control" name="password_confirmation">

								                                @if ($errors->has('password_confirmation'))
								                                    <span class="help-block">
								                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
								                                    </span>
								                                @endif
								                            </div>
								                        </div>

														
														<div class="form-group">
								                            <div class="col-md-6 col-md-offset-4">
								                                <button type="submit" class="btn btn-primary">
								                                    <i class="fa fa-btn fa-user"></i>Daftar Bank
								                                </button>
								                            </div>
								                        </div>

													</fieldset>
												</form>
											</div>
											
											<div class="tab-pane active" id="lihatBank">
													<fieldset>
															                                
															<div class="control-group">
															<div id="list_ukm" class="tab-pane">
																
																<div class="widget-content">
																	  
																	  <table class="table table-striped table-bordered">
																		<thead>
																		  <tr>
																			<th> ID Bank </th>
																			<th> Nama Bank </th>
																			<th> Email </th>
																			<th> Password </th>
																			<th class="td-actions"> Action </th>
																		  </tr>
																		</thead>
																		<tbody>
																		  @foreach($listbank as $bank)
																		  <tr>
																			<td> {{$bank->id}} </td>
																			<td> {{$bank->name}} </td>
																			<td> {{$bank->email}} </td>
																			<td> {{$bank->password}} </td>
																			<td class="td-actions"><center><form class="form-horizontal" role="form" method="POST" action="{{ URL::to('hapusbank') }}">{!! csrf_field() !!}<input type="hidden" value="{{$bank->id}}" name="id"><button type="submit" class="btn btn-danger"><i class="fa fa-btn fa-user"></i>Delete</button></form></center></td>
																		  </tr>
																		  @endforeach
																		</tbody>
																	  </table>
																	  
																	  <?php echo $listbank->render(); ?>
																	</div>
															</div> <!-- /controls -->	
													</div> <!-- /control-group -->
													<br />
														</fieldset>
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

	@elseif (Auth::user()->admin==1)
			<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />

	@elseif (Auth::user()->admin==2)
			<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />

	@elseif (Auth::user()->admin==3)
			<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />
		
	@endif
@endsection
