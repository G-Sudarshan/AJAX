<!DOCTYPE html>
<html>
<head>
	<title>Insert</title>
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<body>
	<div class="container">
		<h1 class="text-center">Insert data using AJAX PHP and MySQLi</h1>
		<br>
		<div class="col-lg-8 m-auto">
		<form id="myform" action="insertphp.php" method="POST">
			<div class="form-group">
				<label>Username:</label>
				<input type="text" name="username" class="form-control">
			</div>

			<div class="form-group">
				<label>Password:</label>
				<input type="text" name="password" class="form-control">
			</div>

			<input type="submit" name="submit" value="submit" class="btn btn-success" id="submit">
			
		</form>
	    </div>
	    
	    <div>
	    <br><br>
		<h1 class="text-center bg-dark text-white">Display data using AJAX</h1>
	    <br>
	    <button id="dispalydata" class="btn btn-danger"> Display </button>

	    <table class="table table-striped table-bordered text-center">
	    	<thead>
	    	<th>id</th>
	    	<th>Name</th>
	    	<th>Password</th>
	        </thead>

	        <tbody id="response">
	        	
	        </tbody>
	    </table>

		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){
			var form = $('#myform');
			$('#submit').click(function(){
				$.ajax({

					url: form.attr("action"),
					type: 'POST',
					data: $("#myform input").serialize(),

					success:function(data){
						console.log(data);
					}

				});
			});

	
			displaydata();
			function displaydata(){
		// $('#dispalydata').click(function(){

			$.ajax({

				url: 'displayajax.php',
				type: 'POST',

				success:function(responsedata){
					$('#response').html(responsedata);
				}

			});
		//});

	}
	});
	</script>

</body>
</html>