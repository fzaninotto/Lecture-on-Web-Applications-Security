<html>
<head>
	<title>Remote File Inclusion (RFI)</title>
	<link href="style.css" rel="stylesheet">
</head>
<body>
<p><a href="index.php">&lt;= back</a></p>

<h1>Remote File Inclusion (RFI)</h1>
<p>Remote File Inclusion allows an attacker to include a remote file, usually through a script on the web server. The vulnerability occurs due to the use of user-supplied input without proper validation<sup><a href="#ref1">[1]</a></sup>. This can lead to something as minimal as outputting the contents of the file, but depending on the severity, to list a few it can lead to:</p>
<ul>
<li>Code execution on the web server;</li>
<li>Code execution on the client-side such as JavaScript which can lead to other attacks such as cross site scripting (XSS)</li>
<li>Denial of Service (DoS)</li>
<li>Data Theft/Manipulation</li>
</ul>

<h2>Example</h2>
<?php
if (isset($_FILES["file"])) {
	$filename = $_FILES["file"]["name"];
	if (file_exists("upload/" . $filename)) {
		echo "<p>File " . $filename . " already exists.</p>";
	} else {
		move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $filename);
		echo "<p>Picture successfully uploaded:</p>";
		echo "<img src='upload/" . $filename . "'/>";
	}
}
?>
<form method="post" enctype="multipart/form-data">
	<label for="file">Upload your picture:</label>
	<input type="file" name="file" id="file" /> 
	<input type="submit" name="submit" value="Submit" />
</form>
</body>

<h2><a href="#" onclick="document.getElementById('mitigation').style.display='block';return false;">Mitigation</a></h2>
<ul id="mitigation" style="display:none">
	<li>allow_url_include and allow_url_fopen must be turned off</li>
	<li>Input validation</li>
	<li>Whitelisting file types</li>
	<li>Renaming file uploads</li>
	<li>Web Application Firewall (mod_security)</li>
</ul>

<p name="ref1">[1] Source: <a href="http://en.wikipedia.org/wiki/Remote_file_inclusion">Remote file inclusion on Wikipedia</a></p>

</html>





