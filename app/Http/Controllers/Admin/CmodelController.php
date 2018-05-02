<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\CmodelRespostory;

class CmodelController extends Controller
{
    public function __construct(CmodelRespostory $respostory)
    {
        $this->respo = $respostory;
    }

    #列表页面
    public function index()
    {
        $model = $this->respo->list();
        return view('admin.cmodel.index', compact('model'));
    }

    #添加页面
    public function create()
    {
        return view('admin.cmodel.show');
    }

    #保存模型
    public function save(Request $request)
    {
//        dd($this->respo->get($request));

        if ($this->respo->get($request)&&$this->respo->table_isexist($request)) {
            $this->respo->save($request);
            return ['code' => 200];
        }else{
            return ['code' => -1,'msg'=>'模型名称重复或数据表已经存在，请重新定义'];
        }

    }
}