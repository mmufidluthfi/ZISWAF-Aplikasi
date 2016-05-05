@extends('layouts.app')

@section('content')

    <!-- slider -->
    <aside>

        <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="6000">


            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>



            <!-- Wrapper for slides -->
            <div class="carousel-inner">

                <!-- 1 -->
                <div class="item active">

                    <img src="images/slide_1.png" alt="" title="" />

                    <div class="carousel-caption">
                        <div class="carousel-content-wrapper">
                            <div class="carousel-content slide-content">
                                <h3>Pendanaan Sosial</h3>
                                <p>Mempermudah Melakukan Pendanaan Online</p>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- .1 -->

                <!-- Slide 2 -->
                <div class="item">

                    <img src="images/slide_2.png" alt="" title="" />

                    <div class="carousel-caption">
                        <div class="carousel-content-wrapper slide-content">
                            <div class="carousel-content">
                                <h3>Berikan Harapan</h3>
                                <p>Membantu Satu Sama Lainnya, untuk Umat</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.carousel-caption -->
                </div>
                <!-- /Slide2 -->

                <!-- Slide 3 -->
                <div class="item ">

                    <img src="images/slide_3.png" alt="" title="" />

                    <div class="carousel-caption">
                        <div class="carousel-content-wrapper">
                            <div class="carousel-content slide-content">
                                <h3>Mudah, Cepat, dan Aman</h3>
                                <p>Beribadah Dimanapun dan Kapanpun Anda Mau</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.carousel-caption -->
                </div>
                <!-- /Slide3 -->

                <!-- Slide 4 -->
                <div class="item">

                    <img src="images/slide_4.png" alt="" title="" />

                    <div class="carousel-caption">
                        <div class="carousel-content-wrapper">
                            <div class="carousel-content slide-content">
                                <h3>Cinta Damai</h3>
                                <p>Dapatkan Kedamaian Hati dengan Beribadah</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.carousel-caption -->
                </div>
                <!-- /Slide4 -->

            </div>
            <!-- /Wrapper for slides .carousel-inner -->

            <!-- Controls -->
            <div class="control-box">
                <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
            <!-- /.control-box -->


        </div>
        <!-- /#myCarousel -->

    </aside>
    <!-- .slider -->

    <!-- intro -->
    <section>
        <div class="container">
            <div class="row">

                <!-- 1 -->
                <div class="col-md-4">
                    <div class="promo-box">
                        <i class="fa fa-tree"></i>
                        <h3>Better Future</h3>
                        <hr />
                        <p>Ciptakan masa depan dengan memberikan pendanaan ZISWAF Produktif untuk UMKM yang terverifikasi oleh lembaga resmi</p>
                    </div>
                </div>
                <!-- .1 -->

                <!-- 2 -->
                <div class="col-md-4">
                    <div class="promo-box middle">
                        <i class="fa fa-leaf"></i>
                        <h3>Bigger Hope</h3>
                        <hr />
                        <p>Adanya Harapan yang nantinya akan menjadi cahaya untuk masa depan kita bersama untuk bisa menjadi lebih baik</p>
                    </div>
                </div>
                <!-- .2 -->

                <!-- 3 -->
                <div class="col-md-4">
                    <div class="promo-box">
                        <i class="fa fa-heart"></i>
                        <h3>More Love</h3>
                        <hr />
                        <p>Cinta akan kedamaian dengan saling membantu dan mendukung satu sama lainnya. Kita semua pasti bisa</p>
                    </div>
                </div>
                <!-- .3 -->

            </div>
        </div>
    </section>
    <!-- .intro -->

    <!-- latest causes -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- heading -->
                    <div class="heading">
                        <div class="col-md-9">
                            <!-- title -->
                            <h3>Pendanaan ZISWAF</h3>
                            <!-- .title -->
                        </div>
                        <div class="col-md-3">
                            <!-- carousel slide -->
                            <div class="carousel-control carousel-control-heading">
                                <!-- <a class="carousel-control left" href="#latestCarousel" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                                <a class="carousel-control right" href="#latestCarousel" data-slide="next"><i class="fa fa-angle-right"></i></a>  -->
                                <?php echo $pendanaans->render(); ?>
                            </div>
                        </div>
                        <br/><br/>
                        <div class="border">
                            <div class="border-inner">
                            </div>
                        </div>
                    </div>
                    <!-- .heading -->

                    <!-- latest causes carousel -->
                    <div id="latestCarousel" class="carousel normal default slide" data-interval="false">
                        <div class="carousel-inner">

                            <!-- List Pendanaan -->
                            <div class="item active">
                                <div class="row">

                                    @foreach($pendanaans as $pendanaan)

                                        <!-- a -->
                                        <div class="col-md-3">
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

                                                                $danasemetara = (int)$pendanaan->sementara_dana;
                                                                $danatotal    = (int)$pendanaan->total_dana;

                                                                if($danasemetara >= $danatotal){
                                                                    echo "<img src='images/proyek/".$pendanaan->foto_proyek."' class='img-responsive' />";
                                                                } else {
                                                                    echo "<a href='/details-pendanaan/".$pendanaan->id_pendanaan."'><img src='images/proyek/".$pendanaan->foto_proyek."' class='img-responsive' /></a>";

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
                                                                    <a class="pull-left" href="{{ url('/kategori')}}/{{ $pendanaan->kategori}}">{{ $pendanaan->kategori}}</a>
                                                                    <a class="pull-right share-trigger" data-rel="tooltip" title="Share Cause" href="javascript:;"><i class="fa fa-share-alt"></i></a>
                                                                </div>
                                                                <!-- .cause meta -->

                                                                <!-- excerpt -->
                                                                <div class="excerpt">
                                                                    <h6><?php 

                                                                        $danasemetara = (int)$pendanaan->sementara_dana;
                                                                        $danatotal    = (int)$pendanaan->total_dana;

                                                                        if($danasemetara >= $danatotal){
                                                                            echo $pendanaan->nama_proyek;
                                                                        } else {
                                                                            echo "<a href='/details-pendanaan/".$pendanaan->id_pendanaan."'>".$pendanaan->nama_proyek."</a>";

                                                                            // echo "/details-pendanaan/".$pendanaan->id_pendanaan;
                                                                        }    
                                                                    ?>
                                                                    </h6>

                                                                </div>
                                                                <!-- .excerpt -->

                                                                <!-- rised bar -->
                                                                <div class="slider-content">
                                                                    <input class="rised" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="{{ $pendanaan->total_dana}}" data-slider-step="1" data-slider-enabled="false" data-slider-value="{{ $pendanaan->sementara_dana}}" />
                                                                </div>
                                                                <!-- .rised bar -->

                                                                <!-- rised slider meta -->
                                                                <div class="slider-meta clearfix">
                                                                    <span class="pull-left">Rp {{ $pendanaan->sementara_dana}}</span>
                                                                    <?php 

                                                                        $danasemetara = (int)$pendanaan->sementara_dana;
                                                                        $danatotal    = (int)$pendanaan->total_dana;

                                                                        if($danasemetara >= $danatotal){
                                                                            echo "<span class='pull-right'><font color='green'><b>TERDANAI</b></font><span>";
                                                                        } else {
                                                                            echo "<span class='pull-right'>Rp ".$pendanaan->total_dana."</span>";
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
                                        <!-- .a -->
                                    @endforeach

                                </div>
                            </div>
                            <!-- .List Pendanaan  -->

                        </div>
                    </div>
                    <!-- .latest causes carousel -->

                </div>
                <div class="col-md-12">
                    <br/><center><a class="button-normal blue" href="{{ url('/pendanaan')}}">Lihat Selengkapnya</a></center>
                </div>
            </div>
        </div>

    </section>
    <!-- .latest causes -->

    <!-- full width promo -->
    <section class="box-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="full-promo text-center">
                        <h2>
                            <strong>Bersama Menciptakan Masa Depan</strong>
                        </h2>
                        <h6>Pendanaan ZISWAF Crowdfunding sudah melibatkan +4000 Orang Berdonasi</h6>
                        <a class="button-normal blue" href="{{URL::to('/kategori')}}/Zakat">Zakat</a> <a class="button-normal blue" href="{{URL::to('/kategori')}}/Infaq">Infaq</a> <a class="button-normal blue" href="{{URL::to('/kategori')}}/Sadaqah">Sadaqah</a> <a class="button-normal blue" href="{{URL::to('/kategori')}}/Waqaf">Waqaf</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- .full width promo -->


@endsection
