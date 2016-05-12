@extends('layouts.dashboard')

@section('content')

	@if (Auth::guest())

		<meta http-equiv="refresh" content="0;URL='{{ url('/login') }}'" />

		@elseif (Auth::user()->admin==2)

		<nav>
		<ul>
			<li><a href="#"> Penggalangan Dana</a>
				<ul class="submenu">
				<li><a href="{{ url('/lkm/listcrowd')}}/{{ Auth::user()->id }}">Daftar Penggalangan Dana</a></li>
				<li><a href="{{ url('/lkm/laporancrowd')}}/{{ Auth::user()->id }}">Laporan Penggalangan Dana</a></li>
				</ul>
			</li>
			<li><a href="#"> Pendanaan Lembaga ZISWAF</a>
			<ul class="submenu">
				<li><a href="{{ url('/lkm/dashboard-listpendanaanziswaf')}}/{{ Auth::user()->id }}">Daftar Pendanaan Lembaga</a></li>
				<li><a href="{{ url('/lkm/dashboard-reportpendanaanziswaf/')}}/{{ Auth::user()->id }}">Laporan Pendanaan Lembaga</a></li>
				</ul>
			</li>
		</ul>
		</nav>
		
			<section class="content">
				<div class="widget-container">
					<section class="widget small">
						<header>
							<span class="icon">&#59168;</span>
							<hgroup>
								<h1>Daftar Anggota UMKM</h1>
								<h2>Silahkan Masukkan Data Baru Disini Anda Disini</h2>
							</hgroup>
						</header>
						<div class="content no-padding timeline">
							<div class="content">
								<center><font color="green"><?php echo Session::get('message-inputberhasil'); ?></font></center><br>
								<form class="form-horizontal" role="form" method="POST" action="{{ URL::to('input_umkm') }}">
									{!! csrf_field() !!}
									<fieldset>
									
										<input type="hidden" value="default.png" name="url_foto">
										<input type="hidden" value="{{ Auth::user()->id }}" name="lembagaID">

				                        <!-- Register LKM -->
				                        <input type="hidden" value="5" name="admin">
										
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
				                                    <i class="fa fa-btn fa-user"></i>Daftar UMKM
				                                </button>
				                            </div>
				                        </div>

									</fieldset>
								</form>
							</div>
						</div>
					</section>
					
					<section class="widget small">
						<header> 
							<span class="icon">&#128362;</span>
							<hgroup>
								<h1>Ganti Foto Profile</h1>
								<h2>Disarankan Ukuran 200 x 200</h2>
							</hgroup>
						</header>
						<div class="content no-padding timeline">
							<div class="content">
								KONTEN DISINI 
							</div>
						</div>
					</section>
				</div>
			</section>

		@elseif (Auth::user()->admin==0)
			<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />

		@elseif (Auth::user()->admin==1)
			<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />
		
		@elseif (Auth::user()->admin==3)
			<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />

		@elseif (Auth::user()->admin==4)
			<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />
		
	@endif

@endsection

