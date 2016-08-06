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
		function getBasename($path) {
			$extern = explode('/', $path);
			return end($extern);
		}
		
		$YOU_KINDLE_EMAIL = $_POST["e-mail"];
		$MAIL_PATTERN = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
		
		if (!preg_match( $MAIL_PATTERN, $YOU_KINDLE_EMAIL)) {
			echo "<h3> Warning </h3>";
			echo "<br/> Please back to the last pase to check you e-mail address if valid.<br/>";
		}
		else {
			echo "<h2> [$YOU_KINDLE_EMAIL] </h2>";
			echo "<h3> Selected Books </h3>";
			$CMD = 'sendemail -s smtp.gmail.com:587 -f njucs315@gmail.com -t ' . "$YOU_KINDLE_EMAIL" . ' -u "EBOOK-ADD" -m "EBOOK-LIST" -xu njucs315@gmail.com -xp xxxxxxx -o tls=auto ';
			foreach ($_POST["selected"] as $select) {
				echo getBasename("$select") . "<br/>";
				$state = exec("$CMD -a  \"$select\"" . " 1>/dev/null &");
			}
			echo "<br/><br/> Selected E-books has been sent to your E-mail Successfully. Please check it. If there are serval books, maybe you need to wait for a while. <br/>";
		}
		?>
		<!--If you have any question, you can contact me with my e-mail.-->
	</body>
</html>
