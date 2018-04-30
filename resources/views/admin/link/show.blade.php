@extends('admin.layouts.app')
@section('content')
    <div class="page-content-wrap clearfix">
        @if (isset($model))
            {!! Form::model($model, ['method' => 'post','class' => 'layui-form']) !!}
        @else
            {!! Form::open(['class' => 'layui-form', 'method' => 'post']) !!}
        @endif
        <div class="layui-tab">

            <div class="layui-tab-content">
                <div class="layui-tab-item"></div>
                <div class="layui-tab-item layui-show">
                    <div class="layui-form-item">
                        <label class="layui-form-label">网站名称：</label>
                        <div class="layui-input-block">
                            <input type="text" name="linkname" required lay-verify="required" placeholder="请输入网站名称"
                                   autocomplete="off" class="layui-input" value="{{isset($model)?$model->linkname:''}}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">网站链接：</label>
                        <div class="layui-input-block">
                            <input type="text" name="url" required lay-verify="required" placeholder="请输入网站链接"
                                   autocomplete="off" class="layui-input" value="{{isset($model)?$model->url:''}}">
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">备注：</label>
                        <div class="layui-input-block">
                            <textarea placeholder="请输入内容" class="layui-textarea" name="remark">{{isset($model)?$model->remark:''}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="layui-tab-item">

                </div>
            </div>
        </div>
        <div class="layui-form-item" style="padding-left: 10px;">
            <div class="layui-input-block">
                <button class="layui-btn layui-btn-normal" lay-submit lay-filter="link">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

@stop

@section('js')
    <script>
        layui.use(['form', 'layedit', 'laydate'], function () {
            var form = layui.form(),
                layer = layui.layer;

            //监听提交
            form.on('submit(link)', function (data) {
                $.ajax({
                    type: "{{isset($model)?'put':'post'}}",
                    url: "{{isset($model)?route('admin.updatelink',['id'=>$model->id]):route('admin.savelink')}}",
                    data: $("form").serialize(),//表单数据
                    success: function (result) {
                        if (result["code"] == "200") {

                            parent.refresh();
                            var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
                            parent.layer.close(index);




                        }
                        if (result["code"] == "-1") {
                            layer.msg(result["msg"]);
                        }
                    }
                });
                return false;
            });

        });
    </script>

@stop