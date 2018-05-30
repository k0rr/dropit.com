<?php
/**
* "Info" sidan av Dropit.com
*
* PHP version 5
* @category   -
* @author     William Cohrs <wille001@gmail.com>
*/
?>
    <!DOCTYPE html>
    <html lang="sv">

    <head>
        <meta charset="utf-8">
        <title>Dropit.com</title>
        <link rel="stylesheet" href="style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    </head>

    <body>
        <header class="kolumner">
            <h1><a href="index.php">DROPIT.COM</a></h1>
            <nav class="meny">
                <ul>
                    <li><a href="news.php">News</a></li>
                    <li><a href="upcoming_realeses.php">Upcoming realeses</a></li>
                    <li><a href="new_realeses.php">New realeses</a></li>
                    <li><a href="brands.php">Brands</a></li>
                    <li><a href="info.php">Info</a></li>
                    <li><a class="active" href="min_sida.php">My page</a></li>

                </ul>
            </nav>
        </header>

        <main>
            <h2>Hottest stores</h2>
            <div id="map"></div>
            <div class="canv">
            <canvas id="canvas" height="800" width="800"></canvas>
            </div>
            <?php

    // Hämta data från tjänsten
	$url = "https://opendata-download-metfcst.smhi.se/api/category/pmp2g/version/2/geotype/point/lon/18/lat/59/data.json";
	$contents = file_get_contents($url);

    // Avkoda data i JSON-formatet
	$prognos = json_decode($contents);
	$timeSeries = $prognos->timeSeries;
	$labels = "[";
	$data = "[";

    // Leta rätt på data som sökes
	foreach ($timeSeries as $timeSerie) {
		$validTime = $timeSerie->validTime;
		$validTime = substr($validTime, 0, -4);
		$parameters = $timeSerie->parameters;
		foreach ($parameters as $parameter) {
			$name = $parameter->name;
			$temp = $parameter->values[0];

			if ($name == 't') {
				$labels .= "'$validTime', ";
				$data .= "$temp, ";
			}

		}
	}

	$labels = substr($labels, 0, -2) . "]";
	$data = substr($data, 0, -2) . "]";

	echo "<script>
	  	window.onload = function() {
	  		var config = {
	  			type: 'line',
	  			data: {
	  				labels: $labels,
	  				datasets: [{
	  					label: 'SMHI prognos Stockholm',
	  					data: $data,
	  					borderColor: '#3e95cd',
	  					fill: false
	  				}]
	  			}
	  		};
			var ctx = document.getElementById('canvas').getContext('2d');
			new Chart(ctx, config);
		};
		</script>";
	?>

        </main>

        <footer>
            <p>&copy; Copyright William Cohrs</p>
        </footer>

        <script>
            function initMap() {
                var bounds = new google.maps.LatLngBounds();
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 5,
                    center: {
                        lat: 60,
                        lng: 15
                    }
                });
                // Multiple Markers
                var markers = [
                    ['Caliroots', 59.336681, 18.069313],
                    ['Adidas', 55.595470, 13.002202],
                    ['Sportif', 58.410390, 15.620190]
                ];
                // Loop through our array of markers & place each one on the map
                for (i = 0; i < markers.length; i++) {
                    var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
                    bounds.extend(position);
                    marker = new google.maps.Marker({
                        position: position,
                        map: map,
                        title: markers[i][0]
                    });
                }
            }

        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAL4aD7R3I4CQk1Z1EU8VjpBjojdLak9bA&callback=initMap">

        </script>
    </body>

    </html>
