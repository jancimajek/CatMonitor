<html>
<head>
	<title>Cat has loading, human will patient!</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script>
		var REFRESH_CAT = 1; // seconds
		var catTimer;
		var failCatCounter = 0;

		function refreshCat() {
			$.ajax({
				url: "?doCat=ajaxCat",
				success: function( data ) {
					data = data || {img: null, txt: 'meh!'};
					// Show cat:
					renderCat(data.img, data.txt);
					// Reset fail counter:
					failCatCounter = 0;
					// Schedule next refresh:
					catTimer = window.setTimeout(refreshCat, REFRESH_CAT * 1000);
				},
				error: function (data) {
					// If loading fails 10 times, show a broken cat:
					if (failCatCounter++ > 6) {
						renderCat( null, 'Cat cannot be loading, human will patient!');
					}
					// Schedule next refresh:
					catTimer = window.setTimeout(refreshCat, REFRESH_CAT * 1000);
				}
			});
		}

		function renderCat(img, txt) {
			if (typeof img !== 'string') {
				// Here be recursive black hole
				img = 'http://i252.photobucket.com/albums/hh20/Tyishwa/Cat%20Macros/illfixit.jpg';
				txt = 'Null cat returned! Btw: ' + txt;
			}

			// Show image:
			$( "#cat-status-img" ).attr( 'src', img );
			// Set status:
			document.title = txt;
		}
		$(function() {
			catTimer = window.setTimeout(refreshCat, 3000);
		});
	</script>
	<style>
		#cat-status-img {
			max-width: 100%;
			max-height: 100%;
			bottom: 0;
			left: 0;
			margin: auto;
			overflow: auto;
			position: fixed;
			right: 0;
			top: 0;
			z-index: 1;
		}
	</style>
</head>
<body>
	<div id="cat-container" style="text-align: center;">
		<img id="cat-status-img" src="https://lifewithcatnip.files.wordpress.com/2014/01/load_computer_cat.jpg" width="100%" align="center"/>
	</div>
</body>
</html>