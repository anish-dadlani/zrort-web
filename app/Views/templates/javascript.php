<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script type="text/javascript">


$(window).on('load', function(){
    // showWishlistCount();
    showCartCount();
    $('#suggestions').hide();
});

$('.numberclass').keydown(function(e){
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 || 
        (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) || (e.keyCode >= 35 && e.keyCode <= 40)) {
            return;
    }
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
        $(this).select();
    }
});

$(document).on('keydown','.numberclass',function(e){
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 || 
        (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) || (e.keyCode >= 35 && e.keyCode <= 40)) {
            return;
    }
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
        $(this).select();
    }
});

function showWishlistCount()
{
    $.ajax({
        url : "<?= base_url('products/wishlist/count')?>",
        type: "GET",
        success: function(data) {
            $('#count').empty();
            $('#count').text(data);
        }
    });
}

function showCartCount()
{
    $.ajax({
        url : "<?= base_url('products/count')?>",
        type: "GET",
        success: function(data) {
            $('#cart_count').empty();
            $('#cart_count').text('('+data+' Items)');
        }
    });
}

function edit_address(id)
{
    //save_method = 'update';
    //$('#form')[0].reset(); // reset form on modals
    <?php header('Content-type: application/json'); ?>
    //Ajax Load data from ajax
    $.ajax({
        url : "<?= base_url('customer/address/edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            console.log(data);
            $('[name="flat"]').val(data.flat);
            $('[name="street"]').val(data.street);
            $('[name="sector_colony"]').val(data.sector_colony);
            $('[name="pincode"]').val(data.pincode);
            $('[name="locality"]').val(data.locality);
            $('[name="country"]').val(data.country);
            $('[name="mobile1"]').val(data.mobile1);
            $('#address_model').modal('show');
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log(jqXHR);
            alert('Error get data from ajax');
        }
    });
}

function addToWishList(productID){
    $.ajax({
        url : "<?= base_url('products/wishlist/add')?>/"+productID,
        type: "GET",
        success: function(data) {
            if(data == "Yes"){
                alert("Product Already Exist in Wishlist!")
            }else{
                alert("Product Successfully Added To Wishlist!");
                // showWishlistCount();
            }
        }
    });
}

function deleteFromWishlist(productID){
    $.ajax({
        url : "<?= base_url('products/wishlist/remove')?>/"+productID,
        type: "GET",
        success: function(data) {
            alert("Product Successfully Removed From Wishlist!");
            window.location.href = '<?= base_url('customer/wishlist')?>';
            // showWishlistCount();
        }
    });
}

function addToCart(id)
{
    <?php if(isset($_SESSION['UserAuth']) == 'Yes'){ ?>
        var number = document.getElementById("number").value;
        $.ajax({
            url : "<?= base_url('products/cart')?>/"+id,
            type: "GET",
            success: function(data) {
                if(data == "Yes"){
                    alert("Item already exist in cart");
                }else{
                    alert('Item successfully added to cart!');
                    showCartCount();
                    location.reload();
                }
            }
        });
    <?php } else { ?>
        alert('Please Login / Register to Continue!');
        window.location.href = "<?php echo base_url(); ?>/customer/login";
    <?php } ?>
}

function removeFromCart(id)
{
    $.ajax({
        url : "<?= base_url('products/cartRemove')?>/"+id,
        type: "GET",
        success: function(data) {
            alert('Item successfully removed from cart!');
            // window.location.href = '<?php //echo base_url('orders/checkout'); ?>';
            showCartCount();
            location.reload();
        }
    });
}

function productSearch() {
    var search = $('#search').val();
    if (search.length === 0) {
        $('#suggestions').hide();
    }
    else{
        $.ajax({
            type: "POST",
            url: "<?= base_url('business/search');?>",
            data: {search:search},
            success: function(data) {
                if (data.length > 0) {
                    $('#suggestions').show();
                    $('#autoSuggestionsList').addClass('auto_list');
                    $('#autoSuggestionsList').html(data);
                }
            }
        });
    }
}

