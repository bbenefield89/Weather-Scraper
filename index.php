<?php
  
  if ($_GET['city']) {
	$city = str_replace(' ', '', $_GET['city']);
	$forecastPage = file_get_contents("http://www.weather-forecast.com/locations/".$city."/forecasts/latest");
	$pageArray = explode('3 Day Weather Forecast Summary:</b><span class="read-more-small"><span class="read-more-content"> <span class="phrase">', $forecastPage);
	$secondPageArray = explode('</span>', $pageArray[1]);
	$weather = $secondPageArray[0];
  }

?>

<!DOCTYPE html>
<html lang="en" style="background: url(sky.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	
	<!-- Personal CSS -->
	<link type="text/css" rel="stylesheet" href="css/indexcss.css">
  </head>
<body style="background: none;">
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-sm-5">
	  <h1>What's the weather?</h1>
        <div class="row justify-content-center">
            <div>
	  <p>Enter the name of a city</p>
            </div>
        </div>
	</div>
  </div>
  <form method="get">
    <div class="row justify-content-center">
	  <div class="form-group col-sm-4">
		<input type="text" class="form-control" id="city" placeholder="Enter City Name" name="city">
		<br>
	  </div>
    </div>
	<div class="row justify-content-center">
	  <div class="form-group">
		<button type="submit" class="btn btn-primary" name="submit">Submit</button>
	  </div>
	</div>
  </form>
  <div class="row justify-content-center">
	<div class="form-group col-sm-4">
	  
	    <?php
		
		if ($weather) {
			echo '<div class="alert alert-success" role="alert">
  <strong>'.$weather.'</strong></div>';
		}
		
		?>
	</div>
  </div>
</div>
	
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>