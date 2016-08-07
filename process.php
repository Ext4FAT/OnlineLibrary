<html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta http-equiv="Content-Style-Type" content="text/css" />
	  <title> Technique Books Library </title>
      <style type="text/css">code{white-space: pre;}</style>
      <link rel="stylesheet" href="./css/github2.css" type="text/css" />
    </head>
	<body>
        <h1> Push Books to Kindle </h1>
		<?php
		include('base.php');
		
		$YOU_KINDLE_EMAIL = $_POST["e-mail"];
		
		if (!validMail($YOU_KINDLE_EMAIL)) {
			echo "<h3> Warning </h3>";
			echo "<br/> Please back to the last pase to check you e-mail address if valid.<br/>";
		}
		else {
			echo "<h2> [$YOU_KINDLE_EMAIL] </h2>";
			echo "<h3> Selected Books </h3>";
			foreach ($_POST["selected"] as $select) {
				echo getBasename("$select") . "<br/>";
				$state = mySendEmail($YOU_KINDLE_EMAIL, "$select");
			}
			echo "<br/><br/> Selected E-books have been sent to your E-mail Successfully. Please check it. If there are serval books, maybe you need to wait for a while. <br/>";
		}
		?>
		<!--If you have any question, you can contact me with my e-mail.-->
	</body>
</html>
