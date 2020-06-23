<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/user.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
</head>
<body>
    <form action="{{URL::to('/login/check')}}" method="post" class="login-form">@csrf
    	<h1> Sign In</h1>
    	<div class="textb">
    		<input type="text" name="username" required>
    		<div class="placeholder">UserName</div>
    	</div>
    	<div class="textb">
    		<input type="password" name="password" required>
    		<div class="placeholder">Password</div>
    		<div class="show-password fas fa-eye-slash" style="margin-top:25px;"></div>
    	</div>
    	<div class="checkbox">
    		<input type="checkbox">
    		<div class="fas fa-check"></div>
    		Stay signed in
    	</div>
    	<button class="btn fas fa-arrow-right" disabled></button>
    	<a href="#">Can't Sign in</a>
    	<a href="{{URL::to('/signup')}}">Create Account</a>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(isset($loi))
             <div class="alert alert-danger">
                <ul>                    
                        <li>{{ $loi }}</li>
                </ul>
            </div>
        @endif
    </form>
    <script>
    	var fields=document.querySelectorAll(".textb input");
    	var btn=document.querySelector(".btn");
    	function check(){
    		if(fields[0].value!="" && fields[1].value!="")
    			btn.disabled=false;
    		else
    			btn.disabled=true;
        }
    	fields[0].addEventListener("keyup",check);
    	fields[1].addEventListener("keyup",check);

    	document.querySelector(".show-password").addEventListener("click",function()
    	{
    		if(this.classList[2]=="fa-eye-slash"){
    			this.classList.remove("fa-eye-slash");
    			this.classList.add("fa-eye");
    			fields[1].type="text";
    		}else{
                this.classList.remove("fa-eye");
                this.classList.add("fa-eye-slash");
                fields[1].type="password";
            }
    	})
    </script>
</body>
</html>