@extends('layouts.adminbank')

@section('content')
	@if (Auth::guest())

		<meta http-equiv="refresh" content="0;URL='{{ url('/login') }}'" />

	@elseif (Auth::user()->admin==3)

		@foreach($pendanaanbankdetails as $pdbankdetails)
		<main class="container">
	        <div class="row">
	            <div class="col-md-4 main-info">
	                <div>
	                    <img src="{{ url('/images/avatar') }}/{{$pdbankdetails->foto_pj}}" alt="" class="owner img-circle" height="75px">
	                    <div class="contacts">
	                        <span style="color: #58A965;"><b>{{$pdbankdetails->nama_pj}}</b></span> <?php 

																							if ($pdbankdetails->status == 1) {
																								echo "<span class='label label-success'>Verified Lembaga</span>";
																							} else if ($pdbankdetails->status == 3) {
																								echo "<span class='label label-success'>Verified Bank</span>";
																							} else if ($pdbankdetails->status == 4) {
																								echo "<span class='label label-danger'>Reject Bank</span>";
																							}
																						?>
	                        <br> {{$pdbankdetails->email}}
	                        <br> {{$pdbankdetails->no_hp}}
	                        <br>
	                    </div>
	                    <hr>
	                </div>

	                <?php 

					if ($pdbankdetails->status == 1 || $pdbankdetails->status == 4) { ?>

		                <div class="invoicebox">
		                    <h3>Upload Invoice</h3>
		                    <div class="input-group">
		                    	<form action="{{ URL::to('uploadinvoicebank') }}" method="post" enctype="multipart/form-data">
	                                {!! csrf_field() !!}
	                                <input type="hidden" value="{{$pdbankdetails->id_bank}}" name="id_bank">
	                                <input type="hidden" value="{{$pdbankdetails->id_pendanaan_bank}}" name="id_pendanaan_bank">
	                                <input type="hidden" value="3" name="status">

	                                <input type="file" name="file" id="file" class="form-control">
	                                <center>
	                                	<table border="0">
			                        	 <th>
			                        	 	<td>
			                        			<button type="submit" value="Upload" name="submit" class="btn btn-success">Diterima</button></form>&nbsp; &nbsp;</td>
			                        	 	<td><form action="{{ URL::to('uploadinvoicereject') }}" method="post">{!! csrf_field() !!}<input type="hidden" value="{{$pdbankdetails->id_pendanaan_bank}}" name="id_pendanaan_bank"><input type="hidden" value="4" name="status"><input type="hidden" value="{{$pdbankdetails->id_bank}}" name="id_bank"><button class="btn btn-danger" type="submit" value="Upload" name="submit" >Ditolak</button></form></td>
			                        	 </th>
			                        	</table>
		                        	</center>
		                    </div>
		                </div>
		              <?php 
		              } else if ($pdbankdetails->status == 3) { ?>
		              	<div class="invoicebox accepted">
		                    <h3>Selamat</h3>
		                    <h5>Proyek Sudah Terdanai</h5>
		                </div>
		              <?php } ?>
	            </div>

	            <div class="col-md-8 description">
	                <div class="primaryinfo" style="background-image: url('{{ url('bank/img') }}/city-wallpaper-47.jpg')">
	                    <div class="meta">
	                    	<br><br>
	                        <h3>Alamat UMKM</h3>
	                        <h5>{{$pdbankdetails->alamat_pj}}</h5>
	                        <h3>Tanggal Terdaftar</h3>
	                        <h5>{{$pdbankdetails->tgl_daftarumkm}}</h5>
	                        <br/>
	                        <h3>Nama LKM</h3>
	                        <h5>{{$pdbankdetails->name}}</h5>
	                        <h3>Nama Proyek</h3>
	                        <h5>{{$pdbankdetails->nama_proyek}}</h5>
	                        <h3>Total Dana</h3>
	                        <h5>{{$pdbankdetails->total_dana}}</h5>
	                        <br><br>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </main>
		@endforeach

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
