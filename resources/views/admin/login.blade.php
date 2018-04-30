<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>后台登录</title>
    <link rel="stylesheet" type="text/css" href="{{asset('static/admin/layui/css/layui.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('static/admin/css/login.css')}}" />
</head>
<body>
<div class="m-login-bg">
    <div class="m-login">
        <h3>{{Config::get('config.webname')}}后台系统登录</h3>
        <div class="m-login-warp">
            {!! Form::open(['method' => 'post','class'=>'layui-form']) !!}
            <form class="layui-form">
                <div class="layui-form-item">
                    <input type="text" name="admin" required lay-verify="required" placeholder="用户名" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-item">
                    <input type="password" name="password" required lay-verify="required" placeholder="密码" autocomplete="off" class="layui-input">
                </div>

                <div class="layui-form-item m-login-btn">
                    <div class="layui-inline">
                        <button class="layui-btn layui-btn-normal" lay-submit lay-filter="login" type="submit">登录</button>
                    </div>
                    <div class="layui-inline">
                        <button type="reset" class="layui-btn layui-btn-primary">取消</button>
                    </div>
                </div>
            {!! Form::close() !!}

        </div>
        <p class="copyright">Copyright 2015-2016 by XIAODU</p>
    </div>
</div>
<script src="{{asset('static/admin/layui/layui.js')}}" type="text/javascript" charset="utf-8"></script>

</body>

</html>