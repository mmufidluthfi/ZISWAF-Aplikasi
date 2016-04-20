@extends('layouts.administrator')

@section('content')
		<div class="content">

			<center><br/><br/><br/><br/>
					<a href="{{URL::to('administrator/transaksidonasi')}}"><img src="{{URL::to('administrator/transaksidonasi.png')}}" alt="" width="220" height="220" /></a> 
					<a href="{{URL::to('administrator/listdonasi')}}"><img src="{{URL::to('administrator/listdonasi.png')}}" alt="" width="220" height="220" /></a> 
					<a href="{{URL::to('administrator/submitdonasi')}}"><img src="{{URL::to('administrator/submitdonasi.png')}}" alt="" width="220" height="220" /></a> 
					<a href="{{URL::to('administrator/lihatumkm')}}"><img src="{{URL::to('administrator/lihatumkm.png')}}" alt="" width="220" height="220" /></a> 
					<a href="{{URL::to('administrator/submitumkm')}}"><img src="{{URL::to('administrator/submitumkm.png')}}" alt="" width="220" height="220" /></a> 
			</center>
		
		</div>
@endsection
