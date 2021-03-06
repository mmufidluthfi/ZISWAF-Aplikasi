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
					<h3 class="page-header"><i class="fa fa-user-md"></i> User Management</h3>
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
										    <a href="#formcontrols1" data-toggle="tab">Pendaftaran akun LKM</a>
										  </li>
										  <li class="active">
										    <a href="#jscontrols1" data-toggle="tab">List LKM</a>
										  </li>
										</ul>
									
										<br>
									
										<div class="tab-content">
											<div class="tab-pane " id="formcontrols1">
												<form class="form-horizontal" role="form" method="POST" action="{{ URL::to('input_lkm') }}">
													{!! csrf_field() !!}
													<fieldset>
													
														<input type="hidden" value="default.png" name="url_foto">
														<input type="hidden" value="{{ Auth::user()->id }}" name="lembagaID">

								                        <!-- Register LKM -->
								                        <input type="hidden" value="2" name="admin">
														
														<div class="control-group form-group{{ $errors->has('name') ? ' has-error' : '' }}">
								                            <label class="col-md-4 control-label">Nama Lengkap</label>

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
								                            <label class="col-md-4 control-label">Email</label>

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
								                                    <i class="fa fa-btn fa-user"></i>Daftar LKM
								                                </button>
								                            </div>
								                        </div>

													</fieldset>
												</form>
											</div>

											<div class="tab-pane active" id="jscontrols1">
													<fieldset>
														                                
														<div class="control-group">
														<div id="list_ukm" class="tab-pane">
															
															<div class="widget-content">
															
															  <table class="table table-striped table-bordered">
																<thead>
																  <tr>
																	<th> ID LKM </th>
																	<th> Nama PJ LKM </th>
																	<th> Email </th>
																	<th> Password </th>
																	<th class="td-actions"> Action </th>
																  </tr>
																</thead>
																<tbody>
																@foreach($listlkm as $lkm)
																  <tr>
																	<td> {{$lkm->id}} </td>
																	<td> {{$lkm->name}} </td>
																	<td> {{$lkm->email}} </td>
																	<td> {{$lkm->password}} </td>
																	<td class="td-actions"><center><form class="form-horizontal" role="form" method="POST" action="{{ URL::to('hapuslkm') }}">{!! csrf_field() !!}<input type="hidden" value="{{$lkm->id}}" name="id"><button type="submit" class="btn btn-danger"><i class="fa fa-btn fa-user"></i>Delete</button></form></center></td>
																  </tr>
																  @endforeach
																</tbody>
															  </table>
															  

															  <?php echo $listlkm->render(); ?>
															</div>
														</div> <!-- /controls -->	
														</div> <!-- /control-group -->
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

	@elseif (Auth::user()->admin==2)
			<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />
			
	@elseif (Auth::user()->admin==3)
			<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />

	@elseif (Auth::user()->admin==4)
			<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />
		
	@endif
@endsection