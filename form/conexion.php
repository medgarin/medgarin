<?php
	$link = mysql_connect('contactodb.cfmlmwuxja6y.us-west-2.rds.amazonaws.com', 'mtdgo', 'maldonado');
	if (!$link) {
	   die('Error conexion : ' . mysql_error());
	}

	// make foo the current db
	$db_selected = mysql_select_db('afileate', $link);
	if (!$db_selected) {
	   die ('Can\'t use foo : ' . mysql_error());
	}

?>