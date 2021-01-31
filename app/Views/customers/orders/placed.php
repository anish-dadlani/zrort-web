<?php //print_r($order_placed); exit;?>
<div class="gambo-Breadcrumb">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= base_url('customer/dashboard')?>">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Order Placed</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>
        <div class="all-product-grid">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 col-md-8">
					<?php if(!empty($order_placed)){ 
						foreach($order_placed as $key => $order): ?>
						<div class="order-placed-dt">
							<i class="uil uil-check-circle icon-circle"></i>
							<h2>Order Successfully Placed</h2>
							<p>Thank you for your order! will received order timing - <span>(<?= $order['date_time'] ?>)</span></p>
							<div class="delivery-address-bg">
								<div class="title585">
									<div class="pln-icon"><i class="uil uil-telegram-alt"></i></div>
									<h4>Your order will be sent to this address</h4>
								</div>
								<ul class="address-placed-dt1">
									<li><p><i class="uil uil-map-marker-alt"></i>Address :<span><?= $order['house_no'] ?>, <?= $order['street'] ?>, <?= $order['sector_colony'] ?>, <?= $order['city'] ?>, <?= $order['zipcode'] ?></span></p></li>
									<li><p><i class="uil uil-phone-alt"></i>Phone Number :<span><?= $order['mobile1'] ?></span></p></li>
									<li><p><i class="uil uil-envelope"></i>Email Address :<span><?= $_SESSION['email'] ?></span></p></li>
									<li><p><i class="uil uil-card-atm"></i>Payment Method :<span><?= get_method_name($order['payment_method_id']) ?></span></p></li>
								</ul>
								<div class="stay-invoice">
									<div class="st-hm">Stay Home<i class="uil uil-smile"></i></div>
									<a href="<?=base_url('orders/invoice').'/'.$order['order_no']?>" class="invc-link hover-btn">Invoice</a>
								</div>
								<?php if ($order['payment_method_id'] == '1'){?>
								<div class="placed-bottom-dt">
									The payment of <span>Rs <?= $order['total'] ?></span> you'll make when the deliver arrives with your order.
								</div>
								<?php } ?>
							</div>
						</div>
						<?php endforeach; } else{?>
						<div class="order-placed-dt">
							<i class="uil uil-check-circle icon-circle"></i>
							<h2>You have not purchased anything yet!</h2>
						</div>
						<?php }?>
					</div>
				</div>
			</div>
		</div>