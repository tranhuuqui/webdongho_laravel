<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="{{asset('public/backend/js/bootstrap.js')}}"></script>
        <link href="{{asset('public/backend/css/login.css')}}" rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="{{asset('public/backend/plugins/fontawesome-free/css/all.min.css')}}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">    
    </head>
    <body>
    @if(session('notice'))
        <p style="color:red; font-weight: 600;">
            {{session('notice')}}
        </p>
    @endif
	<div class="wrapper">
		<form action="{{URL::to('/admin-login')}}" method="post" class="form-login">
            {{csrf_field()}}
			<h1 class="form-heading">Đăng nhập Admin</h1>
            <div class="form-group">
				<i class="fa fa-user"></i>
				<input type="text" class="form-input" name="admin_email" placeholder="Nhập email" required="">
			</div>
			<div class="form-group">
				<i class="fa fa-key"></i>
                <td><input type="password" class="form-input"  name="admin_password" placeholder="Nhập mật khẩu" required="" ></td>
			</div>
			<input type="submit" name="login" class="form-submit" value="Đăng nhập"> 
    	</form>
	</div>
    </body>
</html>