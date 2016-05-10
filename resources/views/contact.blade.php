@extends('layouts.app')

@section('content')
    <!-- breadcrumbs -->
    <section class="breadcrumbs">
        <div class="breadcrumbs-wrapper">
            <div class="container">
                <div class="row">

                    <!-- page title -->
                    <div class="col-md-6 col-xs-6">
                        <h4>Contact</h4>
                    </div>
                    <!-- .page title -->

                    <!-- breadcumbs -->
                    <div class="col-md-6 col-xs-6">
                        <ol class="breadcrumb">
                            <li><a href="/">Home</a>
                            </li>
                            <li class="active"><a href="contact.html">Contact</a>
                            </li>
                        </ol>
                    </div>
                    <!-- .breadcrumbs -->
                </div>
            </div>
        </div>
    </section>
    <!-- .breadcrumbs -->

    <!-- map -->
    <div class="map">
        <div class="embed-container ">
            <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d126729.57642485152!2d107.5615166070992!3d-6.973975840506776!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x2dd6285c5b7da517%3A0x864485f26a388f95!2stelkom+university!3m2!1d-6.973980999999999!2d107.63155719999999!5e0!3m2!1sid!2sid!4v1459889395645"></iframe>
        </div>
    </div>
    <!-- .map -->

    <!-- contact form & additional info -->
    <section>
        <div class="container">
            <div class="row">

                <!-- contact form -->
                <div class="col-md-8">
                    <div class="widget">
                        <div class="box-wrapper">
                            <div class="box">

                                <!-- heading -->
                                <div class="form-heading">
                                    <h5>Contact Us Form</h5>

                                </div>
                                <!-- heading -->

                                <!-- border -->
                                <hr />
                                <!-- .border -->
                                <center><font color="greeb"><?php echo Session::get('message-kontakkita'); ?></font></font></center>
                                <!-- form -->
                                <div class="content">
                                    <form class="form-horizontal" role="form" action="{{ URL::to('simpan_pesan') }}" method="post">
                                    {!! csrf_field() !!}

                                        <!-- widget box -->
                                        <div class="widget-box">
                                            <div class="form-group">
                                                <label>Nama Lengkap</label>
                                                <input required type="text" class="form-control" name="nama_lengkap" />
                                            </div>
                                        </div>
                                        <!-- .widget box -->

                                        <!-- widget box -->
                                        <div class="widget-box">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input required type="text" class="form-control" name="email" />
                                            </div>
                                        </div>
                                        <!-- .widget box -->

                                        <!-- widget box -->
                                        <div class="widget-box">
                                            <div class="form-group">
                                                <label>Pesan </label>
                                                <textarea required class="form-control" name="pesan"></textarea>
                                            </div>
                                        </div>
                                        <!-- .widget box -->

                                        <!-- widget box -->
                                        <div class="widget-box">
                                            <div class="form-group">
                                                <button type="submit">KIRIM PESAN</button>
                                            </div>
                                        </div>
                                        <!-- .widget-box -->

                                    </form>
                                </div>
                                <!-- .form -->


                            </div>
                        </div>
                    </div>
                </div>
                <!-- .contact form -->

                <!-- additional info -->
                <div class="col-md-4">
                    <div class="box-wrapper">
                        <div class="box">
                            <div class="form-heading">
                                <h5>Additional Info</h5>
                            </div>
                            <hr />
                            <div class="content">                                
                                <p>Address:
                                    <span class="pull-right grey">Jalan Sukabirus, Bandung</span>
                                </p>
                                <p>Phone:
                                    <span class="pull-right grey">+628 5351 4567 11</span>
                                </p>
                                <p>Fax:
                                    <span class="pull-right grey">+628 5351 4567 11</span>
                                </p>
                                <p>Email:
                                    <span class="pull-right grey">info@ziswaf.org</span>
                                </p>
                                <p>Web:
                                    <span class="pull-right grey">https://ziswaf.org/</span>
                                </p>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- additional info -->

            </div>
        </div>
    </section>
    <!-- .contact form & additional info -->
    
@endsection
