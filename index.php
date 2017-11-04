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
	$stmt = $dbh->prepare("SELECT * FROM accounts WHERE id < 6");
	$stmt->execute();
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	$result = $stmt->fetchAll();
	//print_r($result);
	
	$records = count($result);
	echo 'Records: ' . $records . '<br>';

	echo '<table>';
	foreach ($result as $result) {
		echo "<tr><td>id: " . $result['id'] . "</td><td>email: " . $result['email'] .
		"</td><td>fname: " . $result['fname'] . "</td><td>lname: " . $result['lname'] .
		"</td><td>phone: " . $result['phone'] . "</td><td>birthday: " . $result['birthday'] .
		"</td><td>gender: " . $result['gender'] . "</td><td>password: " . $result['password'] . "</td></tr>";
	}
	echo '</table>';

} catch (PDOException $e) {
	echo 'Error: <br>' . $e->getMessage();
}

?>
