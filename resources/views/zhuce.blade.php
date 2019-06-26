<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>注册</title>
</head>
<body>
	<form action="{{url('admin/dozhuce')}}" method="post">
		<h2>注册页面</h2>
		<table>
		@csrf
			<tr>
				<td>注册姓名</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>注册密码</td>
				<td><input type="password" name="pwd"></td>
			</tr>
			<tr>
				<td cosplan="2"><input type="submit" value="注册"></td>
			</tr>
		</table>
	</form>
</body>
</html>