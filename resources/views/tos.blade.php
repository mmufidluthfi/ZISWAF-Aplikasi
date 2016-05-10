@extends('layouts.app')

@section('content')
    <!-- breadcrumbs -->
    <section class="breadcrumbs">
        <div class="breadcrumbs-wrapper">
            <div class="container">
                <div class="row">

                    <!-- page title -->
                    <div class="col-md-6 col-xs-6">
                        <h4>TOS</h4>
                    </div>
                    <!-- .page title -->

                    <!-- breadcumbs -->
                    <div class="col-md-6 col-xs-6">
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a>
                            </li>
                            <li class="active"><a href="#">TOS</a>
                            </li>
                        </ol>
                    </div>
                    <!-- .breadcrumbs -->
                </div>
            </div>
        </div>
    </section>
    <!-- .breadcrumbs -->

    <!-- tabs & accordion -->
    <section>
        <div class="container">
            <div class="row">

                <div class="col-md-12">

                    <!-- accordion -->
                    <div class="panel-group" id="accordion">

                        <!-- 1 -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOneOne">Biaya Minimal</a>
                                </h4>
                            </div>
                            <div id="collapseOneOne" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <p>Biaya Minimal Pendanaan yang bisa dilakukan adalah Rp 10.000,-. Jangan lupa melakukan konfirmasi pembayaran dengan mengirimkan bukti pembayaran pada formulir yang sudah disediakan</p>
                                </div>
                            </div>
                        </div>
                        <!-- .1 -->

                        <!-- 1 -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Pelaksanaan Ijab Qabul ZISWAF</a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Para ulama tidak memasukkan ijab qabul dalam rukun atau syarat sahnya zakat. Dengan demikian, seseorang yang menyalurkan zakatnya tanpa ada akad hukumnya sah. Dengan demikian, tidak masalah bagi seseorang yang menyalurkan zakatnya ke lembaga zakat melalui transfer Bank, ATM atau fasilitas yang lainnya. Yang terpenting, donasi itu masuk ke rekening zakat yang telah ditetapkan oleh lembaga zakat. Sebab, hal yang sangat penting dalam zakat, penyalurkannya harus tepat sasaran atau tepat pada pihak yang berhak. Misalnya, penyaluran melalui lembaga amil zakat. (Sumber : Ust. Zul Ashfi). Begitu juga halnya dengan Infaq, Sadaqah, dan Waqaf</p>
                                </div>
                            </div>
                        </div>
                        <!-- .1 -->

                        <!-- 2 -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Proses Ijab Qabul Zakat / Wakaf</a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Jika Donatur membutuhakn Proses Ijab Qabul untuk keperluan Zakat dan Waqaf dapat diwakili dengan adanya invoice yang dikirim saat pendanaan berhasil dilakukan dengan mencantumkan Invoice/bukti pembayaran kepada investor yang dapat diakses pada halaman Dashboard Pendanaan</p>
                                </div>
                            </div>
                        </div>
                        <!-- .2 -->

                        <!-- 3 -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Laporan Pendanaan</a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Laporan Pendanan yang telah dilakukan oleh Investor/Donatur akan tersimpan pada halaman Dashboard pengguna yang dapat dipantau secara langsung mengenai status pendanaannya</p>
                                </div>
                            </div>
                        </div>
                        <!-- .3 -->

                        <!-- 3.1 -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThreeOne">Laporan Usaha UMKM</a>
                                </h4>
                            </div>
                            <div id="collapseThreeOne" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Laporan penggunaan dana akan dikirim secara berkala setiap bulannya oleh UMKM yang mendapatkan pendanaan untuk memantau perkembangan UMKM secara langsung</p>
                                </div>
                            </div>
                        </div>
                        <!-- .3.1 -->

                        <!-- 4 -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Lembaga ZISWAF yang terdaftar</a>
                                </h4>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Lembaga ZISWAF yang terdaftar pada sistem aplikasi pendanaan ZISWAF Crowdfunding merupakan rekan-rekan partner yang saling percaya dan sudah terverifikasi oleh sistem kita secara langsung</p>
                                </div>
                            </div>
                        </div>
                        <!-- .4 -->


                        <!-- 5 -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">UMKM yang terdaftar</a>
                                </h4>
                            </div>
                            <div id="collapseFive" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>UMKM yang berhak menerima ZISWAF Produktif merupakan UMKM yang terseleksi langsung oleh Lembaga ZISWAF yang sudah terdaftar sebelumnya</p>
                                </div>
                            </div>
                        </div>
                        <!-- .5 -->

                        <!-- 6 -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">Pembagian Dana ZISWAF</a>
                                </h4>
                            </div>
                            <div id="collapseSix" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Adapun pembagian dana ZISWAF dikalkulasikan 85% menjadi milik UMKM dan 15% menjadi milik pengelola dan Lembaga ZISWAF</p>
                                </div>
                            </div>
                        </div>
                        <!-- .6 -->

                        <!-- 7 -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">Pertanyaan Lengkap Terkait pendanaan</a>
                                </h4>
                            </div>
                            <div id="collapseSeven" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Jika ada pertanyaan terkait pendanaan bisa menghubungi : info@ziswaf.org / 085351456711</p>
                                </div>
                            </div>
                        </div>
                        <!-- .7 -->



                    </div>
                    <!-- .accordion -->

                </div>

            </div>
        </div>
    </section>
    <!-- tabs & accordion -->
    
@endsection
