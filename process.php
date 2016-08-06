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
        <h3> Selected Books </h3>
		<?php
		foreach ($_POST["checkbox"] as $select) {
			echo $select . "<br/>";
			/*
				$link = $prefix . $path;
				$name = explode('/', "$path");
				$name = end($name);
				if ($name=='')
					break;
				echo "<input type=\"checkbox\" name=\"checkbox[]\" value=$path> <img src=\"./icon/pdf.png\"/> ";
				echo "<a href='{$link}' title=''> $name </a> <br/>";
			*/
		}
		?>
	</body>
</html>
