<?php 
$expire = time() + 60 * 60 * 24 * 30;
setcookie("IP", $_SERVER['REMOTE_ADDR'], $expire);
?>
<html>
<head>
	<title>The Unfab Four</title>
	<!--Load the AJAX API-->
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script type="text/javascript">

		// Load the Visualization API and the piechart package.
		google.load('visualization', '1.0', {'packages':['corechart']});

		// Set a callback to run when the Google Visualization API is loaded.
		google.setOnLoadCallback(drawChart);

		// Callback that creates and populates a data table, 
		// instantiates the pie chart, passes in the data and
		// draws it.
		function drawChart() {

		// Create the data table.
		var data = new google.visualization.DataTable();
		data.addColumn('string', 'Attack type');
		data.addColumn('number', 'share');
		data.addRows([
		  ['Directory traversal', 37],
		  ['SQL Injection', 23],
		  ['Cross-Site Scripting', 26], 
		  ['Remote file Inclusion', 4],
		  ['Other', 10]
		]);

		// Set chart options
		var options = {'title':'The four main attack types',
		               'width':400,
		               'height':300,
		               'is3D': true
		};

		// Instantiate and draw our chart, passing in some options.
		var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
		chart.draw(data, options);
	}
	</script>
</head>
<body>
<h1>The Unfab Four</h1>
<p>This is a demo of the four dominant attack types targeting web applications:</p>
<ul>
<li><a href="directory_traversal.php">Directory Traversal (DT)</a>,</li>
<li><a href="cross_site_scripting.php">Cross-Site Scripting (XSS)</a>,</li>
<li><a href="sql_injection.php">SQL injection (SQLI)</a>,</li>
<li><a href="remote_file_inclusion.php">Remote File Inclusion (RFI)</a></li>
<li>Other common attack types include CSRF, Directory Indexing, Full Path disclosure, etc.</li>
</ul>
<div id="chart_div"></div>
<p><a href="conclusion.php">Conclusion</a>,</p>
</body>
</html>



