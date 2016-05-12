@extends('layouts.dashboard')

@section('content')

	@if (Auth::guest())

		<meta http-equiv="refresh" content="0;URL='{{ url('/login') }}'" />

		@elseif (Auth::user()->admin==5)	
				
			<br><br>
			<section class="widget">
				<header>
					<span class="icon">&#128196;</span>
					<hgroup>
						<h1>Submit Laporan Pemanfaatan Dana Penggalangan</h1>
						<h2>Data di Input per hari</h2>
					</hgroup>
				</header>
				<div class="content">
				<div style="overflow-x:auto;">
				<table id="myTable" border="0" >
				<div class="content" width="100">
					<form action="{{ URL::to('uploaddetaillaporanbank') }}" method="post" >
						{!! csrf_field() !!}

						<input type="hidden" value="0" name="sementara_dana">
	                    <input type="hidden" value="0" name="status">
	              

						<div class="field-wrap">
							<input required type="text" name="transaksi" placeholder="Transaksi" />
						</div>

						Tanggal Transaksi : <br>
						<input required type="date" name="tgl_transaksi" id="tgl_transaksi">

						
						Kategori : 
						<select name="kategori">
						    <option value="Pemasukan">Pemasukan</option>
						    <option value="Pengeluaran">Pengeluaran</option>
						</select>
						<br><br>

						<div class="field-wrap">
							<input required type="text" name="jumlah_transaksi" placeholder="Total Dana Yang Dibutuhkan"/>
							<input type="hidden" name="id_laporan_b" value="{{$detailDana['id']}}" ></input>
							<input type="hidden" name="id_by" value="{{$detailDana['ids']}}" ></input>
						</div>
						<button type="submit" class="green">Post</button>
					</form>
				</div>
				</table>
				</div>
				</div>
			</section>

	  		<br><br>
			<section class="widget">
				<header>
					<span class="icon">&#128196;</span>
					<hgroup>
						<h1>Data Transaksi Harian Pemanfaatan Dana Penggalangan</h1>
						<h2>Data di input per hari</h2>
					</hgroup>
				</header>
				<div class="content">
				<div style="overflow-x:auto;">
					<table id="myTable" border="0" width="100">
						<thead>
							<tr>
								<th>Nama Transaksi</th>
								<th>Total Pengeluaran (Rp)</th>
								<th>Total Pemasukan (Rp)</th>
								<th>Saldo Proyek (Rp)</th>
								<th>Jumlah Uang (Rp)</th>
								<th>Tanggal Transaksi</th>
								
							</tr>
						</thead>
						<tbody>							
							@foreach($detailDana['data'] as $rc)		
							<tr>
								<td>{{$rc->akun}}</td>
								<td>{{$rc->total_pengeluaran}}</td>
								<td>{{$rc->total_pemasukan}}</td>
								<td>{{$rc->saldo_dana_usaha}}</td>
								<td>{{$rc->jumlah_transaksi}}</td>
								<td>{{$rc->date}}</td>							
							</tr>
							@endforeach
							</tbody>
						</table>
						</div>
				</div>
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

