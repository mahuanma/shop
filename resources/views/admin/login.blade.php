<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carbon - Admin Template</title>
    <link rel="stylesheet" href="/admin/dist/vendor/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="/admin/dist/vendor/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/admin/dist/css/styles.css">
</head>
<body>
<form action="{{url('admin\do_login')}}" method="post">
<div class="page-wrapper flex-row align-items-center">
	@csrf
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card p-4">
                    <div class="card-header text-center text-uppercase h4 font-weight-light">
                        后台登录
                    </div>

                    <div class="card-body py-5">
                        <div class="form-group">
                            <label class="form-control-label">账号</label>
                            <input type="text" class="form-control" name="name">
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">密码</label>
                            <input type="password" class="form-control" name="pwd">
                        </div>

                        
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary px-5">登录</button>
                            </div>

                            <div class="col-6">
                                <a href="#" class="btn btn-link">忘记密码?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
<script src="/admin/dist/vendor/jquery/jquery.min.js"></script>
<script src="/admin/dist/vendor/popper.js/popper.min.js"></script>
<script src="/admin/dist/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="/admin/dist/vendor/chart.js/chart.min.js"></script>
<script src="/admin/dist/js/carbon.js"></script>
<script src="/admin/dist/js/demo.js"></script>
</body>
</html>








<!-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>微商城登录</title>
</head>
<body>
	<form action="{{url('admin\do_login')}}" method="post">
		<table>
		@csrf
		<a href="{{url('admin/zhuce')}}"><h2>注册页面</h2></a>
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
</html> -->