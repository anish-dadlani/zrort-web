</div>
<!-- Body End -->
<footer class="footer">
		<div class="footer-first-row">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<ul class="call-email-alt">
							<li><a href="#" class="callemail"><i class="uil uil-dialpad-alt"></i>1800-000-000</a></li>
							<li><a href="#" class="callemail"><i class="uil uil-envelope-alt"></i>info@gambosupermarket.com</a></li>
						</ul>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="social-links-footer">
							<ul>
								<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
								<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
								<li><a href="#"><i class="fab fa-instagram"></i></a></li>
								<li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
							</ul>
						</div>
					</div>				
				</div>
			</div>
		</div>
		<div class="footer-second-row">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="second-row-item">
							<h4>Categories</h4>
							<ul>
							<?php foreach ($_SESSION['categories'] as $key => $item): ?>
								<li><a href="<?= base_url().'/products/category/view'.'/'.$item['pk_id']?>"><?= $item['name'] ?></a></li>
							<?php endforeach?>
							</ul>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="second-row-item">
							<h4>Useful Links</h4>
							<ul>
								<li><a href="#">About US</a></li>
								<li><a href="#">Featured Products</a></li>
								<li><a href="#">Offers</a></li>
								<li><a href="#">Blog</a></li>
								<li><a href="#">Faq</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Contact Us</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="second-row-item">
							<h4>Top Cities</h4>
							<ul>
								<li><a href="#">Gurugram</a></li>
								<li><a href="#">New Delhi</a></li>
								<li><a href="#">Bangaluru</a></li>
								<li><a href="#">Mumbai</a></li>
								<li><a href="#">Hyderabad</a></li>
								<li><a href="#">Kolkata</a></li>
								<li><a href="#">Ludhiana</a></li>
								<li><a href="#">Chandigrah</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="second-row-item-app">
							<h4>Download App</h4>
							<ul>
								<li><a href="#"><img class="download-btn" src="<?= base_url() ?>/assets/customers/images/download-1.svg" alt=""></a></li>
								<li><a href="#"><img class="download-btn" src="<?= base_url() ?>/assets/customers/images/download-2.svg" alt=""></a></li>
							</ul>
						</div>
						<div class="second-row-item-payment">
							<h4>Payment Method</h4>
							<div class="footer-payments">
								<ul id="paypal-gateway" class="financial-institutes">
									<li class="financial-institutes__logo">
									  <img alt="Visa" title="Visa" src="<?= base_url() ?>/assets/customers/images/footer-icons/pyicon-6.svg">
									</li>
									<li class="financial-institutes__logo">
									  <img alt="Visa" title="Visa" src="<?= base_url() ?>/assets/customers/images/footer-icons/pyicon-1.svg">
									</li>
									<li class="financial-institutes__logo">
									  <img alt="MasterCard" title="MasterCard" src="<?= base_url() ?>/assets/customers/images/footer-icons/pyicon-2.svg">
									</li>
									<li class="financial-institutes__logo">
									  <img alt="American Express" title="American Express" src="<?= base_url() ?>/assets/customers/images/footer-icons/pyicon-3.svg">
									</li>
									<li class="financial-institutes__logo">
									  <img alt="Discover" title="Discover" src="<?= base_url() ?>/assets/customers/images/footer-icons/pyicon-4.svg">
									</li>
								</ul>
							</div>
						</div>
						<div class="second-row-item-payment">
							<h4>Newsletter</h4>
							<div class="newsletter-input">
								<input id="emailaddress" name="emailaddress" type="text" placeholder="Email Address" class="form-control input-md" required="">
								<button class="newsletter-btn hover-btn" type="submit"><i class="uil uil-telegram-alt"></i></button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-last-row">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="footer-bottom-links">
							<ul>
								<li><a href="#">About</a></li>
								<li><a href="#">Contact</a></li>
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Term & Conditions</a></li>
								<li><a href="#">Refund & Return Policy</a></li>
							</ul>
						</div>
						<div class="copyright-text">
							<i class="uil uil-copyright"></i>Copyright 2020 <b>Zrort</b> . All rights reserved
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- Footer End -->