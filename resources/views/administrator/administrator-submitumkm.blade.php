@extends('layouts.administrator')

@section('content')
		
		<br><br>
		<section class="widget">
			<header>
				<span class="icon">&#128196;</span>
				<hgroup>
					<h1>Pendaftaran UMKM</h1>
					<h2>Submit UMKM yang Sudah Diverifikasi</h2>
				</hgroup>
			</header>
			<div class="content">
				<form action="{{ URL::to('uploadumkm') }}" method="post" enctype="multipart/form-data">
					{!! csrf_field() !!}

					<div class="field-wrap">
						<input type="text" name="username" placeholder="Username" />
					</div>

					<div class="field-wrap">
						<input type="text" name="password" placeholder="Password"/>
					</div>

					<div class="field-wrap">
						<input type="text" name="nama_pj" placeholder="Nama Penanggung Jawab"/>
					</div>

					<div class="field-wrap">
						<input type="text" name="email" placeholder="Alamat Email Penanggung Jawab"/>
					</div>

					<div class="field-wrap">
						<input type="text" name="no_hp" placeholder="Nomor HP Penanggung Jawab"/>
					</div>

					<div class="field-wrap">
						<input type="text" name="alamat_pj" placeholder="Alamat Penanggung Jawab"/>
					</div>

					<div class="field-wrap">
						<input type="text" name="alamat_umkm" placeholder="Alamat UMKM"/>
					</div>
					
					Upload Foto Proyek : <br>
					<input type="file" name="file" id="file">

					<button type="submit" class="green">Submit</button>
				</form>
			</div>
		</section>
			
@endsection
