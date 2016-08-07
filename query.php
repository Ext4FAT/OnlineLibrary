<html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta http-equiv="Content-Style-Type" content="text/css" />
	  <title> Technique E-Books Library </title>
      <style type="text/css">code{white-space: pre;}</style>
      <style> 
		.bor{border:1px dashed #F00;width:300px;height:60px;margin-top:10px} span{display:block}/*css注释说明：让span形成块*/ 
	  </style>
      <link rel="stylesheet" href="./css/github2.css" type="text/css" />
    </head>
	<body>
		<h1> Technique E-Books Library </h1>
        
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
			include('base.php');
			
			const TAGMAX = 5;
			
			if ($_POST["keyword"] == '')
				return;
			print_r("<h3>[KEYWORD]: " .  $_POST["keyword"] . "</h3>");
			
			$prefix = "http://imaginelab.cn/pdfviewer/web/viewer.html?file=";
			$validType = array('pdf'=>1, 'mobi'=>2, 'epub'=>3, 'txt'=>4);
			$content = shell_exec('find ./Books/ -type f -iname "*' . $_POST["keyword"] . '*"');
			$data = explode("\n", $content);
			
			echo "<table>";
			echo "<tr><th>Selected</th> <th>Type</th> <th>Book</th> <th>Size</th>  <th>Tags</th> </tr>";
			foreach ($data as $path) {
				if ($path=='')
					break;
                $link = $prefix . $path;
                $tags = explode('/', $path);
                $name = array_pop($tags);
				$type = getFileType($name);
				$size = filesize("$path");
                echo "<tr>";
				if ($validType[$type] > 0) {
					// Output [checkbox, icon, bookname, size]
					echo "<th> <input type=\"checkbox\" name=\"selected[]\" value=\"$path\"> </th>";
					echo "<th> <img src=\"./icon/{$type}.png\"/> </th>";
					if ($type == "pdf")
						echo "<th> <a href='{$link}' title=''> $name </a> </th>";
					else 
						echo "<th> $name </th>";
					echo "<th>" . humanReadable($size) . "</th>";
                    // Output Tags
                    echo "<th>";
                    $tag_size = sizeof($tags) > TAGMAX? TAGMAX: sizeof($tags);
                    for ($i = 2; $i < $tag_size; $i++) 
						echo "<i class=\"bor\"> $tags[$i] </i> &nbsp";
						//echo "$tags[$i]";
                    echo "</th>";
                }
                echo "</tr>";
			}
			echo "</table>";
		?>
		E-mail:
		<input 	type="text"
				value="<?php if(isset($_POST['e-mail'])) {echo $_POST['e-mail'];} ?>" 
				name="e-mail" >
        <input type="submit" value="Push">
        </form>
	</body>
</html>
