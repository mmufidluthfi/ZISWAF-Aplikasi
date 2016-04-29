@extends('layouts.dashboard')

@section('content')
	@if (Auth::guest())

		<meta http-equiv="refresh" content="0;URL='{{ url('/login') }}'" />

		@elseif (Auth::user()->admin==0)
	<nav>
		<ul>
			<li><a href="{{ url('/dashboard/home')}}"><span class="icon">&#128711;</span> Dashboard</a></li>
			<li><a href="{{ url('/dashboard/pendanaan')}}/{{ Auth::user()->id }}"><span class="icon">&#127758;</span> Pendanaan</a></li>
			<li><a href="{{ url('/dashboard/laporan')}}/{{ Auth::user()->id }}"><span class="icon">&#128203;</span> Laporan</a></li>
			<li class="section"><a href="{{ url('/dashboard/pengaturan')}}"><span class="icon">&#9881;</span>Pengaturan</a></li>
		</ul>
		<br/><br/><center><img src="{{URL::to('/')}}../images/logo_white.png "/></center>
	</nav>

	<section class="content">
		<div class="widget-container">
			<section class="widget small">
				<header>
					<span class="icon">&#59168;</span>
					<hgroup>
						<h1>Ganti Password</h1>
						<h2>Silahkan Ganti Password Anda Disini</h2>
					</hgroup>
				</header>
				<div class="content no-padding timeline">
					<div class="content">
						<form action="{{ URL::to('editpassword') }}" method="post">
                            {!! csrf_field() !!}

                            <input type="hidden" value="{{ Auth::user()->id }}" name="id_userpassword">
                            <input type="hidden" value="{{ Auth::user()->password }}" name="password_userpassword">

							<div class="field-wrap">
								<br/><br/>Password Lama : <br/><br/>
								<input type="password" name="passlama"/>
								@if($errors->has('passlama'))
									<font color="red"> {{ $errors->first('passlama')}}</font>
								@endif
							</div>
							<div class="field-wrap">
								<br/><br/>Password Baru : <br/><br/>
								<input type="password" name="password"/>
								@if($errors->has('password'))
									<font color="red"> {{ $errors->first('password')}}</font>
								@endif
							</div>
							<div class="field-wrap">
								<br/><br/>Password Baru : <br/><br/>
								<input type="password" name="konfirmasipassbaru"/>
								@if($errors->has('konfirmasipassbaru'))
									<font color="red"> {{ $errors->first('konfirmasipassbaru')}}</font>
								@endif
							</div>
								<button type="submit" class="green">Simpan</button>
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
						<center><font color="red"><?php echo Session::get('message-uploadgagal'); ?></font></center><br><br>
						<div class="profile-img">
							<center><p><img src="{{URL::to('dashboard/images/fotoprofile')}}/{{ Auth::user()->url_foto }}" alt="" height="150" width="150" /></p></center>
						</div>

						<form action="{{ URL::to('uploadfoto') }}" method="post" enctype="multipart/form-data">
                            {!! csrf_field() !!}

                            <input type="hidden" value="{{ Auth::user()->id }}" name="id_usergambar">

							<div class="field-wrap">
								<input type="file" name="filefoto" id="filefoto">
							</div>
							<button type="submit" value="Upload" name="submit" class="green">Update Foto</button>
						</form> 
					</div>
				</div>
			</section>
		</div>
	</section>

	@elseif (Auth::user()->admin==1)
			<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />
		
	@endif
		
@endsection

