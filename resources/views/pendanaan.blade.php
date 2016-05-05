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
                    <div class="row">
                        <!-- prev & next -->
                        <div class="col-md-9">
                        </div>
                        <!-- .prev & next -->

                        <!-- prev & next -->
                        <div class="col-md-3">
                                <?php echo $pendanaans1->render(); ?>
                        </div>
                        <!-- .prev & next -->
                    </div>
                    <!-- .pagination -->

                    <!-- posts -->
                    <div class="posts">
                        <div class="row">

                            @foreach($pendanaans1 as $pd)
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
                                                    <?php 

                                                        $danasemetara = (int)$pd->sementara_dana;
                                                        $danatotal    = (int)$pd->total_dana;

                                                        if($danasemetara >= $danatotal){
                                                            echo "<img src='images/proyek/".$pd->foto_proyek."' class='img-responsive' />";
                                                        } else {
                                                            echo "<a href='/details-pendanaan/".$pd->id_pendanaan."'><img src='images/proyek/".$pd->foto_proyek."' class='img-responsive' /></a>";

                                                            // echo "/details-pendanaan/".$pendanaan->id_pendanaan;
                                                        }    
                                                    ?>
                                                    <!-- image -->
                                                </div>
                                                <!-- .media -->

                                                <!-- content -->
                                                <div class="content-wrapper">
                                                    <div class="content">

                                                        <!-- cause meta -->
                                                        <div class="meta clearfix">
                                                            <a class="pull-left" href="{{URL::to('/kategori')}}/{{$pd->kategori}}">{{$pd->kategori}}</a>
                                                            <a class="pull-right share-trigger" data-rel="tooltip" title="Share Cause" href="javascript:;"><i class="fa fa-share-alt"></i></a>
                                                        </div>
                                                        <!-- .cause meta -->

                                                        <!-- excerpt -->
                                                        <div class="excerpt">
                                                            <h6><?php 

                                                                        $danasemetara = (int)$pd->sementara_dana;
                                                                        $danatotal    = (int)$pd->total_dana;

                                                                        if($danasemetara >= $danatotal){
                                                                            echo $pd->nama_proyek;
                                                                        } else {
                                                                            echo "<a href='/details-pendanaan/".$pd->id_pendanaan."'>".$pd->nama_proyek."</a>";

                                                                            // echo "/details-pendanaan/".$pendanaan->id_pendanaan;
                                                                        }    
                                                                    ?>
                                                            </h6>

                                                        </div>
                                                        <!-- .excerpt -->

                                                        <!-- rised bar -->
                                                        <div class="slider-content">
                                                            <input class="rised" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="{{$pd->total_dana}}" data-slider-step="1" data-slider-enabled="false" data-slider-value="{{$pd->sementara_dana}}" />
                                                        </div>
                                                        <!-- .rised bar -->

                                                        <!-- rised slider meta -->
                                                        <div class="slider-meta clearfix">
                                                            <span class="pull-left">Rp {{ $pd->sementara_dana}}</span>
                                                            <?php 

                                                                $danasemetara = (int)$pd->sementara_dana;
                                                                $danatotal    = (int)$pd->total_dana;

                                                                if($danasemetara >= $danatotal){
                                                                    echo "<span class='pull-right'><font color='green'><b>TERDANAI</b></font><span>";
                                                                } else {
                                                                    echo "<span class='pull-right'>Rp ".$pd->total_dana."</span>";
                                                                }    
                                                            ?>
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
                    <div class="row">
                        <!-- prev & next -->
                        <div class="col-md-9">
                        </div>
                        <!-- .prev & next -->

                        <!-- prev & next -->
                        <div class="col-md-3">
                                <?php echo $pendanaans1->render(); ?>
                        </div>
                        <!-- .prev & next -->
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

                                    <!-- widget box -->
                                    <div class="widget-box dropdown">
                                        <div class="widget-dropdown">
                                            <a class="button-normal full blue left-text" href="#" data-toggle="dropdown">Kategori <i class="fa fa-angle-down pull-right"></i></a>
                                            <ul  role="menu">
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
