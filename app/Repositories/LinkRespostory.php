<?php


namespace App\Repositories;

use App\Link;

class LinkRespostory
{
    /**
     * 添加/更新友情链接保存
     * @param $request
     */
    public function save($request, $id)
    {
        $link = newObject($id, 'App\Link');
        $link->linkname = $request->linkname;
        $link->url = $request->url;
        $link->remark = $request->remark;
        $link->save();
    }

    /**
     * 获取所有数据
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function list()
    {
        return Link::orderBy('sort', 'desc')->orderBy('id', 'desc')->get();
    }

    /**
     * 根据ID获取数据
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function getOne($id)
    {
        return Link::findOrFail($id);
    }



}