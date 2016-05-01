@extends('layouts.administratorZISWAF')

@section('content')
	@if (Auth::guest())

		<meta http-equiv="refresh" content="0;URL='{{ url('/login') }}'" />

	@elseif (Auth::user()->admin==1)

	<div class="main">
	  <div class="main-inner">
	    <div class="container">

	      <div class="row">
	      	<ol class="breadcrumb">
				<p><font color="green"><center><?php echo Session::get('message-inputberhasil'); ?></font></center></p>
			</ol>
	      </div>

	      <div class="row">
	        <div class="span6">
	          <!-- /widget --> 
	        </div>
	        <!-- /span6 -->
	        <div class="span6">
	          <div class="widget">
	          	
	            <div class="widget-header"> <i class="icon-bookmark"></i>
	              <h3>Administrator Area</h3>
	            </div>
	            <!-- /widget-header -->
	            <div class="widget-content">
	              <div class="shortcuts"> 
		              <a href="{{ url('administrator/manageuser') }}/{{ Auth::user()->id }}" class="shortcut"><i class="shortcut-icon icon-user"></i> <span class="shortcut-label">Pengguna</span> </a>
		              <a href="{{ url('administrator/verifikasi') }}/{{ Auth::user()->id }}" class="shortcut"> <i class="shortcut-icon icon-ok"></i><span class="shortcut-label">Verifikasi</span> </a><br>
		              <a href="{{ url('administrator/umkm') }}/{{ Auth::user()->id }}" class="shortcut"><i class="shortcut-icon icon-home"></i><span class="shortcut-label">UMKM</span> </a>
		              <a href="{{ url('administrator/pendanaan') }}/{{ Auth::user()->id }}" class="shortcut"><i class="shortcut-icon icon-file"></i><span class="shortcut-label">Proyek</span> </a><br>
		              <a href="{{ url('administrator/dana') }}/{{ Auth::user()->id }}" class="shortcut"><i class="shortcut-icon icon-money"></i><span class="shortcut-label">Pendanaan</span> </a>
		              <a href="report.html" class="shortcut"><i class="shortcut-icon icon-signal"></i><span class="shortcut-label">Report</span> </a> 
	              </div>
	              <!-- /shortcuts --> 
	            </div>
	            <!-- /widget-content --> 
	          </div>
	          
	        </div>

	        <div class="span6">
	        	<div class="widget">
	          	
		            <div class="widget-header"> <i class="icon-bookmark"></i>
		              <h3>Daftar Bank Lembaga</h3>
		            </div>
		            <!-- /widget-header -->
			             <div class="widget-content">
			              	<table class="table table-striped table-bordered">
				                <thead>
				                  <tr>
				                    <th>Nama Bank</th>
									<th>Nomor Rekening / Atas Nama</th>
				                  </tr>
				                </thead>
				                <tbody>
				                <form class="form-horizontal" role="form" method="POST" action="{{ URL::to('updatebank') }}">
								{!! csrf_field() !!}
				                @foreach($rekeningbank as $rkb)

								<input type="hidden" value="{{ Auth::user()->id }}" name="lembagaID">

					                  <tr>
										<td><input type="text" name="namarekening1" placeholder="{{$rkb->namarekening1}}"></td>
										<td><input type="text" name="nomorrekening1" placeholder="{{$rkb->nomorrekening1}}"></td>
					                  </tr>	
					                  <tr>
										<td><input type="text" name="namarekening2" placeholder="{{$rkb->namarekening2}}"></td>
										<td><input type="text" name="nomorrekening2" placeholder="{{$rkb->nomorrekening2}}"></td>
					                  </tr>	
					                  <tr>
										<td><input type="text" name="namarekening3" placeholder="{{$rkb->namarekening3}}"></td>
										<td><input type="text" name="nomorrekening3" placeholder="{{$rkb->nomorrekening3}}"></td>
					                  </tr>	
					                  <tr>
										<td><input type="text" name="namarekening4" placeholder="{{$rkb->namarekening4}}"></td>
										<td><input type="text" name="nomorrekening4" placeholder="{{$rkb->nomorrekening4}}"></td>
					                  </tr>
				                  @endforeach	
				                  <tr>
					                  <td></td>
					                  <td>
				                  		<center>
				                  	  		<button type="submit" class="btn btn-primary">Update</button> 
				                  		</center>
					                  </td>
				                  </tr>	
				                </form>							                
				                </tbody>
				              </table>
			             </div>
		              <!-- /shortcuts --> 
		            </div>
		            <!-- /widget-content --> 
		          </div>
	        </div>

	        <!-- /span6 --> 
	      </div>
	      <!-- /row --> 
	    </div>
	    <!-- /container --> 
	  </div>
	  <!-- /main-inner --> 
	</div>
	<!-- /main -->

	@elseif (Auth::user()->admin==0)
			<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />
		
	@endif
@endsection
