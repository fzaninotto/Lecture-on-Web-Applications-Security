<?php 
$db = new PDO('sqlite:' . __DIR__ . '/../resources/users.db');
$stmt = $db->prepare('SELECT * FROM user');
	if (!$stmt->execute()) {
		print_r($stmt->errorInfo());
		die('read failure!');
	}
$usernames = array();
while ($user = $stmt->fetchObject()) {
	$usernames[]= $user->name;
}
if (isset($_POST['name'])) {
	$usernames[]= $_POST['name'];
	$stmt = $db->prepare('INSERT INTO user (name) VALUES (:name)');
	$stmt->bindParam(':name', $_POST['name']);
	if (!$stmt->execute()) {
		print_r($stmt->errorInfo());
		die('write failure!');
	}
}
?>
<html>
<head>
	<title>Cross-Site Scripting (XSS)</title>
</head>
<body>
<p><a href="index.php">&lt;= back</a></p>

<h1>Cross-Site Scripting (XSS)</h1>
<p>Cross-site scripting (XSS) enables attackers to inject client-side script into web pages viewed by other users. A cross-site scripting vulnerability may be used by attackers to bypass access controls such as the same origin policy.</p>
<p>Cross-site scripting carried out on websites accounted for roughly 80% of all security vulnerabilities documented by Symantec as of 2007</p>

<h2>Example</h2>
<p>Click on one of the following links to display the content of the resource:</p>
<ul>
	<li><a href="directory_traversal.php?resource=users_list.txt">Users list</a>,</li>
	<li><a href="directory_traversal.php?resource=groups_list.txt">Groups list</a>,</li>
</ul>
<?php foreach ($usernames as $username): ?>
	<p><strong>Hello, <?php echo $username ?>!</strong></p>
<?php endforeach; ?>
<form method="post">
	<label for="name">You name here</label>
	<input type="text" name="name"/>
	<input type="submit"/>
</form>

<h2><a href="#" onclick="document.getElementById('mitigation').style.display='block';return fale;">Mitigation</a></h2>
<ul id="mitigation" style="display:none">
	<li>Output escaping</li>
	<li>Input filtering</li>
	<li>Cookie validity for a single IP</li>
	<li>disabling scripts</li>
	<li>Web Application Firewall (mod_security)</li>
</ul>

</body>
</html>



