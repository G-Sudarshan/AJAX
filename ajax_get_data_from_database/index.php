<?php

$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'formdb'); 

?>

<!DOCTYPE html>
<html>
<head>
	<title>GET using database</title>
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>

<div class="container col-lg-6">
	<h2 class="text-center text-danger"> Get data from database </h2>
	<form>
		Username : <input type="" name="" class="form-control"><br>
		Password : <input type="" name="" class="form-control"><br>
		Degree : 
		<select  class="form-control" onchange="myfun(this.value)">
			<option>Select any one</option>
			<?php
			$q = "select * from degree";
			$result = mysqli_query($con,$q);
			while ($rows = mysqli_fetch_array($result)) {
				?>
				<option value="<?php
						echo $rows['mid'];
					?>">
					<?php
						echo $rows['degrees'];
					?>
				</option>
				<?php
			}
			?>
		</select>
		<br>
		Class : 
		<select class="form-control" id="dataget">
			<option>Choose any one</option>
			
		</select>

		<br><br>

		<button class="btn btn-primary">Submit</button>
	</form>
</div>

<script type="text/javascript">
	
	function myfun(datavalue) {
		$.ajax({

			url: 'class.php',
			type: 'POST',
			data: { datapost : datavalue },
			success: function(result){
				$('#dataget').html(result);
			}
		})
	}

</script>

</body>
</html>