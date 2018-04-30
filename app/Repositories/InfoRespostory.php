<?php


namespace App\Repositories;

use Auth;
use App\Admin;

class InfoRespostory
{
    /**
     * 更新管理员信息
     * @param $request
     */
    public function update($request)
    {
        $admin = Admin::find($request->id);
        $admin->realname = $request->realname;
        $admin->email = $request->email;
        $admin->remark = $request->remark;
        $admin->save();
    }

    /**
     * 修改管路员密码
     * @param $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changpass($request)
    {
        $id = Auth::guard('admin')->id();
        $admin = Admin::find($id);
        if (!\Hash::check($request->password, $admin->password)) {
            return jump('error', '管理员原密码不正确！', route('admin.info'));
        }
        $admin->password = bcrypt($request->newpass);
        $admin->save();
        return jump('success', '管理员密码修改成功！', route('admin.info'));
    }
}