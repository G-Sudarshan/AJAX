<?php

$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'ajaxcrud');

$q = "SELECT * FROM ajaxinsert ";

$query = mysqli_query($con,$q);

if(mysqli_num_rows($query) > 0){
	while ($result = mysqli_fetch_array($query)) {
		?>

		<tr>
			<td><?= $result['id']; ?></td>
			<td><?= $result['username']; ?></td>
			<td><?= $result['password']; ?></td>
		</tr>

		<?php

	}
}

?>