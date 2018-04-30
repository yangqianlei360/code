@extends('admin.layouts.app')
@section('content')
    <div class="layui-tab page-content-wrap">
        <ul class="layui-tab-title">
            <li class="layui-this">修改资料</li>
            <li>修改密码</li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                {!! Form::open(['route' => 'admin.saveinfo', 'method' => 'post','class'=>'layui-form','style'=>'width: 90%;padding-top: 20px']) !!}
                <div class="layui-form-item">
                    <label class="layui-form-label">ID：</label>
                    <div class="layui-input-block">
                        <input type="text" name="id" autocomplete="off" class="layui-input layui-disabled"
                               value="{{Auth::guard('admin')->id()}}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">用户名：</label>
                    <div class="layui-input-block">
                        <input type="text" name="name" autocomplete="off" class="layui-input layui-disabled"
                               value="{{Auth::guard('admin')->user()->name}}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">姓名：</label>
                    <div class="layui-input-block">
                        <input type="text" name="realname"  placeholder="请输入真实姓名"
                               autocomplete="off" class="layui-input"
                               value="{{Auth::guard('admin')->user()->realname}}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">邮箱：</label>
                    <div class="layui-input-block">
                        <input type="text" name="email" placeholder="请输入邮箱" autocomplete="off" class="layui-input"
                               value="{{Auth::guard('admin')->user()->email}}">
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">备注：</label>
                    <div class="layui-input-block">
                        <textarea name="remark" placeholder="请输入内容"
                                  class="layui-textarea">{{Auth::guard('admin')->user()->remark}}</textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button type="submit" class="layui-btn layui-btn-normal" lay-submit lay-filter="adminInfo">
                            立即提交
                        </button>
                    </div>
                </div>
                {!! Form::close() !!}

            </div>
            <div class="layui-tab-item">
                {!! Form::open(['route' => 'admin.changepassword', 'method' => 'post','class'=>'layui-form','style'=>'width: 90%;padding-top: 20px;']) !!}

                <div class="layui-form-item">
                    <label class="layui-form-label">ID：</label>
                    <div class="layui-input-block">
                        <input type="text" name="name" autocomplete="off"
                               class="layui-input layui-disabled" value="{{Auth::guard('admin')->id()}}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">用户名：</label>
                    <div class="layui-input-block">
                        <input type="text" name="name" autocomplete="off"
                               class="layui-input layui-disabled" value="{{Auth::guard('admin')->user()->admin}}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">旧密码：</label>
                    <div class="layui-input-block">
                        <input type="password" name="password" required lay-verify="required" placeholder="请输入密码"
                               autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">新密码：</label>
                    <div class="layui-input-block">
                        <input type="password" id="newpass" name="newpass" required lay-verify="newpass"
                               placeholder="请输入密码" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">重复密码：</label>
                    <div class="layui-input-block">
                        <input type="password" id="repeatpass" name="repeatpass" required lay-verify="repeatpass"
                               placeholder="请输入密码"
                               autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button type="submit" class="layui-btn layui-btn-normal" lay-submit
                                lay-filter="adminPassword">立即提交
                        </button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        layui.use(['form', 'layedit', 'laydate'], function () {
            var form = layui.form(),
                layer = layui.layer;
            //自定义验证规则
            form.verify({
                newpass: [/(.+){6,12}$/, '新密码必须6到12位'],
                repeatpass: function (value) {
                    if (value.length < 6) {
                        return '二次密码不能为空';
                    }
                    var pwd = $('input[name=newpass]').val();
                    if (value != pwd) {
                        return '两次密码必须保持一致';
                    }
                }
            });
        });
    </script>
@stop