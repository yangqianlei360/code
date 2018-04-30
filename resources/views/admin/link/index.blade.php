@extends('admin.layouts.app')
@section('content')
    <div class="page-content-wrap">
        {!! Form::open(['method' => 'post','class'=>'layui-form']) !!}
        <div class="layui-form-item">
            <button class="layui-btn layui-btn-small layui-btn-normal addBtn hidden-xs"
                    data-url="{{route('admin.createlink')}}"><i
                        class="layui-icon">&#xe654;</i></button>

            <button class="layui-btn layui-btn-small layui-btn-danger  delBtn hidden-xs"
                    data-url="{{route('admin.delselectlink')}}"><i
                        class="layui-icon">&#xe640;</i></button>

        </div>

        <div class="layui-form" id="table-list">
            <table class="layui-table" lay-even lay-skin="nob">
                <colgroup>
                    <col width="50">

                    <col class="hidden-xs" width="100">
                    <col width="200">
                    <col width="200">

                    <col>
                    <col>
                    <col width="150">
                </colgroup>
                <thead>
                <tr>
                    <th><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></th>
                    <th class="hidden-xs">ID</th>

                    <th>网站名称</th>
                    <th>网站链接</th>
                    <th>备 注</th>
                    <th>排序</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($links as $link)
                    <tr>
                        <td><input type="checkbox" name="idcheckbox" lay-skin="primary" data-id="{{$link->id}}"></td>
                        <td class="hidden-xs">{{$link->id}}</td>

                        <td>{{$link->linkname}}</td>
                        <td>{{$link->url}}</td>
                        <td>{{$link->remark}}</td>
                        <td>{{$link->sort}}</td>
                        <td>
                            <div class="layui-inline">
                                <button class="layui-btn layui-btn-mini layui-btn-normal  edit-btn"
                                        data-id="{{$link->id}}"
                                        data-url="{{route('admin.showlink',['id'=>$link->id])}}"><i class="layui-icon">&#xe642;</i>
                                </button>
                                <button class="layui-btn layui-btn-mini layui-btn-danger del-btn"
                                        data-id="{{$link->id}}"
                                        data-url="{{route('admin.deletelink',['id'=>$link->id])}}"><i
                                            class="layui-icon">&#xe640;</i></button>
                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        {!! Form::close() !!}
    </div>
@stop

