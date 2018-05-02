@extends('admin.layouts.app')

@section('content')
    {!! Form::open(['class' => 'layui-form column-content-detail', 'method' => 'post']) !!}
        <div class="layui-tab">
            <ul class="layui-tab-title">
                <li class="layui-this">模型信息</li>
            </ul>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <div class="layui-form-item">
                        <label class="layui-form-label">模型名称：</label>
                        <div class="layui-input-block">
                            <input type="text" name="model_name" required lay-verify="required" placeholder="请输入模型名称" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">模型表名：</label>
                        <div class="layui-input-block">
                            <input type="text" name="model_table" required lay-verify="required" placeholder="只能由小写英文和数字组成(无需加表前缀)，此项添加后不能修改" autocomplete="off" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">列表模板：</label>
                        <div class="layui-input-block">
                            <input type="text" name="listtpl" placeholder="list_news.html。不填写则会是list_+模型名称拼音" autocomplete="off" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">内容模板：</label>
                        <div class="layui-input-block">
                            <input type="text" name="showtpl"  placeholder="show_news.html。同上" autocomplete="off" class="layui-input">
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div class="layui-form-item" style="padding-left: 10px;">
            <div class="layui-input-block">
                <button class="layui-btn layui-btn-normal" lay-submit lay-filter="model">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    {!! Form::close() !!}
@stop



@section('js')
    <script>
        layui.use(['form', 'layedit', 'laydate'], function () {
            var form = layui.form(),
                layer = layui.layer;
            //自定义验证规则
            form.verify({
                sort: [/^[1-9]\d*|0$/, '序号必须是一个正整数'],
            });

            //监听提交
            form.on('submit(model)', function (data) {
                $.ajax({
                    type: "{{isset($model)?'put':'post'}}",
                    url: "{{isset($model)?route('admin.cmodel.save',['id'=>$model->id]):route('admin.cmodel.save')}}",
                    data: $("form").serialize(),//表单数据
                    success: function (result) {
                        if (result["code"] == "200") {

                            parent.refresh();
                            var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
                            parent.layer.close(index);




                        }
                        if (result["code"] == "-1") {
                            layer.alert(result["msg"],{icon: 5});
                        }
                    }
                });
                return false;
            });

        });
    </script>

@stop