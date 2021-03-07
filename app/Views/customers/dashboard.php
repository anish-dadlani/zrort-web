<style>
    #map {
        height: 100%;
    }
    #data{
        display: none;
    }
</style>

<div id="map"></div>
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
            var a = {lat: -33.840282, lng:151.207474};
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
<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDu0foMTL3VMqtZDYUn2fjFqjS22ZXBWyI&callback=loadMap"></script>