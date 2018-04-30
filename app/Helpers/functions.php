<?php
#跳转页面
function jump($result, $msg, $url)
{
    return redirect()->route('admin.jump')->with('status', [
        'result' => $result,
        'msg' => $msg,
        'url' => $url,
    ]);
}
#新建对象
function newObject($id,$model)
{
    if($id==0){
        return new $model;
    }else{
        return $model::find($id);
    }
}
