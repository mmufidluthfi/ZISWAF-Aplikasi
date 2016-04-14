@extends('layouts.app')

@section('content')
    <!-- breadcrumbs -->
    <section class="breadcrumbs">
        <div class="breadcrumbs-wrapper">
            <div class="container">
                <div class="row">

                    <!-- page title -->
                    <div class="col-md-6 col-xs-6">
                        <h4>Daftar-daftar Pendanaan</h4>
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
    <section>
        <div class="container">
            <div class="row">

                <!-- paginate & posts -->
                <div class="col-md-9">

                    <!-- pagination -->
                    <div class="paginate">
                        <div class="row">

                            <!-- prev & next -->
                            <div class="col-md-2 col-xs-3">
                                <ul class="list-unstyled list-inline">
                                    <li><a href="#"><i class="fa fa-angle-left"></i></a>
                                    </li>
                                    <li><a href="#" class="active"><i class="fa fa-angle-right"></i></a> 
                                    </li>
                                </ul>
                            </div>
                            <!-- .prev & next -->

                            <!-- prev & next -->
                            <div class="col-md-10 col-xs-9">
                                <ul class="list-unstyled list-inline text-right">
                                    <li><a href="#" class="active">1</a>
                                    </li>
                                    <li><a href="#">2</a> 
                                    </li>
                                    <li><a href="#">3</a>
                                    </li>
                                    <li><a href="#">4</a> 
                                    </li>
                                </ul>
                            </div>
                            <!-- .prev & next -->

                        </div>
                    </div>
                    <!-- .pagination -->

                    <!-- posts -->
                    <div class="posts">
                        <div class="row">

                            @foreach($pendanaank as $pdk)
                                <!-- 1 -->
                                <div class="col-md-4">
                                    <div class="box-wrapper">
                                        <div class="box">
                                            <div class="latest-box">

                                                <!-- .media -->
                                                <div class="media">

                                                    <!-- overlay -->
                                                    <div class="overlay-wrapper">
                                                        <div class="overlay">
                                                            <div class="overlay-content">
                                                                <div class="content-hidden">
                                                                    <p>SHARE THIS CAUSE</p>
                                                                    <ul class="list-inline list-unstyled">
                                                                        <li><a href="#"><i class="fa fa-facebook-square"></i></a>
                                                                        </li>
                                                                        <li><a href="#"><i class="fa fa-twitter-square"></i></a>
                                                                        </li>
                                                                        <li><a href="#"><i class="fa fa-google-plus-square"></i></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- .overlay -->

                                                    <!-- image -->
                                                    <a href="/details-pendanaan/{{$pdk->id_pendanaan}}">
                                                        <img src="{{URL::to('/')}}/{{$pdk->foto_proyek}}" class="img-responsive" title="" alt="" />
                                                    </a>
                                                    <!-- image -->
                                                </div>
                                                <!-- .media -->

                                                <!-- content -->
                                                <div class="content-wrapper">
                                                    <div class="content">

                                                        <!-- cause meta -->
                                                        <div class="meta clearfix">
                                                            <a class="pull-left" href="{{ url('/kategori')}}/{{$pdk->kategori}}">{{$pdk->kategori}}</a>
                                                            <a class="pull-right share-trigger" data-rel="tooltip" title="Share Cause" href="javascript:;"><i class="fa fa-share-alt"></i></a>
                                                        </div>
                                                        <!-- .cause meta -->

                                                        <!-- excerpt -->
                                                        <div class="excerpt">
                                                            <h6><a href="/details-pendanaan/{{$pdk->id_pendanaan}}">{{$pdk->nama_proyek}}</a>
                                                            </h6>

                                                        </div>
                                                        <!-- .excerpt -->

                                                        <!-- rised bar -->
                                                        <div class="slider-content">
                                                            <input class="rised" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="{{$pdk->total_dana}}" data-slider-step="1" data-slider-enabled="false" data-slider-value="{{$pdk->sementara_dana}}" />
                                                        </div>
                                                        <!-- .rised bar -->

                                                        <!-- rised slider meta -->
                                                        <div class="slider-meta clearfix">
                                                            <span class="pull-left">Rp {{$pdk->sementara_dana}}</span>
                                                            <span class="pull-right">Rp {{$pdk->total_dana}}</span>
                                                        </div>
                                                        <!-- .rised slider meta -->


                                                    </div>
                                                </div>
                                                <!-- .content -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- .1 -->
                            @endforeach

                        </div>
                    </div>
                    <!-- .posts -->

                    <!-- pagination -->
                    <div class="paginate">
                        <div class="row">

                            <!-- prev & next -->
                            <div class="col-md-2 col-xs-3">
                                <ul class="list-unstyled list-inline">
                                    <li><a href="#"><i class="fa fa-angle-left"></i></a>
                                    </li>
                                    <li><a href="#" class="active"><i class="fa fa-angle-right"></i></a> 
                                    </li>
                                </ul>
                            </div>
                            <!-- .prev & next -->

                            <!-- prev & next -->
                            <div class="col-md-10 col-xs-9">
                                <ul class="list-unstyled list-inline text-right">
                                    <li><a href="#" class="active">1</a>
                                    </li>
                                    <li><a href="#">2</a> 
                                    </li>
                                    <li><a href="#">3</a>
                                    </li>
                                    <li><a href="#">4</a> 
                                    </li>
                                </ul>
                            </div>
                            <!-- .prev & next -->

                        </div>
                    </div>
                    <!-- .pagination -->

                </div>
                <!-- .paginate & posts -->

                <!-- sidebar -->
                <div class="col-md-3">

                    <!-- search causes widget -->
                    <div class="widget">
                        <div class="widget-search-causes">
                            <div class="box-wrapper">
                                <div class="box">

                                    <!-- widget title -->
                                    <div class="widget-title">
                                        <h5>Pencarian</h5>
                                    </div>
                                    <!-- .widget title -->

                                    <!-- widget box -->
                                    <div class="widget-box">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Ketik Kata Kunci" />
                                            <span class="input-group-addon">
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                    <!-- .widget box -->

                                    <!-- widget box -->
                                    <div class="widget-box dropdown">
                                        <div class="widget-dropdown">
                                            <a class="button-normal full blue left-text" href="#" data-toggle="dropdown">Kategori <i class="fa fa-angle-down pull-right"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="{{URL::to('/kategori')}}/Zakat">Zakat <i class="fa fa-angle-right pull-right"></i></a>
                                                </li>
                                                <li><a href="{{URL::to('/kategori')}}/Infaq">Infaq<i class="fa fa-angle-right pull-right"></i></a>
                                                </li>
                                                <li><a href="{{URL::to('/kategori')}}/Sadaqah">Sadaqah<i class="fa fa-angle-right pull-right"></i></a>
                                                </li>
                                                <li><a href="{{URL::to('/kategori')}}/Waqaf">Waqaf<i class="fa fa-angle-right pull-right"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- .widget-box -->

                                    <!-- widget box -->
                                    <div class="widget-box dropdown">
                                        <a class="button-normal full white" href="#">Cari Sekarang</a>
                                    </div>
                                    <!-- .widget-box -->
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- .search causes widget -->
                </div>
                <!-- .sidebar -->

            </div>
        </div>
    </section>
    <!-- .blog posts & widgets -->
    
@endsection
