@extends('layouts.app')

@section('content')
    <!-- breadcrumbs -->
    <section class="breadcrumbs">
        <div class="breadcrumbs-wrapper">
            <div class="container">
                <div class="row">

                    <!-- page title -->
                    <div class="col-md-6 col-xs-6">
                        <h4>About</h4>
                    </div>
                    <!-- .page title -->

                    <!-- breadcumbs -->
                    <div class="col-md-6 col-xs-6">
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a>
                            </li>
                            <li class="active"><a href="#">About</a>
                            </li>
                        </ol>
                    </div>
                    <!-- .breadcrumbs -->
                </div>
            </div>
        </div>
    </section>
    <!-- .breadcrumbs -->

    <section class="no-bottom-margin">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="promo-box heading text-center">
                        <h2>Apa itu ZISWAF Funding?</h2>
                        <p class="lead">Aplikasi ZISWAF Funding merupakan salah satu aplikasi pendanaan secara online untuk melakukan aktifitas pendanaan Zakat, Infaq, Sadaqah dan Waqaf secara online.</p>

                        <p>Aplikasi ini dapat diakses secara GRATIS dan berlandaskan sesuai dengan syariah islam yang berlaku. Tujuan dibuatkannya aplikasi ZISWAF funding ini adalah untuk mempermudah masyarakat melakukan ibadah terhadap tanggung jawab membayar Zakat, Infaq, Sadaqah dan Waqaf. Bersamaan dengan hal tersbut didukung dengan teknologi informasi yang terus berkembang sehingga pendanaan dapat dilakukan kapanpun dan dimanapun</p>
                        <hr />

                        <a class="button-normal blue" href="{{URL::to('/faq')}}">Frequently asked questions (FAQ)</a>&nbsp; &nbsp; &nbsp; &nbsp;<a class="button-normal blue" href="{{URL::to('/tos')}}">Terms of Service (TOS)</a>
                    </div>
                </div>

                <!-- heading -->
                <div class="heading">
                    <div class="col-md-12">
                        <!-- title -->
                        <h3>Our Team</h3>
                        <!-- .title -->
                        <div class="border">
                            <div class="border-inner">
                            </div>
                        </div>
                        <!-- .carousel slide -->

                    </div>
                </div>
                <!-- .heading -->

            </div>
        </div>
    </section>

    <!-- team -->
    <section>
        <div class="container">
            <div class="row">

                <!-- 1 -->
                <div class="col-md-3">
                    <div class="box-wrapper">
                        <div class="box">
                            <div class="latest-box">

                                <!-- .media -->
                                <div class="media">

                                    <!-- image -->
                                    <a href="#">
                                        <img src="images/team_1.png" class="img-responsive" title="" alt="" />
                                    </a>
                                    <!-- image -->
                                </div>
                                <!-- .media -->

                                <!-- content -->
                                <div class="content-wrapper">
                                    <div class="content">

                                        <!-- cause meta -->
                                        <div class="meta clearfix">
                                            <a class="pull-left" href="#">Board Director</a>
                                        </div>
                                        <!-- .cause meta -->

                                        <!-- excerpt -->
                                        <div class="excerpt">
                                            <h6><a href="#">M Mufid Luthfi</a>
                                            </h6>
                                        </div>
                                        <!-- .excerpt -->

                                        <!-- rised slider meta -->
                                        <div class="slider-meta clearfix">

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

                <!-- 2 -->
                <div class="col-md-3">
                    <div class="box-wrapper">
                        <div class="box">
                            <div class="latest-box">

                                <!-- .media -->
                                <div class="media">

                                    <!-- image -->
                                    <a href="#">
                                        <img src="images/team_2.png" class="img-responsive" title="" alt="" />
                                    </a>
                                    <!-- image -->
                                </div>
                                <!-- .media -->

                                <!-- content -->
                                <div class="content-wrapper">
                                    <div class="content">

                                        <!-- cause meta -->
                                        <div class="meta clearfix">
                                            <a class="pull-left" href="#">Board Director</a>
                                        </div>
                                        <!-- .cause meta -->

                                        <!-- excerpt -->
                                        <div class="excerpt">
                                            <h6><a href="#">Reicka Sofi Azzura</a>
                                            </h6>
                                        </div>
                                        <!-- .excerpt -->

                                        <!-- rised slider meta -->
                                        <div class="slider-meta clearfix">

                                        </div>
                                        <!-- .rised slider meta -->


                                    </div>
                                </div>
                                <!-- .content -->

                            </div>
                        </div>
                    </div>
                </div>
                <!-- .2 -->

                <!-- 3 -->
                <div class="col-md-3">
                    <div class="box-wrapper">
                        <div class="box">
                            <div class="latest-box">

                                <!-- .media -->
                                <div class="media">

                                    <!-- image -->
                                    <a href="#">
                                        <img src="images/team_3.png" class="img-responsive" title="" alt="" />
                                    </a>
                                    <!-- image -->
                                </div>
                                <!-- .media -->

                                <!-- content -->
                                <div class="content-wrapper">
                                    <div class="content">

                                        <!-- cause meta -->
                                        <div class="meta clearfix">
                                            <a class="pull-left" href="#">Board Director</a>
                                        </div>
                                        <!-- .cause meta -->

                                        <!-- excerpt -->
                                        <div class="excerpt">
                                            <h6><a href="#">Nana Ramadhewi</a>
                                            </h6>
                                        </div>
                                        <!-- .excerpt -->

                                        <!-- rised slider meta -->
                                        <div class="slider-meta clearfix">

                                        </div>
                                        <!-- .rised slider meta -->


                                    </div>
                                </div>
                                <!-- .content -->

                            </div>
                        </div>
                    </div>
                </div>
                <!-- .3 -->

                <!-- 4 -->
                <div class="col-md-3">
                    <div class="box-wrapper">
                        <div class="box">
                            <div class="latest-box">

                                <!-- .media -->
                                <div class="media">

                                    <!-- image -->
                                    <a href="#">
                                        <img src="images/team_4.png" class="img-responsive" title="" alt="" />
                                    </a>
                                    <!-- image -->
                                </div>
                                <!-- .media -->

                                <!-- content -->
                                <div class="content-wrapper">
                                    <div class="content">

                                        <!-- cause meta -->
                                        <div class="meta clearfix">
                                            <a class="pull-left" href="#">Board Director</a>
                                        </div>
                                        <!-- .cause meta -->

                                        <!-- excerpt -->
                                        <div class="excerpt">
                                            <h6><a href="#">Elzar Esen</a>
                                            </h6>
                                        </div>
                                        <!-- .excerpt -->

                                        <!-- rised slider meta -->
                                        <div class="slider-meta clearfix">

                                        </div>
                                        <!-- .rised slider meta -->


                                    </div>
                                </div>
                                <!-- .content -->

                            </div>
                        </div>
                    </div>
                </div>
                <!-- .4 -->

            </div>
        </div>
    </section>
    <!-- .team -->

    <section class="box-section no-top-margin">
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

@endsection
