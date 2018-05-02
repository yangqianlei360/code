@extends('admin.layouts.app')

@section('content')
    <div class="page-content-wrap">
        <form class="layui-form" action="">
            <div class="layui-form-item">
                <div class="layui-inline tool-btn">
                    <button class="layui-btn layui-btn-small layui-btn-normal addBtn hidden-xs" data-url="{{route('admin.cmodel.create')}}"><i class="layui-icon">&#xe654;</i></button>
                </div>



            </div>
        </form>
        <div class="layui-form" id="table-list">
            <table class="layui-table" lay-even lay-skin="nob">
                <colgroup>
                    <col width="50">
                    <col class="hidden-xs" width="100">
                    <col width="80">
                    <col width="80">
                    <col width="80">
                    <col width="150">
                </colgroup>
                <thead>
                <tr>

                    <th class="hidden-xs">ID</th>
                    <th>模型名称</th>
                    <th>数据表名</th>
                    <th>模型类型</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($model as $model)
                <tr>
                    <td>{{$model->id}}</td>
                    <td>{{$model->model_name}}</td>
                    <td>{{$model->model_table}}</td>
                    <td>内容模型</td>
                    <td>
                        <div class="layui-inline">
                            <button class="layui-btn layui-btn-mini layui-btn-normal  add-btn" data-id="1" data-url="menu-add2.html"><i class="layui-icon">&#xe654;</i></button>
                            <button class="layui-btn layui-btn-mini layui-btn-normal  edit-btn" data-id="1" data-url="menu-add2.html"><i class="layui-icon">&#xe642;</i></button>
                            <button class="layui-btn layui-btn-mini layui-btn-danger del-btn" data-id="1" data-url="del.html"><i class="layui-icon">&#xe640;</i></button>
                        </div>
                    </td>
                </tr>
               @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop