<!-- Category Model Start-->
<?php $data = customerDashboard(); ?>
<div id="category_model" class="header-cate-model main-gambo-model modal fade" tabindex="-1" role="dialog" aria-modal="false">
    <div class="modal-dialog category-area" role="document">
        <div class="category-area-inner">
            <div class="modal-header">
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
					<i class="uil uil-multiply"></i>
                </button>
            </div>
            <div class="category-model-content modal-content"> 
			    <div class="cate-header">
				    <h4>Select Category</h4>
				</div>
                <ul class="category-by-cat">
				<?php foreach($data['categories'] as $key => $category){?>
					<li>
						<a href="<?php echo base_url().'/products/category/view'.'/'.$category['pk_id']?>" class="single-cat-item">
							<div class="icon">
								<img src="<?php echo base_url().'/'.$category['image_path']; ?>" alt="">
							</div>
							<div class="text"> <?php echo $category['name']; ?> </div>
						</a>
					</li>
				<?php }?>
                </ul>
				<a href="#" class="morecate-btn"><i class="uil uil-apps"></i>More Categories</a>
            </div>
        </div>
    </div>
</div>
<!-- Category Model End-->