<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>{{Config::get('config.webname')}}网站后台管理系统</title>
    <link rel="stylesheet" type="text/css" href="{{asset('static/admin/layui/css/layui.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('static/admin/css/admin.css')}}"/>
</head>
<body>
@yield('content')

<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="{{asset('static/admin/layui/layui.js')}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset('static/admin/js/common.js')}}" type="text/javascript" charset="utf-8"></script>
@yield('js')
</body>
</html>
