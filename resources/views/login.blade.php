<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录</title>
</head>
<body>
	<form action="{{url('login_do')}}" method="post">
		<table>
		@csrf
		<a href="{{url('zhuce')}}"><h2>注册页面1</h2></a>
			<tr>
				<td>用户名</td>
				<td><input type="text" name="name"></td>				
			</tr>
			<tr>
				<td>密码</td>
				<td><input type="password" name="pwd"></td>				
			</tr>
			<tr>
				<td cosplan="2"><input type="submit" value="登录"></td>
			</tr>
		</table>
	</form>
</body>
</html>
