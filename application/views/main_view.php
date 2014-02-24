<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>main_view</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

</head>
<body>
	<form action="index.php/Login/validate_login" method="post">
		<input type="hidden" name="login">
		Username:<input type="text" name="username"><br>
		Password:<input type="password" name="password"><br>
		<input type="submit" value="submit">
	</form>
	<hr>
	<div style="width: 300px; height: 500px;">
		<form action="index.php/Login/create_member" method="post">
			<input type="hidden" name="register">
			Firstname:<input type="text" name="firstname"><br>
			Lastname:<input type="text" name="lastname"><br>
			Email:<input type="text" name="email"><br>
			Username:<input type="text" name="username"><br>
			Password:<input type="password" name="password"><br>		
			Confirm Password:<input type="password" name="confpassword"><br>
			<input type="submit" name="register">
		</form>
	</div>
</body>
</html>