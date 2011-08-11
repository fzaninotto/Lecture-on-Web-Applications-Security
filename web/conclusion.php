<?php 
$expire = time() + 60 * 60 * 24 * 30;
setcookie("IP", $_SERVER['REMOTE_ADDR'], $expire);
?>
<html>
<head>
	<title>The Unfab Four</title>
	<link href="style.css" rel="stylesheet">
</head>
<body>
<p><a href="index.php">&lt;= back</a></p>
<h1>Conclusion</h1>
<p>Web application security is a serious matter, and developers must know all about it.</p>
<ul>
	<li>A firewall is not enough to keep you safe.</li>
	<li>mod_security is necessary, but not sufficient.</li>
	<li>Attackers know vulnerabilities, so developers must know them, too.</li>
	<li>Hacking is a lucrative business. Attackers will keep coming.</li>
	<li>Attackers use robots to find exploits. If a vulnerability exists, it will be found.</li>
	<li>Intrusions leave no trace: Assume you've already been hacked.</li>
	<li>Monitor web application attacks.</li>
	<li>Keep your software up-to-date.</li>
	<li>Watch for new attack vectors.</li>
</ul>
</body>
</html>



