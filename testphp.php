<html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta http-equiv="Content-Style-Type" content="text/css" />
	  <title> Technique Books Library </title>
      <style type="text/css">code{white-space: pre;}</style>
      <link rel="stylesheet" href="./css/github2.css" type="text/css" />
    </head>
	<body>
		<h1> Technique Books Library </h1>
        
        <form action="testphp.php" method="post">
             <input type="text"
                    value="<?php if(isset($_POST['keyword'])) {echo $_POST['keyword'];} ?>" 
                    name="keyword" >
             
             <!--<input type="text" name="e-mail">-->
			 <input type="submit" value="Search">
        </form>
        
        <form action="process.php" method="post">
		<?php
			header("Content-type: text/html; charset=utf-8");
			if ($_POST["keyword"] == '')
				return;
			print_r("<h3>[KEYWORD]: " .  $_POST["keyword"] . "</h3><br/>");
			$content = shell_exec('find ./Books/ -type f -iname "*' . $_POST["keyword"] . '*.pdf"');
			$data = explode("\n", $content);
			$prefix = "http://imaginelab.cn/pdfviewer/web/viewer.html?file=";
			foreach ($data as $path) {
				$link = $prefix . $path;
				$name = explode('/', "$path");
				$name = end($name);
				if ($name=='')
					break;
				echo "<input type=\"checkbox\" name=\"checkbox[]\" value=$path> <img src=\"./icon/pdf.png\"/> ";
				echo "<a href='{$link}' title=''> $name </a> <br/>";
			}
		?>
        <br/><br/>
		E-mail:
		<input 	type="text"
				value="<?php if(isset($_POST['e-mail'])) {echo $_POST['e-mail'];} ?>" 
				name="e-mail" >
        <input type="submit" value="Push">
        </form>
	</body>
</html>
