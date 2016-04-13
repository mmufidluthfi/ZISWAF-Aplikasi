@extends('dashboard.dashboard')

	@section('content')
	<section class="content">
		<div class="widget-container">
			<section class="widget small">
				<header>
					<span class="icon">&#59168;</span>
					<hgroup>
						<h1>Foto Profile</h1>
						<h2>Foto Frofile Anda Sekarang</h2>
					</hgroup>
				</header>
				<div class="content no-padding timeline">
						<div class="profile-img">
							<center><p><img src="images/uiface2.png" alt="" height="200" width="200" /></p></center>
						</div>
				</div>
			</section>
			
			<section class="widget small">
				<header> 
					<span class="icon">&#128362;</span>
					<hgroup>
						<h1>Ganti Foto Profile</h1>
						<h2>Disarankan Ukuran 200 x 200</h2>
					</hgroup>
				</header>
				<div class="content no-padding timeline">
					<div class="content">
						<form enctype="multipart/form-data">
						<div class="field-wrap">
							<input type="file" name="fileToUpload" id="fileToUpload">
						</div>
							<button type="submit" class="green">Update Foto</button>
						</form> 
					</div>
				</div>
			</section>
		</div>
	</section>
		
@endsection

