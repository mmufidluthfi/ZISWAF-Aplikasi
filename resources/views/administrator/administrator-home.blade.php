@extends('layouts.administratorZISWAF')

@section('content')
	@if (Auth::guest())

		<meta http-equiv="refresh" content="0;URL='{{ url('/login') }}'" />

	@elseif (Auth::user()->admin==1)

	<div class="main">
	  <div class="main-inner">
	    <div class="container">
	      <div class="row">
	        <div class="span6">
	          <!-- /widget --> 
	        </div>
	        <!-- /span6 -->
	        <div class="span12">
	          <div class="widget">
	          	<ol class="breadcrumb">
					<p><font color="green"><center><?php echo Session::get('message-inputberhasil'); ?></font></center></p>
				</ol>
	            <div class="widget-header"> <i class="icon-bookmark"></i>
	              <h3>Administrator Area</h3>
	            </div>
	            <!-- /widget-header -->
	            <div class="widget-content">
	              <div class="shortcuts"> 
		              <a href="{{ url('administrator/manageuser') }}/{{ Auth::user()->id }}" class="shortcut"><i class="shortcut-icon icon-user"></i> <span class="shortcut-label">Pengguna</span> </a>
		              <a href="{{ url('administrator/verifikasi') }}/{{ Auth::user()->id }}" class="shortcut"> <i class="shortcut-icon icon-ok"></i><span class="shortcut-label">Verifikasi</span> </a>
		              <a href="{{ url('administrator/umkm') }}/{{ Auth::user()->id }}" class="shortcut"><i class="shortcut-icon icon-home"></i><span class="shortcut-label">UMKM</span> </a>
		              <a href="{{ url('administrator/pendanaan') }}/{{ Auth::user()->id }}" class="shortcut"><i class="shortcut-icon icon-file"></i><span class="shortcut-label">Proyek</span> </a>
		              <a href="{{ url('administrator/dana') }}/{{ Auth::user()->id }}" class="shortcut"><i class="shortcut-icon icon-money"></i><span class="shortcut-label">Pendanaan</span> </a>
		              <a href="report.html" class="shortcut"><i class="shortcut-icon icon-signal"></i><span class="shortcut-label">Report</span> </a> 
	              </div>
	              <!-- /shortcuts --> 
	            </div>
	            <!-- /widget-content --> 
	          </div>
	          <!-- /widget -->
	          <div class="widget"> 
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
