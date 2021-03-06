<?php

$error = "";
$successMessage = "";

  if ($_POST) {
	  
	  if (!$_POST["email"]) {
		  $error .= "An Email address is required<br>";
	  }
	  if (!$_POST["content"]) {
		  $error .= "A content field is required<br>";
	  }
	  if (!$_POST["subject"]) {
		  $error .= "A subject is required<br>";
	  }
	  if ($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
		$error .= "The email address is invalid.<br>";
	  }
	  if ($error != "") {
		  $error = '<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>'.$error.'</div>';
	  } else {
		  $emailTO = "bsquared18@gmail.com";
		  $subject = $_POST["subject"];
		  $content = $_POST["content"];
		  $headers = "FROM: ".$_POST["email"];
	  }  
		  if (mail($emailTO, $subject, $content, $headers)) {
			  $successMessage = '<div class="alert alert-success" role="alert"><p><strong>Great, your email has been submitted. We will get back to you ASAP.</strong></p></div>';
		  } else {
			  $error = '<div class="alert alert-danger" role="alert"><p><strong>Message could not be sent, please try again later.</strong></p></div>';
		  }
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  </head>
  <body>
    
<div class="container">
  <h1>Get in touch!</h1>
  
  <div id="error"><? echo $error.$successMessage; ?></div>
  
  <form method="post">
    <div class="form-group">
      <label for="email">Email address</label>
      <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group" id="wtf">
      <label for="subject">Subject</label>
      <input type="text" class="form-control" id="subject" name="subject">
    </div>

    <div class="form-group">
      <label for="content">What would you like to ask us?</label>
      <textarea class="form-control" id="content" rows="3" name="content"></textarea>
    </div>
  
    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
  </form>
	  
</div>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	
	<script type="text/javascript">
		$("form").submit(function (e) {
			
			var error="";
			
			if ($("#email").val() == "") {
				error += "The email field is required.<br>";
			}
			if ($("#subject").val() == "") {
				error += "The subject field is required.<br>";
			}
			if ($("#content").val() == "") {
				error += "The content field is required.";
			}
			if (error != "") {
				$("#error").html('<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' + error + '</div>');
				return false;
			}  else {
				 return true;
			}
		});
	</script>
  </body>
</html>