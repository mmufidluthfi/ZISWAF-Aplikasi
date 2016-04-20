@extends('layouts.administrator')

@section('content')
		
		<br><br>
		<section class="widget">
			<header>
				<span class="icon">&#128196;</span>
				<hgroup>
					<h1>List UMKM</h1>
					<h2>Daftar UMKM yang Resmi Terdaftar</h2>
				</hgroup>
			</header>
			<div class="content">
				
				<table id="myTable" border="0" >
					<thead>
						<tr>
							<th>ID UMKM</th>
							<th>Username</th>
							<th>Password</th>
							<th>Nama PJ</th>
							<th>Email</th>
							<th>Nama Proyek</th>
							<th>No HP</th>
							<th>Alamat PJ</th>
							<th>Alamat UMKM</th>
							<th>Foto PJ</th>
						</tr>
					</thead>

					<tbody>
					@foreach($userumkm as $usrumkm)
						<tr>
							<td><strong><font color="red">{{$usrumkm->id_umkm}}</font></strong></td>
							<td>{{$usrumkm->username}}</td>
							<td>{{$usrumkm->password}}</td>
							<td>{{$usrumkm->nama_pj}}</td>
							<td>{{$usrumkm->email}}</td>
							<td>{{$usrumkm->no_hp}}</td>
							<td>{{$usrumkm->alamat_pj}}</td>
							<td>{{$usrumkm->alamat_umkm}}</td>
							<td><a target="_blank" href="{{URL::to('images/avatar/')}}/{{$usrumkm->foto_pj}}"><button>Lihat</button></a></td>
						</tr>
					@endforeach
					</tbody>
				</table>

				<br><br>
				<?php echo $userumkm->render(); ?>

			</div>
		</section>

			
@endsection
