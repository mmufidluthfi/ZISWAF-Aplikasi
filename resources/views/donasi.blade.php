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
                                        <!-- widget box -->
                                        <div class="widget-box">
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <center><h3 class="grey"><h3>Silahkan Login :</h3></center>
                                                </div>
                                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/donasi/3')}}">
                                                    
                                                    <div class="col-md-6">
                                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-mail Address"/>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <input type="password" class="form-control" name="password" placeholder="Password"/>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-md-12"><br/>
                                                            <button type="submit" class="btn btn-primary">
                                                                <i class="fa fa-btn fa-sign-in"></i>Login
                                                            </button>

                                                            Belum Punya Akun? <a class="btn btn-link" href="{{ url('/register') }}"><b>Daftar</b></a>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- .widget box -->

                                    @else
                                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}" >

                                        <!-- widget box -->
                                        <div class="widget-box">
                                            <div class="form-group">
                                                <center><h3 class="grey"><h3>Nominal Pendanaan</h3></center>
                                                <div class="col-md-2">
                                                    <h4>Rp</h4>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" placeholder="Masukkan Nominal Donasi" />
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
