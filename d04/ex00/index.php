<?php
session_start();
if ($_GET['login'] && $_GET['passwd'] 
	 && $_GET['submit'] && $_GET['submit'] === "OK") {
	$_SESSION['login'] = $_GET['login'];
	$_SESSION['passwd'] = $_GET['passwd'];

	//curl -v -c cook.txt 'http://localhost:8080/d04/ex00/index.php'
	//curl -v -b cook.txt 'http://localhost:8080/d04/ex00/index.php?login=sb&passwd=beeone&submit=OK'
}
?>

<html><body>
<form action="d04/ex00/index.php" method="GET">
	Username: <input type="text" name="login" value="<?php echo $_SESSION['login']; ?>"/>
	<br />
	Password: <input type="password" name="passwd" value="<?php echo $_SESSION['passwd']; ?>"/>
	<input type="submit" name="submit" value="OK" />
</form>
</body></html>