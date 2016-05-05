@extends('layouts.adminbank')

@section('content')
	@if (Auth::guest())

		<meta http-equiv="refresh" content="0;URL='{{ url('/login') }}'" />

	@elseif (Auth::user()->admin==3)

		<main class="container">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs nav-justified" role="tablist">
				<li role="presentation" class="active"><a href="#new" aria-controls="new" role="tab" data-toggle="tab">New</a></li>
				<li role="presentation"><a href="#funded" aria-controls="funded" role="tab" data-toggle="tab">Funded</a></li>
				<li role="presentation"><a href="#reject" aria-controls="funded" role="tab" data-toggle="tab">Reject</a></li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane fade in active" id="new">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Nama UMKM</th>
								<th>Nama LKM</th>
								<th>Nama Proyek</th>
								<th>Dana yang Dibutuhkan</th>
								<th>Tanggal Pendanaan</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($pendanaanbank as $pdbank)
								<tr>
									<td>{{$pdbank->nama_pj}}</td>
									<td>{{$pdbank->name}}</td>
									<td>{{$pdbank->nama_proyek}}</td>
									<td>{{$pdbank->total_dana}}</td>
									<td>{{$pdbank->tgl_pendanaan}}</td>
									<td><a href="{{ url('bank/details') }}/{{$pdbank->id_pendanaan_bank}}" class="btn btn-sm btn-primary">Details</a></td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="funded">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Nama UMKM</th>
								<th>Nama LKM</th>
								<th>Nama Proyek</th>
								<th>Dana yang Dibutuhkan</th>
								<th>Tanggal Pendanaan</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($pendanaanbankacc as $pdbankacc)
								<tr>
									<td>{{$pdbankacc->nama_pj}}</td>
									<td>{{$pdbankacc->name}}</td>
									<td>{{$pdbankacc->nama_proyek}}</td>
									<td>{{$pdbankacc->total_dana}}</td>
									<td>{{$pdbankacc->tgl_pendanaan}}</td>
									<td><a target="_blank" href="{{URL::to('bank/img/invoice')}}/{{$pdbankacc->gambar_invoice}}" class="btn btn-sm btn-primary">Lihat Invoice</a>&nbsp; &nbsp;<a href="{{ url('bank/details') }}/{{$pdbankacc->id_pendanaan_bank}}" class="btn btn-sm btn-primary">Details</a></td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="reject">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Nama UMKM</th>
								<th>Nama LKM</th>
								<th>Nama Proyek</th>
								<th>Dana yang Dibutuhkan</th>
								<th>Tanggal Pendanaan</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($pendanaanbankreject as $pdbankreject)
								<tr>
									<td>{{$pdbankreject->nama_pj}}</td>
									<td>{{$pdbankreject->name}}</td>
									<td>{{$pdbankreject->nama_proyek}}</td>
									<td>{{$pdbankreject->total_dana}}</td>
									<td>{{$pdbankreject->tgl_pendanaan}}</td>
									<td><a href="{{ url('bank/details') }}/{{$pdbankreject->id_pendanaan_bank}}" class="btn btn-sm btn-primary">Details</a></td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>

		</main>

	@elseif (Auth::user()->admin==0)
			<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />

	@elseif (Auth::user()->admin==1)
			<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />

	@elseif (Auth::user()->admin==2)
			<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />

	@elseif (Auth::user()->admin==4)
			<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />
		
	@endif
@endsection
