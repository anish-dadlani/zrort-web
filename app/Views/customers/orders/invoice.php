<?php //print_r($products); exit; ?>
<div class="gambo-Breadcrumb">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= base_url('customer/dashboard')?>">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Bill Inovice</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>
<div class="bill-dt-bg">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="bill-detail">
						<div class="bill-dt-step">
							<div class="bill-title">
								<h4>Items</h4>
							</div>
							<div class="bill-descp">
								<div class="itm-ttl" id='items_total_2'><?= $order_placed['total_items'].' Item(s)' ?></div>
								<?php if(isset($products)) { 
									foreach($products as $key => $item){ ?>
									<span class="item-prdct"><?= $item['name'] ?> 
									<?= get_unit_by_product_id($item['pk_id']) ?>
									<?= '('.$item['quantity'].')' ?>
									</span>
								<?php } }?> 
								<!-- unit add -->
							</div>
						</div>
						<div class="bill-dt-step">
							<div class="bill-title">
								<h4>Delivery Address</h4>
							</div>
							<div class="bill-descp">
								<div class="itm-ttl"><?= $order_placed['address_type'] ?></div>
								<p class="bill-address"><?= $order_placed['house_no'] ?>, <?= $order_placed['street'] ?>, <?= $order_placed['sector_colony'] ?>, <?= $order_placed['city'] ?>, <?= $order_placed['zipcode'] ?></p>
							</div>
						</div>
						<div class="bill-dt-step">
							<div class="bill-title">
								<h4>Payment</h4>
							</div>
							<div class="bill-descp">
								<div class="total-checkout-group p-0 border-top-0">
									<!-- <div class="cart-total-dil"> -->
										<!-- <h4>Subtotal</h4> -->
										<!-- <span>Rs 15</span> -->
									<!-- </div> -->
									<div class="cart-total-dil pt-3">
										<h4>Delivery Charges</h4>
										<span><?= 'Rs '.$order_placed['delivery_fee']?></span>
									</div>
								</div>
								<div class="main-total-cart pl-0 pr-0 pb-0 border-bottom-0">
									<h2>Total</h2>
									<?php $sumTotal = 0; $sumSaving = 0;
									if(isset($_SESSION['cart'])){
										foreach($_SESSION['cart'] as $key => $item): 
											if(isset($item['discount_amount'])){
												$sumTotal = $sumTotal + $item['discount_amount']; 
												$sumSaving = $sumSaving + ($item['unit_price'] - $item['discount_amount']);
											}else{
												$sumTotal = $sumTotal + $item['unit_price']; 
											}
										endforeach; } ?>
									<?php if(isset($_SESSION['checkout'])){?>
										<span><?= 'Rs '.$_SESSION['checkout']['finalTotal'] ?></span>
									<?php } else {?>
										<span><?= 'Rs '.$order_placed['t']?></span>
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="bill-dt-step">
							<div class="bill-title">
								<h4>Delivery Details</h4>
							</div>
							<div class="bill-descp">
								<!-- <p class="bill-dt-sl"><b>Super Store</b> - <span class="dly-loc">Ludhiana</span> - <span class="dlr-ttl25">$26</span></p> -->
								<p class="bill-dt-sl">Order ID - <span class="descp-bll-dt"><?= $order_placed['order_no'] ?></span></p>
								<p class="bill-dt-sl">Items - <span class="descp-bll-dt" id='items_total'><?= $order_placed['total_items'] ?></span></p>
								<p class="bill-dt-sl">Timing - <span class="descp-bll-dt"><?= $order_placed['date_time'] ?></span></p>
							</div>
						</div>
						<div class="bill-dt-step">
							<div class="bill-title">
								<h4>Payment Option</h4>
							</div>
							<div class="bill-descp">
								<p class="bill-dt-sl"><span class="dlr-ttl25 mr-1"><i class="uil uil-check-circle"></i></span><?= get_method_name($order_placed['payment_method_id'])?></p>
							</div>
						</div>
						<div class="bill-dt-step">
							<div class="bill-bottom">
								<div class="thnk-ordr">Thanks for Ordering</div>
								<a class="print-btn hover-btn" href="javascript:window.print();">Print</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>