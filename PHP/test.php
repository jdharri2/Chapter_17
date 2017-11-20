<?php
include '../database.php';

$movie_name = $_GET['movie_name'];
$movie_image = $_GET['movie_image'];
$movie_genre = $_GET['movie_genre'];

$pdo = Database::connect();

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO movies_table
	(movie_name,movie_image, movie_genre)
	values(?,?,?)";
$q = $pdo->prepare($sql);
$q->execute(array($movie_name, $movie_image, $movie_genre));

Database::disconnect();
?>
