@extends('layouts.adminbank')

@section('content')
	@if (Auth::guest())

		<meta http-equiv="refresh" content="0;URL='{{ url('/login') }}'" />

	@elseif (Auth::user()->admin==3)

		<main class="container">
	        <div class="row">
	            <div class="col-md-4">

	            </div>
	            <div class="col-md-4">
	            	<center><h2>Selamat Datang {{ Auth::user()->name }}</h2>
	            	@foreach($idbank as $idb)
	            	<br><br><p>Lihat Pendanaan Bank <a href="{{ url('bank/pendanaan') }}/{{$idb->id_bank}}"><b>disini</b><br><br><img src="{{ url('bank/img') }}/BankFunding.png"/ ></a></p></center>
	            	@endforeach
	            </div>
	            <div class="col-md-4">

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
