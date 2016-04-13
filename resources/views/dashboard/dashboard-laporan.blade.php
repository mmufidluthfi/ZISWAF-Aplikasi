@extends('dashboard.dashboard')

	@section('content')
	<section class="content">
		<section class="widget">
			<header>
				<span class="icon">&#128196;</span>
				<hgroup>
					<h1>Laporan</h1>
					<h2>Laporan UMKM Pendanaan ZISWAF Produktif</h2>
				</hgroup>
			</header>
			<div class="content">
				<table id="myTable" border="0" width="100">
					<thead>
						<tr>
							<th>ID UMKM</th>
							<th>Pemilik UMKM</th>
							<th>Keterangan</th>
							<th>Tanggal Upload</th>
							<th>Laporan</th>
						</tr>
					</thead>
						<tbody>
							<tr>
								<td><input type="checkbox" /> 00001</td>
								<td>Muhammad Mufid Luthfi</td>
								<td>Lebih bermanfaat</td>
								<td>01/4/2016</td>
								<td><a href="#">Download</a></td>
							</tr>
							<tr>
								<td><input type="checkbox" /> 00002</td>
								<td>Reicka Sofi Azzura</td>
								<td>Untung Banyak</td>
								<td>02/4/2016</td>
								<td><a href="#">Download</a></td>
							</tr>
							<tr>
								<td><input type="checkbox" /> 00003</td>
								<td>Nana Ramadhewi</td>
								<td>Masih Rugi</td>
								<td>03/4/2016</td>
								<td><a href="#">Download</a></td>
							</tr>
							<tr>
								<td><input type="checkbox" /> 00004</td>
								<td>Elzar</td>
								<td>Masih Rugi</td>
								<td>04/4/2016</td>
								<td><a href="#">Download</a></td>
							</tr>
						</tbody>
					</table>
			</div>
		</section>
	</section>
	
@endsection