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
				<li class="section"><a href="#"> Pendanaan Usaha</a>
				<ul class="submenu">
					<li class="section"><a href="{{ url('/lkm/dashboard-pendanaanusaha')}}/{{ Auth::user()->id }}">Daftar Pendanaan Bank</a></li>
					<li><a href="{{ url('/lkm/dashboard-reportpendanaanbank')}}/{{ Auth::user()->id }}">Laporan Pendanaan Bank</a></li>
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
			<section class="widget">
				<header>
					<span class="icon">&#128196;</span>
					<hgroup>
						<h1>Daftar Pendanaan Usaha</h1>
					</hgroup>
				</header>
				<div class="content">
				<center><font size="+2">Submit Pendanaan Usaha</font></center><br>
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
						<form action="{{ URL::to('createPendanaanBank') }}" method="post">
						{!! csrf_field() !!}

						<input type="hidden" value="{{ Auth::user()->id }}" name="id_user">

							<tr>
								<td><input type="text" name="nama_proyek"></td>
								<td>
									<select name="id_bank">
							 			@foreach ($userbankpendanaan as $ubp)
							 				<option value="{{ $ubp->id_bank }}">{{ $ubp->nama_bank }}</option>
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

					<br><br>
					<center><font size="+2">Lihat List Pendanaan Usaha</font></center><br>
					<table id="myTable" border="0" width="100">
						<thead>
							<tr>
								<th>Nama Pendanaan</th>
								<th>Nama Bank</th>
								<th>Nama UMKM</th>
								<th>Nominal</th>
								<th>Tanggal Permohonan</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							@foreach($tampilfundbank as $tfb)
							<tr>
								<td>{{$tfb->nama_proyek}}</td>
								<td>{{$tfb->nama_bank}}</td>
								<td>{{$tfb->nama_pj}}</td>
								<td>{{$tfb->total_dana}}</td>
								<td>{{$tfb->tgl_pendanaan}}</td>
								<td>
									<center>
										<?php 
											$statuspending = "0";
											$statuslembaga = "1";
											$statusbank = "2";

											if ($tfb->status == $statuslembaga) {
												echo "<font color='green'>ACC Lembaga</font>";
											} else if ($tfb->status == $statusbank) {
												echo "<font color='green'>ACC Bank</font>";
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
					<br><br><?php echo $tampilfundbank->render(); ?>
				</div>
			</section>
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

