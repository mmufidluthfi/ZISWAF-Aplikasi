<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<title>Dashboard | ZISWAF Crowdfunding</title>

    <meta name="keywords" content="ZISWAF Crowdfunding | Zakat | Infaq | Sadaqah | Waqaf" />
    <meta name="description" content="Aplikasi Pendanaan untuk Zakat, Infaq, Sadaqah dan Waqaf untuk kegiatan ZISWAF Produktif khusu UMKM">
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">

	<link href="{{ URL::asset('dashboard/css/style.css')}}" rel="stylesheet">

	<!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{URL::to('/')}}../images/favico.png">

	<!--[if IE]><link rel="stylesheet" href="css/ie.css" media="all" /><![endif]-->
	<!--[if lt IE 9]><link rel="stylesheet" href="css/lt-ie-9.css" media="all" /><![endif]-->
</head>
<body>
<div class="testing">
	<header class="main">
		<a href="../"><h1><strong>ZISWAF Crowdfunding</strong> Dashboard</h1></a>
		<input type="text" value="search" />
	</header>
	<section class="user">
		<div class="profile-img">
			<p><img src="images/uiface2.png" alt="" height="40" width="40" /> Selamat Datang MMufidLuthfi</p>
		</div>
		<div class="buttons">
			<button class="ico-font">&#9206;</button>
			<span class="button blue"><a href="../login.html">Logout</a></span>
		</div>
	</section>
</div>
<nav>
	<ul>
		<li class="section"><a href="index.html"><span class="icon">&#128711;</span> Dashboard</a></li>
		<li ><a href="pendanaan.html"><span class="icon">&#127758;</span> Pendanaan</a></li>
		<li ><a href="laporan.html"><span class="icon">&#128203;</span> Laporan</a></li>
		<li>
			<a href="#"><span class="icon">&#9881;</span>Pengaturan</a>
			<ul class="submenu">
				<li><a href="profile.html">Edit Profile</a></li>
				<li><a href="profile-foto.html">Ganti Foto</a></li>
				<li><a href="profile-password.html">Ganti Password</a></li>
			</ul>
		</li>
	</ul>
	<br/><br/><center><img src="../images/logo_white.png "/></center>
</nav>

	@yield('contentdashboard')

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
	<script src="{{ URL::asset('dashboard/js/jquery.wysiwyg.js')}}"></script>
	<script src="{{ URL::asset('dashboard/js/custom.js')}}"></script>
	<script src="{{ URL::asset('dashboard/js/cycle.js"></script>
	<script src="{{ URL::asset('dashboard/js/jquery.checkbox.min.js')}}"></script>
	<script src="{{ URL::asset('dashboard/js/flot.js')}}"></script>
	<script src="{{ URL::asset('dashboard/js/flot.resize.js')}}"></script>
	<script src="{{ URL::asset('dashboard/js/flot-time.js')}}"></script>
	<script src="{{ URL::asset('dashboard/js/flot-pie.js')}}"></script>
	<script src="{{ URL::asset('dashboard/js/flot-graphs.js')}}"></script>
	<script src="{{ URL::asset('dashboard/js/cycle.js')}}"></script>
	<script src="{{ URL::asset('dashboard/js/jquery.tablesorter.min.js')}}"></script>
	<script type="text/javascript">
	// Feature slider for graphs
	$('.cycle').cycle({
		fx: "scrollHorz",
		timeout: 0,
	    slideResize: 0,
	    prev:    '.left-btn', 
	    next:    '.right-btn'
	});
	</script>
</body>
</html>

