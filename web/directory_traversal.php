<html>
<head>
	<title>Directory Traversal</title>
	<link href="style.css" rel="stylesheet">
</head>
<body>
<p><a href="index.php">&lt;= back</a></p>
<h1>Directory Traversal</h1>
<p>A directory traversal (or path traversal) consists in exploiting insufficient security validation / sanitization of user-supplied input file names, so that characters representing "traverse to parent directory" are passed through to the file APIs<sup><a href="#ref1">[1]</a></sup>.</p>
<p>The goal of this attack is to order an application to access a computer file that is not intended to be accessible. This attack exploits a lack of security (the software is acting exactly as it is supposed to) as opposed to exploiting a bug in the code.</p>

<h2>Example</h2>
<p>Click on one of the following links to display the content of the resource:</p>
<ul>
<li><a href="directory_traversal.php?resource=users_list.txt">Users list</a>,</li>
<li><a href="directory_traversal.php?resource=groups_list.txt">Groups list</a>,</li>
</ul>
<?php if (isset($_GET['resource'])): ?>
<?php // TODO: check the resource != secret.txt to avoid leaks // ?>
<code><pre>
<?php $path = __DIR__ . "/../resources/" . $_GET['resource']; ?>
<?php echo htmlspecialchars(file_get_contents($path)) ?>
</pre></code>
<?php endif; ?>

<h2><a href="#" onclick="document.getElementById('mitigation').style.display='block';return false;">Mitigation</a></h2>
<ul id="mitigation" style="display:none">
	<li>Input validation (detect "../" and variants)</li>
	<li>Filename conversion (basename)</li>
	<li>Whitelisting</li>
	<li>No sensitive information in code</li>
	<li>DocumentRoot</li>
	<li>Chroot jails</li>
	<li>Web Application Firewall (mod_security)</li>
</ul>

<p name="ref1">[1] Source: <a href="http://en.wikipedia.org/wiki/Directory_traversal">Directory Traversal on Wikipedia</a></p>

</body>
</html>



