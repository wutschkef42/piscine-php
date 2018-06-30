<?php 
define('ADMIN_LOGIN','zaz'); 
define('ADMIN_PASSWORD','jaimelespetitsponeys');

if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) 
	|| ($_SERVER['PHP_AUTH_USER'] != ADMIN_LOGIN) 
    || ($_SERVER['PHP_AUTH_PW'] != ADMIN_PASSWORD)) { 
	header('HTTP/1.1 401 Unauthorized'); 
    header('WWW-Authenticate: Basic realm="Password For Members"'); 
	echo "<html><body>That area is accessible for members only</body></html>";
	return ;
}
$img_src = "../img/42.png";
$img_bin = fread(fopen($img_src, "r"), filesize($img_src));
$img_str = base64_encode($img_bin);
echo '<html><body>'."\n"."Hello Zaz<br />"."\n"."<img src='data:image/png;base64,".$img_str."'>"."\n".'</body></html>';
