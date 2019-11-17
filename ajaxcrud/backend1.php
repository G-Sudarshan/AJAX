<?php

$con = mysqli_connect('localhost','root',"",'youtubecrudoperation');

extract($_POST);

if(isset($_POST['readrecord'])){

	$data = '<table class="table table-bordered table-striped">
			   <tr>
			      <th>No.</th>
			      <th>First Name</th>
			      <th>Last Name</th>
			      <th>Email</th>
			      <th>Mobile</th>
			      <th>Edit</th>
			      <th>Delete</th>
			    </tr>';

	$displayquery = "SELECT * FROM crudtable ";
	$result = mysqli_query($con,$displayquery);

	if(mysqli_num_rows($result) > 0){
		$n=1;

		while($row = mysqli_fetch_array($result)){
			$data.='<tr>
			    <td>'.$n.'</td>
			    <td>'.$row['firstname'].'</td>
			    <td>'.$row['lastname'].'</td>
			    <td>'.$row['email'].'</td>
			    <td>'.$row['mobile'].'</td>
			    <td>
			    	<buttton onclick="GetUserDetails('.$row['id'].')" class="btn btn-warning">Edit</button>
			    </td>
			    <td>
			    	<buttton onclick="DeleteUser('.$row['id'].')" class="btn btn-danger">Delete</button>
			    </td>
			    </tr>';
			    $n++;
		}
	}

	$data.='</table>';

	echo $data;
}


if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['mobile'])){

	$query = "INSERT INTO `crudtable`(`firstname`, `lastname`, `email`, `mobile`) VALUES ('$firstname','$lastname','$email','$mobile')";

	mysqli_query($con,$query);
}

if(isset($_POST['deleteid'])){
	$userid = $_POST['deleteid'];
	$deletequery = "DELETE FROM crudtable WHERE id='$userid' ";
	mysqli_query($con,$deletequery);
}

// get user id for update

if(isset($_POST['id']) && isset($_POST['id']) != "")
{
	$user_id = $_POST['id'];
	$query = "SELECT  * FROM crudtable WHERE id = '$user_id' ";
	if(!$result = mysqli_query($con,$query)){
		exit(mysqli_error());
	}

	$response = array();

	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$response = $row;
		}
	}
	else
	{
		$response['status'] = 200;
		$response['message'] = "Data Not Found";
	}

	echo json_encode($response);;
}
else{
	
	$response['status'] = 200;
	$response['message'] = "Invalid Request!";
}

///// Update table

if(isset($_POST['hidden_user_idupd'])){
	$hidden_user_idupd = $_POST['hidden_user_idupd'];
	$firstnameupd = $_POST['firstnameupd'];
	$lastnameupd = $_POST['lastnameupd'];
	$emailupd = $_POST['emailupd'];
	$mobileupd = $_POST['mobileupd'];

	$query = "UPDATE crudtable SET `firstname`= '$firstnameupd',`lastname`='$lastnameupd',`email`='$emailupd',`mobile`='$mobileupd' WHERE id = '$hidden_user_idupd' ";

	mysqli_query($con,$query);
}

?>