<?php

//set error reporting on
ini_set('display_errors', 'On');
error_reporting(E_ALL);

$dsn = 'mysql:dbname=mer4;host=sql2.njit.edu';
$user = 'mer4';
$password = '2kXQOxHZC';

try {
	$dbh = new PDO($dsn, $user, $password);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo 'Connected successfully <br>';
} catch (PDOException $e) {
	echo 'Connection failed: ' . $e->getMessage() . '<br>';
}

try {
	$stmt = $dbh->prepare("SELECT * FROM accounts");
	$stmt->execute();
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	$result = $stmt->fetchAll();
	//print_r($result);

	echo '<table>';
	foreach ($result as $result) {
		echo "<tr><td>" . $result['id'] . "</td><td>" . $result['email'] . "</td></tr>";
	}
	echo '</table>';

} catch (PDOException $e) {
	echo $sql . "<br>" . $e->getMessage();
}

?>
