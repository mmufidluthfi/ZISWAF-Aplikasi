@extends('layouts.app')

@section('content')
    @if (Auth::guest())

        <meta http-equiv="refresh" content="0;URL='{{ url('/login') }}'" />

    @elseif (Auth::user()->admin==1)

        <meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />

    @else
    
	    <!-- breadcrumbs -->
    <section class="breadcrumbs">
        <div class="breadcrumbs-wrapper">
            <div class="container">
                <div class="row">

                    <!-- page title -->
                    <div class="col-md-6 col-xs-6">
                        <h4>Donasi</h4>
                    </div>
                    <!-- .page title -->

                    <!-- breadcumbs -->
                    <div class="col-md-6 col-xs-6">
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a>
                            </li>
                            <li class="active"><a href="#">Donasi</a>
                            </li>
                        </ol>
                    </div>
                    <!-- .breadcrumbs -->
                </div>
            </div>
        </div>
    </section>
    <!-- .breadcrumbs -->

    <!-- donate -->
    <section>
        <div class="container">
            <div class="row">

                <!-- map -->
                <div class="col-md-6 col-md-push-3">
                    <div class="box-wrapper">
                        <div class="box">
                            <br/><center><h3>Invoice Pendanaan</h3></center>

                            <div class="content comments">
                                <h3 class="grey">{{$pendanaaninvoice->nama_proyek}}</h3> 
                                <h6 class="grey">Kategori: {{$pendanaaninvoice->kategori}}</h6>
                                <p>
                                	Nama : {{Auth::user()->name}}<br/>
                                	Nominal : Rp <?php echo Session::get('nominal-status'); ?>,-<br/>
                                	Status : Belum Transfer<br/>
                                </p>
                                <center><a href="{{url('/dashboard/home')}}"><img src="{{URL::to('/')}}/images/Dashboard.png"><br/>Kembali ke Halaman Dashboard</a></center>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .map -->

            </div>
        </div>
    </section>
    <!-- .donate -->
    @endif
@endsection
