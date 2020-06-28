<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="{{asset('public/adminFE/css/login.css')}}">
</head>
<body>
    <form class="box" action="{{URL::to('/dashboard')}}" method="post">
    	<h1>Login</h1>
    	@csrf
        <input type="text" name="adtext" placeholder="Username" required >
        <input type="password" name="adpassword" placeholder="Password" required>
    	<input type="submit" name="" value="Login">
    </form>
</body>
</html>