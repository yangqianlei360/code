@extends('admin.layouts.app')
@section('content')
    <div class="layui-tab page-content-wrap">
        <ul class="layui-tab-title">
            <li class="layui-this">站点配置</li>
            <li>SEO配置</li>
            <li>邮箱配置</li>
        </ul>
        <div class="layui-tab-content">
            <!--站点配置-->
            <div class="layui-tab-item layui-show">
                {!! Form::open(['route' => 'admin.system.save', 'method' => 'post','class'=>'layui-form','style'=>'width: 90%;padding-top: 20px;']) !!}
                <div class="layui-form-item">
                    <label class="layui-form-label">网站名称：</label>
                    <div class="layui-input-block">
                        <input type="text" name="webname" required lay-verify="required" autocomplete="off"
                               class="layui-input" value="{{Config::get('config.webname')}}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">网站域名：</label>
                    <div class="layui-input-block">
                        <input type="text" name="domain" autocomplete="off" class="layui-input" value="{{Config::get('config.domain')}}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">站长邮箱：</label>
                    <div class="layui-input-block">
                        <input type="text" name="email" required lay-verify="required" placeholder="请输入联系邮箱"
                               autocomplete="off" class="layui-input" value="{{Config::get('config.email')}}">
                    </div>
                </div>

                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">统计代码：</label>
                    <div class="layui-input-block">
                        <textarea name="desc" placeholder="请输入代码" class="layui-textarea">{{Config::get('config.desc')}}</textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button type="submit" class="layui-btn layui-btn-normal" lay-submit lay-filter="siteInfo">立即提交
                        </button>
                    </div>
                </div>

            </div>
            <!--SEO配置-->
            <div class="layui-tab-item">
                <div class="layui-form-item">
                    <label class="layui-form-label">SEO标题：</label>
                    <div class="layui-input-block">
                        <input type="text" name="title" placeholder="请输入seo标题" autocomplete="off"
                               class="layui-input" value="{{Config::get('config.title')}}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">关键字：</label>
                    <div class="layui-input-block">
                        <input type="text" name="keyword" placeholder="请输入seo关键字" autocomplete="off"
                               class="layui-input" value="{{Config::get('config.keyword')}}">
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">描述：</label>
                    <div class="layui-input-block">
                        <textarea name="description" placeholder="请输入seo描述" class="layui-textarea">{{Config::get('config.description')}}</textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn layui-btn-normal" lay-submit lay-filter="seoInfo">立即提交</button>
                    </div>
                </div>
            </div>
            <!--邮箱配置-->
            <div class="layui-tab-item">


                <div class="layui-form-item">
                    <label class="layui-form-label">服务器：</label>
                    <div class="layui-input-block">
                        <input type="text" name="smtp" placeholder="请输入邮件服务器" autocomplete="off" class="layui-input"
                               value="{{Config::get('config.smtp')}}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">端口：</label>
                    <div class="layui-input-block">
                        <input type="text" name="port" placeholder="请输入邮件发送端口" autocomplete="off"
                               class="layui-input" value="{{Config::get('config.port')}}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">发件人：</label>
                    <div class="layui-input-block">
                        <input type="text" name="senduser" placeholder="请输入发件人地址" autocomplete="off"
                               class="layui-input" value="{{Config::get('config.senduser')}}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">名称：</label>
                    <div class="layui-input-block">
                        <input type="text" name="name" placeholder="请输入发件人名称" autocomplete="off" class="layui-input"
                               value="{{Config::get('config.name')}}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">用户名：</label>
                    <div class="layui-input-block">
                        <input type="text" name="username" placeholder="请输入用户名" autocomplete="off"
                               class="layui-input" value="{{Config::get('config.username')}}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">密码：</label>
                    <div class="layui-input-block">
                        <input type="text" name="password" placeholder="请输入密码" autocomplete="off"
                               class="layui-input" value="{{Config::get('config.password')}}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn layui-btn-normal" lay-submit lay-filter="emailInfo">立即提交</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>

        </div>
    </div>
@stop

@section('js')
    <script>
        //Demo
        layui.use(['form', 'element'], function () {
            var form = layui.form();
            var element = layui.element();
            form.render();
        });
    </script>

@stop