<!-- Categories Start -->
<div class="section145">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="main-title-tt">
					<div class="main-title-left">
						<span>Shop By</span>
						<h2>Categories</h2>
					</div>
				</div>
			</div>
			<div class="col-md-12">
	    		<div class="owl-carousel cate-slider owl-theme">
				<?php foreach($categories as $key => $category){?>
					<div class="item">
						<a href="<?php echo base_url().'/products/category/view'.'/'.$category['pk_id']?>" class="category-item">
							<div class="cate-img">
								<img src="<?php echo base_url().'/'.$category['image_path']; ?>" alt="">
							</div>
							<h4><?php echo $category['name']; ?></h4>
						</a>
					</div>
				<?php }?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Categories End -->