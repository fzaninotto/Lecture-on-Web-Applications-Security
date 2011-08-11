<?php 
$db = new PDO('sqlite:' . __DIR__ . '/../resources/users.db');
$usernames = array();
if (isset($_GET['name'])) {
	$stmt = $db->prepare("SELECT * FROM user where name = '" . $_GET['name'] . "'");
	if (!$stmt->execute()) {
		print_r($stmt->errorInfo());
		die('read failure!');
	}
	while ($user = $stmt->fetchObject()) {
		$usernames[]= $user->name;
	}
}
?>
<html>
<head>
	<title>SQL Injection (SQLI)</title>
	<link href="style.css" rel="stylesheet">
</head>
<body>
<p><a href="index.php">&lt;= back</a></p>

<h1>SQL Injection (SQLI)</h1>
<p>SQL injection is a code injection technique that exploits a security vulnerability occurring in the database layer of an application (like queries)<sup><a href="#ref1">[1]</a></sup>. The vulnerability is present when user input is either incorrectly filtered for string literal escape characters embedded in SQL statements or user input is not strongly typed and thereby unexpectedly executed.</p>
<p>It happens from using poorly designed query language interpreters.</p>

<h2>Example</h2>
<?php if ($usernames): ?>
	<?php foreach ($usernames as $username): ?>
	<p><strong>Hello, <?php echo $username ?>!</p></strong>
	<?php endforeach; ?>
<?php elseif (isset($_GET['name'])): ?>
	<p>No user named "<?php echo $_GET['name'] ?>" found in the DB.</p>
<?php endif ?>
<form method="get">
<label for="name">Type a name to check if it exists</label>
<input type="text" name="name"/>
<input type="submit"/>
</form>

<h2><a href="#" onclick="document.getElementById('mitigation').style.display='block';return false;">Mitigation</a></h2>
<ul id="mitigation" style="display:none">
	<li>Parameter binding (with type)</li>
	<li>Use an ORM</li>
	<li>Input validation</li>
	<li>Principle of least privilege</li>
	<li>Keep database structure and identifiers secret</li>
	<li>Web Application Firewall (mod_security)</li>
</ul>

<p name="ref1">[1] Source: <a href="http://en.wikipedia.org/wiki/SQL_injection">SQL Injection on Wikipedia</a></p>

</body>
</html>



