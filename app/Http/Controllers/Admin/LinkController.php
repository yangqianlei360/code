<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Repositories\LinkRespostory;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function __construct(LinkRespostory $respostory)
    {
        $this->respo = $respostory;
    }

    #友情链接界面
    public function index()
    {
        $links = $this->respo->list();
        return view('admin.link.index', compact('links'));
    }

    #保存友情链接
    public function save(Request $request)
    {
        $this->respo->save($request, 0);
        return ['code' => 200];
    }

    #添加友情链接
    public function create()
    {
        return view('admin.link.show');
    }

    #编辑
    public function show($id)
    {
        $model = $this->respo->getOne($id);
        return view('admin.link.show', compact('model'));
    }

    #保存更新
    public function update(Request $request, $id)
    {
        $this->respo->save($request, $id);
        return ['code' => 200];

    }

    #删除
    public function delete($id)
    {
        $this->respo->getOne($id)->delete();
        return ['code' => 200];
    }

    #批量删除
    public function delselect(Request $request)
    {

        $id = $request->id;
        $str = explode(',', $id);
        foreach ($str as $v) {
            $this->respo->getOne($v)->delete();
        }
        return ['code' => 200];
    }


}