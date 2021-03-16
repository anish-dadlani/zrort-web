<style>
    #map {
        height: 80vh;
    }
    #data{
        display: none;
    }
</style>
    <div class="tab-content">
		<div class="tab-pane container-fluid active p-0" id="mapdiv">
            <div class="wrapper">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="map"></div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
		<div class="tab-pane container-fluid fade p-0" id="businessdiv">
			<?php echo view('/templates/customers/offers'); ?>
		</div>
	</div>
<?php 
    if(isset($markers) && !empty($markers)){
        $data = json_encode($markers, true);
        echo '<div id="data">'.$data.'</div>';
    }
?>

<script>
<?php 
    if(isset($markers) && !empty($markers)){ ?>
        var map;
        function loadMap() {
            var a = {lat: 33.72148, lng:73.04329};
            map = new google.maps.Map(document.getElementById('map'),{
                zoom: 12,
                center: a
            });

            var marker = new google.maps.Marker({
                position: a,
                map: map
            });

            var cdata = JSON.parse(document.getElementById('data').innerHTML);
            showmap(cdata);
        }

        function showmap(cdata)
        {
            var infoWind = new google.maps.InfoWindow; 
            Array.prototype.forEach.call(cdata, function(data){
                var content = document.createElement('div');
                var strong = document.createElement('strong');
                strong.textContent = data.name;
                content.appendChild(strong);
                var marker = new google.maps.Marker({
                    position : new google.maps.LatLng(data.lat, data.lng),
                    map: map
                });
                marker.addListener('click', function(){
                    window.location.href = "<?php echo base_url(); ?>/business/products/view/"+data.id;
                    infoWind.setContent(content);
                    infoWind.open(map, marker);
                });
            });
        }
<?php } ?>
</script>
<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9KG5eaSmyRBFmTi20MFk1sQzZUf-rrpI&callback=loadMap"></script>