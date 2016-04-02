<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cms管理系统 - 登录</title>
    <meta name="keywords" content="CMS">
    <meta name="description" content="CMS系统">
    <link rel="shortcut icon" href="favicon.ico"> <link href="/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="/css/style.min862f.css?v=4.1.0" rel="stylesheet">
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script>if(window.top !== window.self){ window.top.location = window.location;}</script>
</head>
<body class="gray-bg">
<div class="middle-box text-center loginscreen  animated fadeInDown">
    <div>
        <div>
            <h4 class="logo-name">cms</h4>
        </div>
        <h3>欢迎使用cms管理系统</h3>
        <form class="m-t" role="form" action="">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="用户名" id="username" required="" oninvalid="this.setCustomValidity('用户名不能为空');" oninput="setCustomValidity('')">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="密码" required="" oninvalid="this.setCustomValidity('密码不能为空');" oninput="setCustomValidity('')">
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">登 录</button>
            </p>
        </form>
    </div>
</div>
<script src="/js/jquery.min.js?v=2.1.4"></script>
<script>
    $(function () {
        $('#username').focus();
    })
</script>
</body>
</html>
