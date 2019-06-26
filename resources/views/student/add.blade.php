<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学生添加</title>
</head>
<body>
	<form action="{{url('/student/doadd')}}" method="post">
	@csrf
		<table>
			<tr>
				<td>姓名</td>
				<td><input type="text" name="name" ></td>
			</tr>
			<tr>
				<td>编号</td>
				<td><input type="text" name="bian" ></td>
			</tr>
			<tr>
				<td cosplay="2"><input type="submit" value="添加"></td>
				
			</tr>
		</table>
	</form>
</body>
</html>