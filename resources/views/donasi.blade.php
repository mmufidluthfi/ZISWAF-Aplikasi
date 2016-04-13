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
                                    <h3 class="grey"><a href="#">Help this child to have bright future</a></h3> 
                                    <h6 class="grey">Kategori: Zakat</h6>
                                </div>
                                <hr class="inline-hr" />

                                <!-- form -->
                                <div class="content">
                                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}" >
                                    {!! csrf_field() !!}

                                        <!-- widget box -->
                                        <div class="widget-box">
                                            <div class="form-group">
                                                <center><h3 class="grey"><h3>Nominal Pendanaan:</h3></center>
                                                <div class="col-md-2">
                                                    <h4>Rp</h4>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" placeholder="Masukkan Nominal Donasi" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .widget box -->


                                    @if (Auth::guest())
                                        <!-- widget box -->
                                        <div class="widget-box">
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <center><h3 class="grey"><h3>Biodata Investor:</h3></center>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="Nama Lengkap" name="name" value="{{ old('name') }}"/>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="email" class="form-control" placeholder="Email"  name="email" value="{{ old('email') }}"/>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .widget box -->

                                        <!-- widget box -->
                                        <div class="widget-box">
                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <input type="password" class="form-control" name="password" placeholder="Password" />
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .widget box -->

                                        <!-- widget box -->
                                        <div class="widget-box">
                                                    Sudah Punya Akun? <a href="{{ url('/login') }}">Login</a>
                                        </div>
                                        <!-- .widget box -->

                                    @else
                                        <center><h3>{{ Auth::user()->name }}</h3></center>
                                    @endif

                                        <!-- widget box -->
                                            <div class="form-group">
                                                    <button type="submit" class="button-normal full blue">
                                                        <i class="fa fa-btn fa-user"></i>Donasi Sekarang
                                                    </button>
                                            </div>                                    
                                        <!-- .widget-box -->

                                    </form>
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
