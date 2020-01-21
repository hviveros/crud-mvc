<style>
	#map {
		height: 100%;
	}
</style>

<img src="https://maps.googleapis.com/maps/api/staticmap?zoom=15&size=100x200&maptype=roadmap&key=AIzaSyBeS0_l--kJyOVbbC3SLrLrP1SkEfCepbQ&markers=color:blue%7Clabel:Y%7C19.4326077,-99.13320799999997">

<!-- <div id="map"></div> -->
<script>
	var map;
	function initMap() {
		var myLatLng = { lat: 19.4326077, lng: -99.13320799999997 };
		map = new google.maps.Map(document.getElementById('map'), {
			center: myLatLng,
			zoom: 6
		});

		var marker = new google.maps.Marker({
			position: { lat: 19.4326177, lng: -99.23320799999997 },
			map: map,
			title: "Oficinas"
		});

	}



</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBeS0_l--kJyOVbbC3SLrLrP1SkEfCepbQ&callback=initMap" async defer></script>