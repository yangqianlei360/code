<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    #系统配置界面
    public function index()
    {
        return view('admin.system.index');
    }

    #保存
    public function save(Request $request)
    {
        foreach ($request->except('_token') as $key=>$value){
            $array[$key]=$value;
        }
        $config_arr = var_export($array,true);
        $config_txt = "<?php" . PHP_EOL . PHP_EOL . "return " . $config_arr. ";";
        file_put_contents(config_path('config.php'), $config_txt);
        exec("php artisan config:cache",$out);
        if($out){
            return jump('success', '系统配置修改成功', route('admin.system'));
        }
    }
}