function productSearch_() {
    var search = $('#search_').val();
    if (search.length === 0) {
        $('#suggestions').hide();
    }
    else{
        $.ajax({
            type: "POST",
            url: "<?= base_url('products/search');?>",
            data: {search:search},
            success: function(data) {
                if (data.length > 0) {
                    $('#suggestions').show();
                    $('#autoSuggestionsList').addClass('auto_list');
                    $('#autoSuggestionsList').html(data);
                }
            }
        });
    }
}

function plus(product_id)
{	
	var number = document.getElementById("number").value;
	var sumTotal = parseInt($('#finalTotal').text().match(/\d+/));
    var sumSaving = parseInt($('#sumSaving').text().match(/\d+/));

	if(number >= 1)
	{
        $.ajax({
            type: 'POST',
            url: "<?= base_url('orders/set_quantity')?>",
            data: {product_id:product_id, number:number, qty:'plus'},
            success: function(result){
            }
        });

		$.ajax({
			type: 'POST',
			url: "<?= base_url('products/single')?>"+'/'+product_id,
			data: {product_id:'product_id'},
			success: function(result){
				const response = JSON.parse(result);
				if(response.discount_amount != null && response.discount_amount != "" && response.discount_amount > 0){
					var total = parseInt(response.discount_amount) * 1;
					var finalTotal = sumTotal + total;
					var tempCalc = (response.unit_price - response.discount_amount) * 1;
					sumSaving = sumSaving + tempCalc;
				}else if((response.unit_price != null && response.unit_price != "" && response.unit_price > 0) && (response.discount_amount == null || response.discount_amount == "")){
					var total = parseInt(response.unit_price) * 1;
					var finalTotal = sumTotal + total;
				}
				$('#finalTotal').text('Rs '+finalTotal);
                $('#sumSaving').text('Rs '+sumSaving);
                // $("#checkout").on('click', function(){
                //     $.ajax({
                //         type: 'POST',
                //         url: "<?php //echo base_url('orders/set'); ?>",
                //         data: {
                //             'finalTotal':finalTotal,
                //             'sumSaving':sumSaving,
                //         },
                //         success: function(result){
                //         }
                //     });
                // });                
			}
		});
	}
	else{
		//do nothing
	}
}

function minus(product_id)
{	
	var number = document.getElementById("number").value;
	var sumTotal = parseInt($('#finalTotal').text().match(/\d+/));
	var sumSaving = parseInt($('#sumSaving').text().match(/\d+/));
	if(number >= 1)
	{
        $.ajax({
            type: 'POST',
            url: "<?= base_url('orders/set_quantity')?>",
            data: {product_id:product_id, number:number, qty:'minus'},
            success: function(result){
            }
        });

		$.ajax({
			type: 'POST',
			url: "<?= base_url('products/single')?>"+'/'+product_id,
			data: {product_id:'product_id'},
			success: function(result){
				const response = JSON.parse(result);
				if(response.discount_amount != null && response.discount_amount != "" && response.discount_amount > 0){
					var total = parseInt(response.discount_amount) * 1;
					var finalTotal = sumTotal - total;
					var tempCalc = (response.unit_price - response.discount_amount) * 1;
					sumSaving = sumSaving - tempCalc;
				}else if((response.unit_price != null && response.unit_price != "" && response.unit_price > 0) && (response.discount_amount == null || response.discount_amount == "")){
					var total = parseInt(response.unit_price) * 1;
					var finalTotal = sumTotal - total;
				}
				$('#finalTotal').text('Rs '+finalTotal);
				$('#sumSaving').text('Rs '+sumSaving);
                $("#checkout").on('click', function(){
                    $.ajax({
                        type: 'POST',
                        url: "<?= base_url('orders/set')?>",
                        data: {
                            'finalTotal':finalTotal,
                            'sumSaving':sumSaving,
                        },
                        success: function(result){
                        }
                    });
                }); 
			}
		});
	}
	else{
		//do nothing
	}
}
</script>