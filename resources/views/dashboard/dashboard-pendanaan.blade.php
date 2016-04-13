@extends('layouts.dashboardapp')

@section('contentdashboard')
	<section class="content">
		<section class="widget">
			<header>
				<span class="icon">&#128196;</span>
				<hgroup>
					<h1>Pendanaan</h1>
					<h2>Laporan Pendanaan Yang Anda Lakukan</h2>
				</hgroup>
			</header>
			<div class="content">
				<table id="myTable" border="0" width="100">
					<thead>
						<tr>
							<th>Judul Pendanaan</th>
							<th>Jenis Pendanaan</th>
							<th>Nominal Pendanaan</th>
							<th>Tanggal</th>
							<th>Status</th>
						</tr>
					</thead>
						<tbody>
							<tr>
								<td>Urgent surgery needed for this child</td>
								<td>Zakat</td>
								<td>Rp 1000000</td>
								<td>01/4/2016</td>
								<td><button class="green">Sukses</button></td>
							</tr>
							<tr>
								<td>Help this mother to buy new house</td>
								<td>Infaq</td>
								<td>Rp 200000</td>
								<td>02/4/2016</td>
								<td><button class="orange">Pending</button></td>
							</tr>
							<tr>
								<td>Education center need your help a.s.a.p.</td>
								<td>Sadaqah</td>
								<td>Rp 100000</td>
								<td>03/4/2016</td>
								<td><button class="red">Gagal</button></td>
							</tr>
						</tbody>
					</table>
			</div>
		</section>
	</section>
	
@endsection

