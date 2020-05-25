<?php
$servername = "localhost";
$database = "contactform";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if (isset($_POST['submit']))
{
			$name =  mysqli_real_escape_string($conn, $_POST['name']);
			$email =  mysqli_real_escape_string($conn, $_POST['email']);
			$phone =  mysqli_real_escape_string($conn, $_POST['phone']);
			$address =  mysqli_real_escape_string($conn, $_POST['address']);
			$carMake =  mysqli_real_escape_string($conn, $_POST['carMake']);
			
			if (isset($_POST['car'])) {
				$car = "Has a valid car";
			} else {
				$car = "does not have a valid car";
			}

			if (isset($_POST['docs'])) {
				$docs = "Has complete documenation";
			} else {
				$docs = "does not complete documenation";
			}

			if (isset($_POST['insurance'])) {
				$insurance = "Has comprehensive insurance";
			} else {
				$insurance = "does not comprehensive insurance";
			}

			if (isset($_POST['tracker'])) {
				$tracker = "Has tracker";
			} else {
				$tracker = "does not have tracker";
			}
			
			
			
			$fileName = rand(1000, 10000)."-".$_FILES['vehicleFront']['name'];
			$targetFilePath = "../uploads/".$fileName;

			$fileName1 = rand(1000, 10000)."-".$_FILES['vehicleRear']['name'];
			$targetFilePath1 = "../uploads/".$fileName1;

			$fileName2 = rand(1000, 10000)."-".$_FILES['vehicleLeft']['name'];
			$targetFilePath2 = "../uploads/".$fileName2;

			$fileName3 = rand(1000, 10000)."-".$_FILES['vehicleRight']['name'];
			$targetFilePath3 = "../uploads/".$fileName3;

			
		//Insert Query of SQL
		$query = "insert into carmanagementform (name, email, phone, address, carMake, car, docs, insurance, tracker, vehicleFront, vehicleRear, vehicleLeft, vehicleRight) values ('$name', '$email', '$phone', '$address', '$carMake', '$car', '$docs', '$insurance', '$tracker', '$targetFilePath', '$targetFilePath1', '$targetFilePath2', '$targetFilePath3')";

			move_uploaded_file($_FILES["vehicleFront"]["tmp_name"], $targetFilePath);
			move_uploaded_file($_FILES["vehicleRear"]["tmp_name"], $targetFilePath1);
			move_uploaded_file($_FILES["vehicleLeft"]["tmp_name"], $targetFilePath2);
			move_uploaded_file($_FILES["vehicleRight"]["tmp_name"], $targetFilePath3);

		if(mysqli_query($conn, $query)){
			echo "<script>alert('Form submitted successfully!');document.location='../form.html'</script>";
		     $_POST = array();
		     $_FILES = array();
		} else{
		    echo "ERROR: was not able to execute $query. " . mysqli_error($conn);
		}
}
	

mysqli_close($conn);

?>