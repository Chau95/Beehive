<!--
Author: Chau (Joe) Duong
1/14/16
-->

<?php
	//Error reporting 
	ini_set('display_errors', 1);
	error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Beehive record</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.js"></script>
	
    <!-- Custom CSS for font-size -->
	<link href="../css/customCSS.css" rel="stylesheet">
	
	<!--jQuery import -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.js"></script>
    <![endif]-->
	
	<!--For the table-->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">
	<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
</head>

<script>
	$(document).ready(function(){
		$("#myTable").DataTable();
	});
	</script>

<body>

<div class="container">

<div class="page-header">
    <center><h1>Behive record</h1></center>
	<br> <br> <br>
</div>
</div>
<?php
	//Read from database
	require 'bee_db.php';
	
    $sql = "SELECT * FROM bee";
    $result = @mysqli_query($cnxn, $sql);
	$count = @mysqli_num_rows($result);
?>

<table id="myTable" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Hive Name</th>
                <th>Duration</th>
                <th>Obseravtion Day</th>
                <th>Mite count</th>        
            </tr>
        </thead>
		
		<tbody>
			<?php
			 if ($count >= 0) {
				foreach ($result as $row) {
					
                    $hive_name = $row['hive_name'];
                    $observation_date = $row['observation_date'];
                    $duration = $row['duration'];
                    $mite_count = $row['mite_count'];                      				
					echo "
						<td>$hive_name</td>
						<td>$observation_date</td>
						<td>$duration</td>
						<td>$mite_count</td> ";
					 echo "</tr>";
				}
			 }
			?>
		</tbody>
	</table>
</body>