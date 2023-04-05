<?php
	$name = $_POST['name'];
	$your-id = $_POST['your-id'];
	$food-name = $_POST['food-name'];
	$extra-food = $_POST['extra-food'];
	$how-many = $_POST['how-many'];
	$date-time = $_POST['date-time'];
	$address = $_POST['address'];
	$massage = $_POST['massage'];

	//database connection
	$conn = new mysqli('localhost','root','','cafe_de_nub');

	if($conn->connect_error)
	{
		die('connection failed : '.$conn->connect_error);
	}
	else
	{
		$stmt = $conn->prepare("insert into order_form(name, your-id, food-name, extra-food, how-many, date-time, address, massage) values(?, ?, ?, ?, ?, ?, ?, ?");
		$stmt->db2_bind_param("sississs",$name, $your-id, $food-name, $extra-food, $how-many, $date-time, $address, $massage);
		$stmt->execute();
		echo "order successfully...";
		$stmt->close();
		$conn->close();
	}
?>