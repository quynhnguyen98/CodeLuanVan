<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Register</title>
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/user.css')}}">
</head>
<body>
    <div class="hero">
    	<div class="form-box">
    		<div class="button-box">
    			<div id="btn"></div>
    			<button type="button" class="toggle-btn" onclick="login()">Đăng Nhập</button>
    			<button type="button" class="toggle-btn" onclick="register()">Đăng Ký</button>
    		</div>
    		<div class="social-icons">
    			<img src="{{URL::to('public/frontend/images/core-img/fb.png')}}">
    			<img src="{{URL::to('public/frontend/images/core-img/gp.png')}}">
    		</div>
    		<form id="login" class="input-group">
    			<input type="text" class="input-field" placeholder="Tên Tài Khoản" required>
    			<input type="password" class="input-field" placeholder="Mật khẩu" required>
    			<input type="checkbox" class="check-box"><span>Nhớ Mật Khẩu</span>
    			<button type="submit" class="submit-btn">Đăng Nhập</button>
    		</form>
    		<form id="register" class="input-group">
    			<input type="text" class="input-field" placeholder="Tên Tài Khoản" required>
    			<input type="email" class="input-field" placeholder="Email" required>
    			<input type="password" class="input-field" placeholder="Mật khẩu" required>
    			<input type="checkbox" class="check-box"><span>Tôi đồng ý với điều khoản</span>
    			<button type="submit" class="submit-btn">Đăng Ký</button>
    		</form>
    	</div>
    </div>
    <script type="text/javascript">
    	var x=document.getElementById("login");
    	var y=document.getElementById("register");
    	var z=document.getElementById("btn");

    	function register()
    	{
    		x.style.left="-400px";
    		y.style.left="50px";
    		z.style.left="110px";
    	}

    	function login()
    	{
    		x.style.left="50px";
    		y.style.left="450px";
    		z.style.left="0";
    	}
    </script>
</body>
</html>