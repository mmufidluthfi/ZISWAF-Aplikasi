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
                            <div class="donate-form">

                                <div class="content comments">
                                    <h3 class="grey">{{$pendanaanpayment->nama_proyek}}</h3> 
                                    <h6 class="grey">Kategori: {{$pendanaanpayment->kategori}}</h6>
                                </div>

                                <center><h3><a class="button-normal full blue">Rp {{$pendanaannominal}},-</a></h3>
                                <p><i>Transfer sebesar Nominal Diatas</i></p></center>

                                <hr class="inline-hr" />

                                <!-- tabs -->
                                    <center><h3>Pilihan Bank:</h3></center>

                                    <!-- nav -->
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#sectionA">Bank Mandiri</a>
                                        </li>
                                        <li><a data-toggle="tab" href="#sectionB">Bank BCA</a>
                                        </li>
                                        <li><a data-toggle="tab" href="#sectionC">Bank BNI</a>
                                        </li>
                                    </ul>
                                    <!-- .nav -->

                                    <!-- content -->
                                    <div class="tab-content">

                                        <!-- 1 -->
                                        <div id="sectionA" class="tab-pane fade in active">
                                            <h4>No Rek : 1231312312313131231</h4>
                                            <p>an. Muhammad Mufid Luthfi</p>
                                        </div>
                                        <!-- .1 -->

                                        <!-- 2 -->
                                        <div id="sectionB" class="tab-pane fade">
                                            <h4>No Rek : 123412423141223</h4>
                                            <p>an. Muhammad Mufid Luthfi</p>
                                        </div>
                                        <!-- .2 -->

                                        <!-- 3 -->
                                        <div id="sectionC" class="tab-pane fade">
                                            <h4>No Rek : 27645647457</h4>
                                            <p>an. Muhammad Mufid Luthfi</p>
                                        </div>
                                        <!-- .3 -->

                                    </div>
                                    <!-- . content -->

                                    </div>
                                <!-- tabs -->

                                <div class="widget-box">
                                    <div class="form-group row">
                                        <center><h3>Konfirmasi Pembayaran:</h3></center>

                                        <form action="{{ URL::to('upload') }}" method="post" enctype="multipart/form-data">
                                            {!! csrf_field() !!}

                                            <div class="col-md-3">
                                            </div>
                                            <div class="col-md-5">
                                                <input type="file" name="file" id="file">
                                            </div>
                                            <div class="col-md-3">
                                            </div>

                                            <!-- widget box -->
                                            <div class="form-group">
                                                    <div class="col-md-6">
                                                        <button type="submit" value="Upload" name="submit" class="button-normal full blue">
                                                            <i class="fa fa-btn fa-user"></i>Upload Bukti
                                                        </button>
                                                    </div>
                                            </div>                                    
                                            <!-- .widget-box -->

                                            <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                            <input type="hidden" value="<?php echo Session::get('message-idtransaksi'); ?>" name="id_transaksiDonasi">
                                            
                                        </form>

                                            <div class="form-group">
                                                    <div class="col-md-6">
                                                    </div>
                                                    
                                                    <div class="col-md-6">
                                                        <?php \Session::flash('nominal-status', $pendanaannominal); ?>
                                                        <a href="{{URL::to('/donasi-invoice')}}/{{$pendanaanpayment->id_pendanaan}}"><button type="submit" class="button-normal full blue">
                                                            <i class="fa fa-btn fa-user"></i>Lewati
                                                        </button></a>
                                                    </div>
                                            </div>
                                            <center><p><br/>Silahkan tekan tombol <b>Lewati</b>, jika ingin mengkonfirmasi nanti</p></center>

                                    </div>
                                </div>
                                <!-- .widget box -->
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
