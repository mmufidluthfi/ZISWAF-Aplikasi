@extends('dashboard.dashboard')

	@section('content')
	<section class="content">
		<section class="widget" style="height: 300px; min-height:200px">
			<header>
				<span class="icon">&#128196;</span>
				<hgroup>
					<h1>Ganti Password</h1>
					<h2>Silahkan Ganti Password Anda Disini</h2>
				</hgroup>
			</header>
			<div class="content">
				<div class="field-wrap">
					<input type="text" value="Password Lama"/>
				</div>
				<div class="field-wrap">
					<input type="text" value="Password Baru"/>
				</div>
				<div class="field-wrap">
					<input type="text" value="Konfirmasi Password Baru"/>
				</div>
					<button type="submit" class="green">Simpan</button>
			</div>
		</section>
	</section>
	
@endsection

