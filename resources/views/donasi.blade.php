@extends('layouts.app')

@section('content')
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
                            <div class="donate-form">

                                <div class="content comments">
                                    <h3 class="grey">{{$pendanaand->nama_proyek}}</h3> 
                                    <h6 class="grey">Kategori: {{$pendanaand->kategori}}</h6>
                                </div>
                                <hr class="inline-hr" />

                                <!-- form -->
                                <div class="content">
                                    {!! csrf_field() !!}

                                    @if (Auth::guest())
                                        
                                        <div class="widget-box">
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <center><h3 class="grey"><h3>Silahkan Login Terlebih Dahulu:</h3></center><br/>
                                                </div>

                                                <div class="col-md-6">
                                                    <center><a href="{{ url('/login') }}"><img width="80%" src="{{URL::to('/')}}/images/login-donatur.png"/></a></center>
                                                </div>

                                                 <div class="col-md-6">
                                                    <center><a href="{{ url('/register') }}"><img width="80%" src="{{URL::to('/')}}/images/register-donatur.png"/></a></center>
                                                </div>
                                            </div>
                                        </div>
                                        

                                    @elseif (Auth::user()->admin==1)
                                        <SCRIPT LANGUAGE='JavaScript'>
                                            window.alert('Silahkan Login atau Register Terlebih Dahulu Menggunakan Akun Investor')
                                        </SCRIPT>
                                        
                                        <meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />

                                    @else
                                        <form class="form-horizontal" role="form" method="POST" action="{{action('TransaksiController@save_nominal')}}" >
                                            {!! csrf_field() !!}

                                        <input type="hidden" name="id" value="{{Auth::user()->id}}" />
                                        <input type="hidden" name="id_pendanaan" value="{{$pendanaand->id_pendanaan}}" />
                                        <input type="hidden" name="konfirmasi" value="belum" />
                                        <input type="hidden" name="status" value="0" />
                                        <input type="hidden" name="tanggal_transaksi" value="tanggal_transaksi" />

                                        <!-- widget box -->
                                        <div class="widget-box">
                                            <div class="form-group">
                                                <center><h3 class="grey"><h3>Nominal Pendanaan</h3></center>
                                                <div class="col-md-2">
                                                    <h4>Rp</h4>
                                                </div>
                                                <div class="col-md-10">
                                                    <input name="nominal" type="text" class="form-control" placeholder="Masukkan Nominal Donasi" />
                                                </div>
                                                <div class="col-md-2"></div>
                                                <div class="col-md-10">
                                                    <p style="color:red"><b>{{$errors->first('nominal')}}</b></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .widget box -->

                                        <center><h3>Informasi Donatur</h3></center>
                                        <center><h6>{{ Auth::user()->name }}</h6></center>
                                        
                                        <!-- widget box -->
                                            <div class="form-group">
                                                    <button type="submit" class="button-normal full blue">
                                                        <i class="fa fa-btn fa-user"></i>Donasi Sekarang
                                                    </button>
                                            </div>                                    
                                        <!-- .widget-box -->
                                        </form>
                                    @endif

                                    
                                </div>
                                <!-- .form -->

                            </div>
                        </div>
                    </div>
                </div>
                <!-- .map -->

            </div>
        </div>
    </section>
    <!-- .donate -->
    
@endsection
