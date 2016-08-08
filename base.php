<?php
	function getFileType($filename) {
		$extern = explode('.', $filename);
		return end($extern);
	}
	
	function getBasename($path) {
		$extern = explode('/', $path);
		return end($extern);
	}
	
	function humanReadable($size) {
		static $UNIT = array ("Byte", "KB", "MB", "GB", "TB", "PB");
		$res = 0;
		while ($size > 1024) {
			$size /= 1024;
			$res++;
		}
		return round($size, 2) . $UNIT[$res];
	}
	
	function validMail($email) {
		static $MAIL_PATTERN = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";	
		return preg_match( $MAIL_PATTERN, $email);
	}
	
	function mySendEmail($email, $attachment) {
		$CMD = 'sendemail -s smtp.gmail.com:587 -f njucs315@gmail.com -t ' . "$email" . ' -u "EBOOK-ADD" -m "EBOOK-LIST" -xu njucs315@gmail.com -xp xxxxxxx -o tls=auto ';
		$state = exec("$CMD -a  \"$attachment\"" . " 1>/dev/null &");
		return $state;
	}
	
	function myLog($row) {
		$filename = 'search.log';
		$fh = fopen($filename, "a+");
		fwrite($fh, $row . "\n"); 
		fclose($fh);
	}
	
