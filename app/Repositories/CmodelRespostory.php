<?php


namespace App\Repositories;


use App\Cmodel;

class CmodelRespostory
{
    /**
     * 保存
     * @param $request
     */
    public function save($request)
    {
        $model_name = $request->model_name;
        $model = new Cmodel();
        $model->model_name = $request->model_name;
        $model->model_table = strtolower($request->model_table);
        $model->listtpl = $request->listtpl;
        $model->showtpl = $request->showtpl;
        $model->save();
    }

    /**
     * 全部数据
     * @return Cmodel[]|\Illuminate\Database\Eloquent\Collection
     */
    public function list()
    {
        return Cmodel::all();
    }

    /**
     * 根据模型名称判断是否存在
     */
    public function get($request)
    {
        if (Cmodel::where('model_name', $request->model_name)->count()) {
            return false;
        }
        return true;
    }

    /**
     * 判断是否存在要创建的数据表
     * @param $request
     * @return bool
     */
    public function table_isexist($request)
    {
        if (\Schema::hasTable($request->model_table)) {
            return false;
        }
        return true;
    }
}