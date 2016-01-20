<!--
Author: Chau (Joe) Duong
1/14/16
-->

<?php
	//Error reporting 
	ini_set('display_errors', 1);
	error_reporting(0);
?>

<?php
	if(isset($_POST['submit'])) {
		//Get the data
		$hive_name = $_POST['hive_name'];
		$observation_date = $_POST['observation_date'];
		$duration = $_POST['duration'];
		$mite_count = $_POST['mite_count'];
	
		//Empty field check
		$isValid = true;
		$errors = "Please fill in the following field(s): ";
		
		 if(empty($_POST['hive_name'])) {
			$errors = $errors . " - Hive Name"; 
			$isValid = false;
        }
		
		 if(empty($_POST['observation_date'])) {
			$errors = $errors . " - Observation Date"; 
			$isValid = false;
        }
		
		if(empty($_POST['duration'])) {
			$errors = $errors . " - Duration"; 
			$isValid = false;
        }
		
		if(empty($_POST['mite_count'])) {
			$errors = $errors . " - Mite Count"; 
			$isValid = false;
        }
		
		if ($isValid) {
			//Connect to the database
			require 'bee_db.php';
			
			//Insert stuffs into the table
			$sql = "INSERT INTO bee (hive_name, observation_date, duration, mite_count)
			VALUES ('$hive_name', '$observation_date', '$duration', '$mite_count')";
			$result = @mysqli_query($cnxn, $sql);
			
			//header('Location: http://joe.greenrivertech.net/328/beehive/record.php');
	
		} else {	
			//Refresh the page
			//header("Refresh:0");
				
			echo $errors;	
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Beehive</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.js"></script>
	
	<!-- Dividing the papge into two collumns -->
	<style type="text/css">
		#wrap {
		   width:1150px;
		   margin:10 auto;
		}
		#left_col {
		   float:left;
		   width:555px;
		}
		#right_col {
		   float:right;
		   width:555px;
		}
	</style>
	
	<script>
	//Cilentside validations
	function popUp() {
		var hive_name = document.getElementById("hive_name");
		var observation_date = document.getElementById("observation_date");
		var duration = document.getElementById("duration");
		var mite_count = document.getElementById("mite_count");

		if (hive_name.value == "" || observation_date.value == "" || duration.value == "" || mite_count.value == "") {
			window.alert("Please fill out all the required fields!");
		} else
			window.alert("You have sucessfully submitted your data!");
			window.location.href = "http://joe.greenrivertech.net/328/beehive/record.php";
	}
	</script>
</head>

<body>

<div class="container">

<div class="page-header">
    <center><h1>Beehive Information Intake Form</h1></center>
	<br> <br> <br>
</div>

<!-- Registration form - START -->
<div class="container">
    <div class="row">
		
        <form role="form" action = "index.php" method ="post">
            <div class="col-lg-6">
                
		<div id="wrap">
			<div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span> Required Fields</strong></div>
			<div id="left_col">
                <div class="form-group">
                    <label for="hive_name">Hive Name:</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="hive_name" id="hive_name" placeholder="Enter Hive Name" value = "<?php echo $hive_name; ?>" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="observation_date">Observation Date:</label>
                    <div class="input-group">
                        <input type="date" class="form-control" id="observation_date" name="observation_date" placeholder="Enter Observation Date" value = "<?php echo $observation_date; ?>" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
				<center><input onclick="popUp()" type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right"></center> <br> <br>
            </div>  <!-- left Collumn -->
			
			<div id="right_col">
				<div class="form-group">
                    <label for="duration">Duration (in days):</label>
                    <div class="input-group">
                        <input type="number" min="1" max = "365" class="form-control" id="duration" name="duration" placeholder="Enter Duration" value = "<?php echo $duration; ?>" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
				
                <div class="form-group">
                    <label for="mite_count">Mite Count:</label>
                    <div class="input-group">
                        <input type="number" min="0" class="form-control" id="mite_count" name="mite_count" placeholder="Enter the Mite Count" value = "<?php echo $mite_count; ?>" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
			</div>  <!-- Right Collumn -->
			
			<button type="button" name="record" id="record" class="btn btn-info pull-right" onclick="window.location = 'http://joe.greenrivertech.net/328/beehive/record.php';"> Check your record </button> <br> <br>
     </div>
		</div>
        </form>
    </div>
</div> 
<!-- Registration form - END -->

</div> 
</body>
</html>