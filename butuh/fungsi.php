<?php
//efektif
function cek($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = strip_tags($data);
	$data = mysql_real_escape_string($data);
	//$data = htmlentities($data);
	//$data = htmlspecialchars($data);
	return $data;
}
//kurang efektif
function cek2($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

?>