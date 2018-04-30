<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\InfoRespostory;

class InfoController extends Controller
{
    public function __construct(InfoRespostory $respostory)
    {
        $this->respo = $respostory;
    }

    #管理员设置界面
    public function index()
    {
        return view('admin.info.index');
    }

    #管理员保存
    public function save(Request $request)
    {
        $this->respo->update($request);
        return jump('success', '管理员配置修改成功', route('admin.info'));
    }

    #管理员修改密码
    public function changepassword(Request $request)
    {
        return $this->respo->changpass($request);
    }
}