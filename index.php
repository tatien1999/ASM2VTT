<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<head>
	<title>Cloud Computing</title>

</head>
<link rel="stylesheet" href="style.css">
<style type="text/css">
	body {
		width: 50%;
		height: 50%;
		background: url(cloud.jpg) no-repeat;
		background-size: cover;
	}

	p {
		text-align: center;
	}
</style>

<body>

	<p style="color:azure;"><strong>Name:</strong> VO TA TIEN </p>
	<p style="color:azure;"><strong>Class:</strong> GCD0821</p>
	<p style="color:azure;"><strong>ID:</strong> GCD17117</p>
	<p style="color:azure;"><strong>Assessor name:</strong> HO VAN PHI </p>	
	<br>
	<br>
	<div class="row">
		<div class="col-12">

			<!-- <a href="ConnectToDB.php" class="myButton pl-3">View Data</a>

			<a href="InsertData.php" class="myButton pl-3">Insert data to the database</a>

			<a href="UpdateData.php" class="myButton pl-3">Update data to the database</a>

			<a href="DeleteData.php" class="myButton pl-3">Delete data to the database</a> -->
			<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>

			<div id="id01" class="modal">

				<form class="modal-content animate " method="post" name="myForm" action="\ConnectToDB.php">
					<div class="imgcontainer">
						<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
						<img src="tien.jpg" alt="Avatar" class="avatar">
					</div>

					<div class="container">
						<label><b>Username</b></label>
						<input type="text" id="username" value="admin">

						<label><b>Password</b></label>
						<input type="password" id="password1" value="admin">

						<button type="submit" onclick="login1()">Login</button>
					</div>

					<div class="container" style="background-color:#f1f1f1">
						<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script>
		var modal = document.getElementById('id01');
     	var username1 = document.getElementById("username").value;
		var password1 = document.getElementById("password1").value;
		function login1() {
		}
	</script>
</body>

</html>