@extends('layouts.dashboard')

@section('content')

	@if (Auth::guest())

		<meta http-equiv="refresh" content="0;URL='{{ url('/login') }}'" />

		@elseif (Auth::user()->admin==5)
			
		<nav>
		<ul>
			
			<li ><a href="#"> Pendanaan Usaha</a>
			<ul class="submenu">
				<li><a href="{{ url('/person/dashboard-pendanaanusaha')}}/{{ Auth::user()->id }}">Daftar Pendanaan Bank</a></li>
				<li><a href="{{ url('/person/dashboard-reportusahabank')}}/{{ Auth::user()->id }}">Laporan Pendanaan Bank</a></li>
			</li>
			</ul>
			<li ><a href="{{ url('/person/dashboard-pendanaancrowd')}}/{{ Auth::user()->id }}">Laporan Proyek</a></li>
			<li ><a href="{{ url('/person/dashboard-pendanaanziswaf')}}/{{ Auth::user()->id }}">Laporan Ziswaf </a>
			</li>
			
		</ul>
		</nav>

			<section class="content">
			<section class="widget">
				<header>
					<span class="icon">&#128196;</span>
					<hgroup>
						<h1>Daftar Pendanaan Usaha</h1>
					</hgroup>
				</header>
				<div class="content">
				<center><font size="+2">Submit Pendanaan Usaha</font></center><br>
				<div style="overflow-x:auto;">
					<table id="myTable" border="0" width="100">
					<thead>
						<tr>
							<th>Nama Pendanaan</th>
							<th>Nama Bank</th>
							<th>Nominal (Rp)</th>
							<th>Tanggal Permohonan</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<form action="{{ URL::to('createPendanaanUsahaBank') }}" method="post">
						{!! csrf_field() !!}

						<input type="hidden" value="{{ Auth::user()->id }}" name="id_user">

							<tr>
								<td><input required type="text" name="nama_proyek"></td>
								<td>
									<select name="id_bank">
							 			@foreach ($userbankpendanaan as $ubp)
							 				<option value="{{ $ubp->id}}">{{ $ubp->name }}</option>
							 			@endforeach
							 		</select>
								</td>
								<td><input required type="text" name="total_dana"></td>
								<td><input required type="date" name="tgl_pendanaan"></td>

								<td><button type="submit" class="green">Submit</button></td>						
							</tr>
						</form>
						</tbody>
					</table>
					</div>

					<br><br>
					<center><font size="+2">Lihat List Pendanaan Usaha</font></center><br>
					<div style="overflow-x:auto;">
					<table id="myTable" border="0" width="100">
						<thead>
							<tr>
								<th>Nama Pendanaan</th>
								<th>Nama Bank</th>
								<th>Nominal (Rp)</th>
								<th>Tanggal Permohonan</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							@foreach($tampilfundbank as $tfb)
							<tr>
								<td>{{$tfb->nama_proyek}}</td>
								<td>{{$tfb->namabank}}</td>
								<td>{{$tfb->total_dana}}</td>
								<td>{{$tfb->tgl_pendanaan}}</td>
								<td>
									<center>
										<?php 
											if ($tfb->status == 1) {
												echo "<font color='green'>Disetujui Bank</font>";
											} else if ($tfb->status == 2) {
												echo "<font color='red'>Ditolak Bank</font>";
											} else {
												echo "<font color='orange'>Status Pending</font>";
											}
										?>
									</center>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					</div>
					<br><br><?php echo $tampilfundbank->render(); ?>
				</div>
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

		@elseif (Auth::user()->admin==4)
			<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />
	@endif

@endsection

