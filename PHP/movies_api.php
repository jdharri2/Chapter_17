<?php
	// refer to: 
	// http://androidbash.com/connecting-android-app-to-a-database-using-php-and-mysql/
	
	// database: gpcorser
	// table: movies_table
	// fields: id, username, password, role
	
	// error_reporting(E_ERROR | E_WARNING);
	// ini_set('display_errors', 1); 
	
	include '../database.php';
	
	$pdo = Database::connect();
	
	// vulnerable to SQL injection 
	if($_GET['id']) $sql = 'SELECT * from movies_table WHERE id=' . $_GET['id'];
	else $sql = 'SELECT * from movies_table';
	
	$arr = array();
	$i = 0;
	foreach ($pdo->query($sql) as $row) {
		$arr[$i] = array('id'=>$row[0], 
			'movie_name'=>$row[1],
			'movie_image'=>$row[2],
			'movie_genre'=>$row[3]
			);
		$i++;
	}
	echo json_encode($arr);
	
	Database::disconnect();
   
   
?>