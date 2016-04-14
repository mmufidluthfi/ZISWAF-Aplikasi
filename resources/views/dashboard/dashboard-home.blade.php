@extends('layouts.dashboard')

	@section('content')
		<section class="content">
			<div class="widget-container">
			<center>
					<a href="{{ url('/dashboard/pendanaan')}}"><img src="{{URL::to('dashboard/images/button_pendanaan.png')}}" alt="" width="300" height="300" /></a> 
					<a href="{{ url('/dashboard/laporan')}}"><img src="{{URL::to('dashboard/images/button_laporan.png')}}" alt="" width="300" height="300" /></a> 
					<a href="{{ url('/dashboard/edit-profile')}}"><img src="{{URL::to('dashboard/images/button_profile.png')}}" alt="" width="300" height="300" /></a> 
			</center>
			</div>
		</section>
	
@endsection

