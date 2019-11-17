<!DOCTYPE html>
<html>
<head>
	<title>City State AJAX</title>

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-lg-12"><br>
				<h3 class="text-success text-center">AJAX  Asychronous Javascript and XML</h3>

				<form>
					<div class="form-group">
						<label for="user"> Username: </label>
						<input type="text" name="" id="user" class="form-control">
					</div>
					<div class="form-group">
						<label for="pwd"> Password: </label>
						<input type="text" name="" id="pwd" class="form-control">
					</div>

					<div class="form-group">
						<label>Choose State:</label>
						<select class="form-control" onchange="myfun(this.value)">
							<option>Select State </option>
							<option>Maharashtra </option>
							<option>UP </option>
							<option>Bihar </option>
							
						</select>
					</div>

					<div class="form-group">

						<label>Choose City:</label>
						<select class="form-control" id="city">
							<option>Select City </option>
							
						</select>
						
					</div>
				</form>
			</div>
			
		</div>
	</div>

	<script type="text/javascript">
		
		function myfun(data){
			alert(data);
			var req = new XMLHttpRequest();
			req.open("GET","http://localhost/ajax/city/response.php?datavalue="+data,true);
			req.send();
			req.onreadystatechange = function(){
				if(req.readyState == 4 && req.status == 200){
					document.getElementById("city").innerHTML = req.responseText;
				}
			};
		}


   </script>

		

</body>
</html>