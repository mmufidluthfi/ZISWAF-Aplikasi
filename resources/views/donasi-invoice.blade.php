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
                            <br/><center><h3>Invoice Pendanaan</h3></center>

                            <div class="content comments">
                                <h3 class="grey"><a href="#">Help this child to have bright future</a></h3> 
                                <h6 class="grey">Kategori: Zakat</h6>
                                <p>
                                	Nama : Muhammad Mufid Luthfi<br/>
                                	Nominal : Rp 50000<br/>
                                	Status : Belum Transfer<br/>
                                </p>
                                <center><a href="dashboard/"><img src="images/Dashboard.png"><br/>Kembali ke Halaman Dashboard</a></center>
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
