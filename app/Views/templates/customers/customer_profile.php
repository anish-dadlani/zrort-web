<div class="gambo-Breadcrumb">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= base_url('customer/dashboard')?>">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">User Profile</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>
<div class="dashboard-group">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="user-dt">
					<div class="user-img">
						<img src="<?= base_url()?>/assets/customers/images/avatar/img-5.jpg" alt="">
						<div class="img-add">													
							<input type="file" id="file">
							<label for="file"><i class="uil uil-camera-plus"></i></label>
						</div>
					</div>
					<h4><?= $_SESSION['firstname'].' '.$_SESSION['lastname']?></h4>
					<p><?= $_SESSION['phone']?><a href="#">
					<!-- <i class="uil uil-edit"></i></a></p> -->
					<!-- <div class="earn-points"><img src="<?= base_url()?>/assets/customers/images/Dollar.svg" alt="">Points : <span>20</span></div> -->
				</div>
			</div>
		</div>
	</div>
</div>