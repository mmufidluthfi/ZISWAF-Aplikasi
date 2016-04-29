@extends('layouts.dashboard')

@section('content')

	@if (Auth::guest())

		<meta http-equiv="refresh" content="0;URL='{{ url('/login') }}'" />

		@elseif (Auth::user()->admin==2)
			
			<section class="widget">
				<header>
					<span class="icon">&#128196;</span>
					<hgroup>
						<h1>Daftar Pendanaan Usaha</h1>
						<h2>Mendaftarkan UMKM ke Bank</h2>
					</hgroup>
				</header>
				<div class="content">
					<table id="myTable" border="0" width="100">
						<thead>
							<tr>
								<th>Nama Pendanaan</th>
								<th>Nama Bank</th>
								<th>Nama UMKM</th>
								<th>Nominal</th>
								<th>Tanggal Permohonan</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<form action="{{ URL::to('createLaporanCrowd') }}" method="post">
							{!! csrf_field() !!}

							<input type="hidden" value="{{ Auth::user()->id }}" name="id_user">
								<tr>
									<td><input type="text" name="nama_proyek"></td>
									<td>
										<select name="id_umkm">
								 			@foreach ($userbankpendanaan as $ubp)
								 				<option value="{{ $ubp->id }}">{{ $ubp->nama_bank }}</option>
								 			@endforeach
								 		</select>
									</td>
									<td>
										<select name="id_umkm">
								 			@foreach ($userumkmpendanaan as $tpl)
								 				<option value="{{ $tpl->id_umkm }}">{{ $tpl->nama_pj }}</option>
								 			@endforeach
								 		</select>
									</td>
									<td><input type="text" name="total_dana"></td>
									<td><input type="date" name="tgl_pendanaan"></td>
									<td><button type="submit" class="green">Submit</button></td>						
								</tr>
							</form>
							</tbody>
						</table>
				</div>
			</section>
		

		@elseif (Auth::user()->admin==1)
			<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />

		@elseif (Auth::user()->admin==0)
			<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />
		
	@endif

@endsection

