<?php
	//Checking session variable
	if(isset($_SESSION['key']) && $_SESSION['key']==='User')
	{
		//DB Connect
	include 'db.php';
	//Storing form value to variable
	$id=$_POST['id'];
	//Sql query to delete the booking_details using id
	$sql="DELETE FROM booking_details WHERE id='$id'";
	if(mysqli_query($con,$sql))
	{
		?>
	    	<script>
	    		alert("Ticket Cancelled SuccessFully");
	    		location.replace("booking_history.php");
	    	</script>
	    	<?php
	}
	else
	{
		echo mysqli_error($con);
	}
	mysqli_close($con);
	}
	else
	{
	    header("location:index.php");
	}
?>