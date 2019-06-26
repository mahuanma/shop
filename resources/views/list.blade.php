<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>列表展示</title>
	<link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
	<form action="" method="">
		<input type="text" name="file" value="{{$file}}">
		<input type="submit" value="搜索">
	</form>
	<table border="2">
	<a href="{{url('deletelogin')}}"><h1>退出登录</h1></a>
		<tr>
			<td>ID</td>
			<td>姓名</td>
			<td>年龄</td>
			<td>时间</td>
			<td>ip</td>
			<td>操作</td>
		</tr>
		@foreach($data as $k=>$v)
		<tr>
			<td>{{$v->id}}</td>
			<td>{{$v->name}}</td>
			<td>{{$v->age}}</td>
			<td>{{date('Y-m-d H:i:s',$v->create_time)}}</td>
			<td>
			@if($v->Ip==1)
				男
			@else
				女
			@endif
			</td>
			<td><a href="{{url('del')}}?id={{$v->id}}">删除</a>
				<a href="{{url('upda')}}?id={{$v->id}}">修改</a></td>
		</tr>
		@endforeach
		<tr>
			<td colspan="6">{{ $data->appends(['file' => $file])->links() }}</td>

		</tr>
	</table>
</body>
</html>