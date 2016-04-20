@extends('layouts.app')

@section('content')

    <!-- breadcrumbs -->
    <section class="breadcrumbs">
        <div class="breadcrumbs-wrapper">
            <div class="container">
                <div class="row">

                    <!-- page title -->
                    <div class="col-md-6 col-xs-6">
                        <h4>{{ $pendanaan->nama_proyek}}</h4>
                    </div>
                    <!-- .page title -->

                    <!-- breadcumbs -->
                    <div class="col-md-6 col-xs-6">
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a>
                            </li>
                            <li class="active"><a href="#">Pendanaan</a>
                            </li>
                        </ol>
                    </div>
                    <!-- .breadcrumbs -->
                </div>
            </div>
        </div>
    </section>
    <!-- .breadcrumbs -->

    <!-- blog posts & widgets -->
    <section class="no-bottom-margin">
        <div class="container">
            <div class="row">

                <!-- paginate & posts -->
                <div class="col-md-9">
                
                        <!-- post -->
                        <div class="posts">
                            <div class="row">
                                <div class="col-md-12">


                                    <div class="box-wrapper">
                                        <div class="box">

                                            <!-- slider -->
                                            <aside>

                                                <div id="singleCarousel" class="carousel slide single-page normal" data-ride="carousel" data-interval="false">


                                                    <!-- Indicators -->
                                                    <!-- <ol class="carousel-indicators">
                                                        <li data-target="#singleCarousel" data-slide-to="0" class="active"></li>
                                                        <li data-target="#singleCarousel" data-slide-to="1"></li>
                                                        <li data-target="#singleCarousel" data-slide-to="2"></li>
                                                    </ol> -->


                                                    <!-- Wrapper for slides -->
                                                    <div class="carousel-inner">

                                                        <!-- 1 -->
                                                        <div class="item active">
                                                            <img src="{{URL::to('images/proyek/')}}/{{$pendanaan->foto_proyek}}" alt="" title="" />
                                                        </div>
                                                        <!-- .1 -->
                                                    </div>
                                                    <!-- /Wrapper for slides .carousel-inner -->

                                                    <!-- Controls -->
                                                    <!-- <div class="control-box">
                                                        <a class="left carousel-control" href="#singleCarousel" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                                                        <a class="right carousel-control" href="#singleCarousel" data-slide="next"><i class="fa fa-angle-right"></i></a>
                                                    </div> -->
                                                    <!-- /.control-box -->


                                                </div>
                                                <!-- carousel -->

                                            </aside>
                                            <!-- .slider -->

                                            <!-- content -->
                                            <div class="content comments clearfix">

                                                <!-- rised bar -->
                                                <div class="slider-content cause">
                                                    <input class="rised" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="{{ $pendanaan->total_dana}}" data-slider-step="1" data-slider-enabled="false" data-slider-value="{{ $pendanaan->sementara_dana}}" />
                                                </div>
                                                <!-- .rised bar -->

                                                <!-- rised slider meta -->
                                                <div class="clearfix">
                                                    <p class="pull-left lead">
                                                        <span class="light-grey">Raised:</span>
                                                        Rp {{ $pendanaan->sementara_dana}}
                                                    </p>
                                                    <p class="pull-right lead">
                                                        <span class="light-grey">Goal:</span>
                                                        Rp {{ $pendanaan->total_dana}}
                                                    </p>
                                                </div>
                                                <!-- .rised slider meta -->

                                            </div>
                                            <!-- content -->

                                            <!-- border -->
                                            <hr class="inline-hr" />
                                            <!-- .border -->

                                            <!-- tabs -->
                                            <div class="col-md-12">
                                                <!-- nav -->
                                                <ul class="nav nav-tabs">
                                                    <li class="active"><a data-toggle="tab" href="#sectionA">Informasi</a>
                                                    </li>
                                                    <li><a data-toggle="tab" href="#sectionB">Laporan</a>
                                                    </li>
                                                </ul>
                                                <!-- .nav -->

                                                <!-- content -->
                                                <div class="tab-content">

                                                    <!-- 1 -->
                                                    <div id="sectionA" class="tab-pane fade in active">
                                                        <!-- content -->
                                                        <div class="content">

                                                            <!-- title -->
                                                            <h2><a href="#">{{ $pendanaan->nama_proyek}}</a>
                                                            </h2>
                                                            <!-- .title -->
                                                            <!-- meta -->
                                                            <p>
                                                                <span class="grey">{{ $pendanaan->kategori}}</span>
                                                            </p>
                                                            <!-- .meta -->

                                                        </div>
                                                        <!-- content -->

                                                        <!-- content single -->
                                                        <div class="content single">
                                                            <p><?php echo $pendanaan->deskripsi; ?></p>

                                                        </div>
                                                        <!-- .content single -->
                                                    </div>
                                                    <!-- .1 -->

                                                    <!-- 2 -->
                                                    <div id="sectionB" class="tab-pane fade">
                                                        <div class="content">

                                                            <!-- title -->
                                                            <h2><a href="#">{{ $pendanaan->nama_proyek}}</a>
                                                            </h2>
                                                            <!-- .title -->
                                                            <!-- meta -->
                                                            <p>
                                                                <span class="grey">{{ $pendanaan->kategori}}</span>
                                                            </p>
                                                            <!-- .meta -->
                                                        </div>

                                                        <!-- Laporan -->
                                                        <div class="content">
                                                        
                                                                <table id="myTable" border="0" width="100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Keterangan</th>
                                                                            <th>Tanggal Upload</th>
                                                                            <th>Download Laporan</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach($laporan as $lpr)
                                                                        <tr>
                                                                            <td>{{$lpr->deskripsi_laporan}}</td>
                                                                            <td>{{$lpr->waktu_laporan}}</td>
                                                                            <td><a href="{{$lpr->file_laporan}}">Download</a></td>
                                                                        </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                        
                                                        </div>

                                                    </div>
                                                    <!-- .2 -->
                                                </div>
                                                <!-- . content -->

                                            </div>
                                            <!-- tabs -->

                                            <!-- tags & prev next -->
                                            <div class="content">
                                                <div class="row">

                                                </div>
                                            </div>
                                            <!-- .tags & prev next -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .post -->

                </div>
                <!-- .paginate & posts -->

                <!-- sidebar -->
                <div class="col-md-3">

                    <!-- author widget -->
                    <div class="widget">
                        <div class="widget-author">
                            <div class="box-wrapper">
                                <div class="box">

                                    <!-- widget box -->
                                    <div class="widget-box text-center">
                                        <div class="media author">
                                            <div class="small-product">
                                                <div class="small-product-wrapper">
                                                    <a href="#">
                                                        <img class="media-object img-circle img-thumbnail " src="{{URL::to('images/avatar/')}}/{{$pendanaan->foto_pj}}" title="" alt="" />
                                                    </a>
                                                </div>
                                                <div class="media-body small-product">
                                                    <p>
                                                        <span class="light-grey">Pemilik UMKM</span>
                                                    </p>
                                                    <p class="lead">
                                                        <a href="#">{{$pendanaan->nama_pj}}</a> 
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- .widget box -->

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .author widget -->

                    <!-- donate widget -->
                    <div class="widget">
                        <div class="widget-donate">
                            <div class="box-wrapper">
                                <div class="box">

                                    <!-- widget box -->
                                    <h4 class="text-center"><a href="{{ url('/donasi')}}/{{$pendanaan->id_pendanaan}}">Donasi Sekarang</a>
                                    </h4>
                                    <!-- .widget box -->

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .donate widget -->

                    <!-- share widget -->
                    <div class="widget">
                        <div class="widget-share">
                            <div class="box-wrapper">
                                <div class="box">

                                    <!-- widget box -->
                                    <div class="widget-box">
                                        <ul class="clearfix">
                                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i><br /><span class="light-grey">234</span></a>
                                            </li>
                                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i><br /><span class="light-grey">187</span></a>
                                            </li>
                                            <li><a href="#" class="google-plus"><i class="fa fa-google-plus"></i><br /><span class="light-grey">2.1K</span></a>
                                            </li>
                                        </ul>

                                    </div>
                                    <!-- .widget box -->

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .share widget -->

                </div>
                <!-- .sidebar -->

            </div>
        </div>
        <!-- .blog posts & widgets -->

    </section>
    
@endsection
