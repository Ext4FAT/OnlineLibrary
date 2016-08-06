<html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta http-equiv="Content-Style-Type" content="text/css" />
	  <title> Technique E-Books Library </title>
      <style type="text/css">code{white-space: pre;}</style>
      <link rel="stylesheet" href="./css/github2.css" type="text/css" />
    </head>
	<body>
		<h1> Technique Books Library </h1>
        
        <!-- Post Query--> 
        <form action="query.php" method="post">
             <input type="text"
                    value="<?php if(isset($_POST['keyword'])) {echo $_POST['keyword'];} ?>" 
                    name="keyword" >
			 <input type="submit" value="Search">
        </form>
        
        <!-- Process Query -->
        <form action="process.php" method="post">
		<?php
			function getFileType($filename) {
				$extern = explode('.', $filename);
				return end($extern);
			}
			
			function getBasename($path) {
				$extern = explode('/', $path);
				return end($extern);
			}
			
			if ($_POST["keyword"] == '')
				return;
			print_r("<h3>[KEYWORD]: " .  $_POST["keyword"] . "</h3><br/>");
			
			$prefix = "http://imaginelab.cn/pdfviewer/web/viewer.html?file=";
			$validType = array('pdf'=>1, 'mobi'=>2, 'epub'=>3, 'txt'=>4);
			$content = shell_exec('find ./Books/ -type f -iname "*' . $_POST["keyword"] . '*"');
			$data = explode("\n", $content);
			
			foreach ($data as $path) {
				if ($path=='')
					break;
				$link = $prefix . $path;
				$name = getBasename($path);
				$type = getFileType($name);
				if ($validType[$type] > 0) {
					echo "<input type=\"checkbox\" name=\"selected[]\" value=\"$path\"> <img src=\"./icon/{$type}.png\"/> ";
					if ($type == "pdf")
						echo "<a href='{$link}' title=''> $name </a> <br/>";
					else 
						echo $name . "<br/>";
				}
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
