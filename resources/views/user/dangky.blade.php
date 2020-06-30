<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/dangky.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
</head>
<body style="background: url({{asset('/public/frontend/images/bg-img/1.jpg')}}) no-repeat center;">
    <form action="{{URL::to('/signup/check')}}" method="post" class="login-form">@csrf
    	<h1> Sign Up</h1>
        	<div class="textb">
        		<input type="text" name="username" required>
        		<div class="placeholder">tên tài khoản</div>
        	</div>
        	<div class="textb">
        		<input type="password" name="password" required>
        		<div class="placeholder">mật khẩu</div>
        		<div class="show-password fas fa-eye-slash" style="margin-top: 25px;"></div>
        	</div>
            <div class="textb">
                <input type="password" name="password_confirmation" required>
                <div class="placeholder">xác nhận mật khẩu</div>
                <div class="show-password1 fas fa-eye-slash" style="margin-top: 25px;"></div>
            </div>
            <div class="textb">
                <input type="email" name="email" required>
                <div class="placeholder1">Email</div>
            </div>
             <div class="textb">
                <input type="text" name="hoten" required>
                <div class="placeholder">Họ Tên</div>
            </div>
            <div class="textb">
                    <input type="date" name="ngaysinh" required>
                    <div class="placeholder1">Ngày Sinh</div>
            </div>
            <label class="container">Nam 
                  <input type="radio" name="gioitinh" value="Nam" checked>
                  <span class="checkmark"></span>
            </label>
            <label class="container">Nữ
                  <input type="radio" name="gioitinh" value="Nữ">
                  <span class="checkmark"></span>
            </label>
             <div class="textb">
                    <input type="text" name="tinhtranghonnhan" required>
                    <div class="placeholder">Tình trạng hôn nhân</div>
            </div>
            
        	<div class="checkbox">
        		<input type="checkbox" name="checkbox" required>
        		<div class="fas fa-check"></div>
        		I agreed the Terms&Condition
        	</div>

    	<button class="btn fas fa-arrow-right" disabled></button>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(isset($mess))
             <div class="alert alert-danger">
                <ul>                    
                        <li>{{ $mess }}</li>
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
        document.querySelector(".show-password1").addEventListener("click",function()
        {
            if(this.classList[2]=="fa-eye-slash"){
                this.classList.remove("fa-eye-slash");
                this.classList.add("fa-eye");
                fields[2].type="text";
            }else{
                this.classList.remove("fa-eye");
                this.classList.add("fa-eye-slash");
                fields[2].type="password";
            }
        })
    
    </script>
</body>
</html>