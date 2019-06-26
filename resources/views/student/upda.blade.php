<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学生修改</title>
</head>
<body>
	<form action="{{url('/student/doupda')}}" method="post">
	@csrf
		<table>
			<tr>
				<td>姓名</td>
				<td><input type="text" name="name" value="{{$data->name}}"></td>
			</tr>
			<tr>
				<td>编号</td>
				<td><input type="text" name="bian" value="{{$data->bian}}"></td>
			</tr>
			<tr><td><input type="hidden" name="id"  value="{{$data->id}}"></td></tr>	
			<tr>
				<td cosplay="2"><input type="submit" value="修改"></td>
				
			</tr>
		</table>
	</form>
</body>
</html>