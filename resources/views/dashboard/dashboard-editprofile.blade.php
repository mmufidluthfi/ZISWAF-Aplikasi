@extends('layouts.dashboard')

	@section('content')
	<section class="content">
		<section class="widget" style="height: 550px; min-height:400px">
			<header>
				<span class="icon">&#128196;</span>
				<hgroup>
					<h1>Edit Profile</h1>
					<h2>Silahkan Edit Profile Anda Disini</h2>
				</hgroup>
			</header>
			<div class="content">
				<div class="field-wrap">
					<input type="text" value="Nama Lengkap"/>
				</div>
				<div class="field-wrap">
					<input type="text" value="Email"/>
				</div>
				<div class="field-wrap">
					<input type="text" value="No HP"/>
				</div>
				<div class="field-wrap">
					<input type="text" value="Alamat"/>
				</div>
				<div class="field-wrap wysiwyg-wrap">
					<br/><b>Biografi Singkat :</b>
					<textarea rows="4" value="Biografi Singkat"></textarea>
				</div>
					<button type="submit" class="green">Simpan</button>
			</div>
		</section>
	</section>

@endsection