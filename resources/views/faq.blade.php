@extends('layouts.app')

@section('content')
	<!-- breadcrumbs -->
    <section class="breadcrumbs">
        <div class="breadcrumbs-wrapper">
            <div class="container">
                <div class="row">

                    <!-- page title -->
                    <div class="col-md-6 col-xs-6">
                        <h4>FAQ</h4>
                    </div>
                    <!-- .page title -->

                    <!-- breadcumbs -->
                    <div class="col-md-6 col-xs-6">
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a>
                            </li>
                            <li class="active"><a href="#">FAQ</a>
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
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Apa itu Ziswaf.org? </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <p>ZISWAF (Zakat, Infaq, Sadaqah, dan Waqaf) Funding (Ziswaf.org) merupakan salah satu aplikasi berbasis crowdfunding dimana masyarakat dapat melakukan pendanaan secara online untuk memenuhi kebutuhan syariah islamiah.</p>
                                </div>
                            </div>
                        </div>
                        <!-- .1 -->

                        <!-- 2 -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Apa itu Crowdfunding ?</a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>"Crowdfunding mengacu pada upaya kolektif dari individu-individu yang sumber daya mereka melalui jaringan untuk mendukung upaya yang diprakarsai oleh orang atau organisasi lain" (Conrad, 2012)</p>
                                </div>
                            </div>
                        </div>
                        <!-- .2 -->

                         <!-- 2.1 -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwoOne">Berapa lama Kampanye Donasi ZISWAF berlangsung?</a>
                                </h4>
                            </div>
                            <div id="collapseTwoOne" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Sistem akan secara otomatis menghitung jalannya kampanye pendanaan ZISWAF secara online dan akan berakhir pada hari ke 30 secara otomatis</p>
                                </div>
                            </div>
                        </div>
                        <!-- .2.1 -->

                         <!-- 2.1 -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwoTwo">Apa yang terjadi jika Pendanaan tidak Terdanai 100% dalam waktu yang ditentukan?</a>
                                </h4>
                            </div>
                            <div id="collapseTwoTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Metode Crowdfunding yang digunakan pada website ZISWAF.org adalah Fleksibel Funding, yaitu Pendanaan akan tetap diterima oleh UMKM sebagai modal untuk membangun Usahanya.</p>
                                </div>
                            </div>
                        </div>
                        <!-- .2.1 -->

                        <!-- 3 -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Apa itu Zakat?</a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Zakat (transliterasi: Zakah) dalam segi istilah adalah harta tertentu yang wajib dikeluarkan oleh orang yang beragama Islam dan diberikan kepada golongan yang berhak menerimanya (fakir miskin dan sebagainya).Zakat dari segi bahasa berarti bersih,suci,subur,berkat dan berkembang.Menurut ketentuan yang telah ditetapkan oleh syariat Islam. Zakat merupakan rukun ketiga dari rukun Islam.</p>
                                    <p>Unsur yang terpenting dalam zakat adalah: pemberi zakat, harta zakat dan penerima zakat. seorang muzakki haruslah orang yang memiliki harta mencapai nishab atau memenuhi kriteria wajib zakat. Adapun unsur penting lainnya, walau bukan suatu keharusan, dalam penyerahan zakat adalah: pernyataan zakat dan doa penerima zakat. </p>
                                    <p>Bersamaan dengan itu, idealnya seseorang yang menyalurkan dana zakatnya via online ke lembaga amil zakat disertai dengan konfermasi zakat secara tertulis. Dan konfermasi tertulis itu merupakan salah satu bentuk pernyataan zakat. Konfermasi zakat atau transfer ke rekening zakat secara khusus akan memudahkan amil dalam mendistribusikan harta zakat kepada orang-orang yang berhak.</p>
                                </div>
                            </div>
                        </div>
                        <!-- .3 -->

                        <!-- 4 -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Apa itu Infaq?</a>
                                </h4>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Infaq adalah mengeluarkan harta yang mencakup zakat (hukumnya wajib) dan non-zakat (hukumnya sunah). Infak wajib di antaranya zakat, kafarat, nazar, dan lain-lain. Infak sunah di antaranya, infak kepada fakir miskin sesama muslim, infak bencana alam, infak kemanusiaan, dan lain-lain. </p>
                                </div>
                            </div>
                        </div>
                        <!-- .4 -->

                        <!-- 5 -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">Apa itu Sedekah?</a>
                                </h4>
                            </div>
                            <div id="collapseFive" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Sedekah (transliterasi: sadakah) adalah pemberian seorang Muslim kepada orang lain secara sukarela dan ikhlas tanpa dibatasi oleh waktu dan jumlah tertentu. Sedekah lebih luas dari sekadar zakat maupun infak. Karena sedekah tidak hanya berarti mengeluarkan atau menyumbangkan harta. Namun sedekah mencakup segala amal atau perbuatan baik. Dalam sebuah hadis digambarkan, “Memberikan senyuman kepada saudaramu adalah sedekah.”</p>
                                </div>
                            </div>
                        </div>
                        <!-- .5 -->

                        <!-- 6 -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">Apa itu Waqaf?</a>
                                </h4>
                            </div>
                            <div id="collapseSix" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Wakaf dari sudut bahasa ialah berhenti atau menahan, manakala dari sudut istilah tajwid ialah menghentikan bacaan sejenak dengan memutuskan suara di akhir perkataan untuk bernapas dengan niat ingin menyambungkan kembali bacaan.</p>
                                    <p>Sebagaimana yang dijelaskan pada UNDANG-UNDANG REPUBLIK INDONESIA, NOMOR 41 TAHUN 2004 TENTANG WAKAF. Pasal 43 Ayat (2) menjelaskan "<i>Pengelolaan dan pengembangan harta benda wakaf dilakukan secara produktif antara lain dengan cara pengumpulan, investasi, penanaman modal, produksi, kemitraan, perdagangan, agrobisnis, pertambangan, perindustrian, pengembangan teknologi, pembangunan gedung, apartemen, rumah susun, pasar swalayan, pertokoan, perkantoran, sarana pendidikan ataupun sarana kesehatan, dan usaha-usaha yang tidak bertentangan dengan syariah. Yang dimaksud dengan lembaga penjamin syariah adalah badan hukum yang menyelenggarakan kegiatan penjaminan atas suatu kegiatan usaha yang dapat dilakukan antara lain melalui skim asuransi syariah atau skim lainnya sesuai dengan ketentuan peraturan perundang-undangan yang berlaku.</i></p>
                                </div>
                            </div>
                        </div>
                        <!-- .6 -->

                        <!-- 7 -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">Apa perbedaan ZISWAF Produktif dan ZISWAF Konsumtif?</a>
                                </h4>
                            </div>
                            <div id="collapseSeven" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Pendanaan ZISWAF Produktif yaitu pendanaan yang diberikan kepada mustahik untuk mengembangkan sebuah usaha produktif dimana pelaksanaanya tetap dibina dan dibimbing oleh pihak yang berwenang, sedangkan</p>
                                    <p>Pendanaan ZISWAF Konsumtif yaitu harta ZISWAF secara langsung diperuntukkan bagi mereka yang tidak mampu dan sangat membutuhkan, terutama fakir miskin. Harta ZISWAF diarahkan terutama untuk memenuhi kebutuhan pokok hidupnya, seperti kebutuhan makanan, pakaian dan tempat tinggal secara wajar.</p>
                                </div>
                            </div>
                        </div>
                        <!-- .7 -->

                        <!-- 8 -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseEight">Apakah Aplikasi ini GRATIS ?</a>
                                </h4>
                            </div>
                            <div id="collapseEight" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Tentu saja, Aplikasi menyediakan fitur yang dapat diakses secara GRATIS dimana pendanaan sesuai dengan aturan syariah islam terkait pendanaan Zakat, Infaq, Sadaqah, dan Waqaf. Silahkan Lihat Halaman TOS untuk Informasi lebih Lanjut</p>
                                </div>
                            </div>
                        </div>
                        <!-- .8 -->

                        <!-- 9 -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseNine">Kemana nantinya dana tersebut disalurkan?</a>
                                </h4>
                            </div>
                            <div id="collapseNine" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Dana yang dikirim oleh donatur tersebut masuk ke rekening Lembaga ZISWAF, yang merupakan Lembaga resmi yang mengatur aktifitas ZISWAF secara keseluruhan. Dana tersebut nantinya langsung didistribusikan kepada UMKM yang terdaftar sesuai dengan pendanaan yang dilakukan</p>
                                </div>
                            </div>
                        </div>
                        <!-- .9 -->

                    </div>
                    <!-- .accordion -->

                </div>

            </div>
        </div>
    </section>
    <!-- tabs & accordion -->

@endsection
