<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    //
    public function upload(Request $request)
    {

        $config = ["png", "jpg", "gif"];
        //dd($request->file('file'));
        $file = $request->file('file');
        if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $config)) {
            return $result = [
                'error'   => 1,
                'message' => $file->getError()
            ];
        }

        $destinationPath = 'uploads/'; //public 文件夹下面建 storage/uploads 文件夹
        $extension = $file->getClientOriginalExtension();
        $fileName = str_random(10).'.'.$extension;
        $file->move($destinationPath, $fileName);
        $filePath = asset($destinationPath.$fileName);

        //dd($file->getSaveName());
        $result = [
            'error' => 0,
            'url'   => $filePath
        ];
        return response()->json($result);

        // 获取文件相关信息
        /*$originalName = $file->getClientOriginalName(); // 文件原名
        $ext = $file->getClientOriginalExtension();     // 扩展名
        $realPath = $file->getRealPath();   //临时文件的绝对路径
        $type = $file->getClientMimeType();     // image/jpeg

        // 上传文件
        $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
        // 使用我们新建的uploads本地存储空间（目录）
        $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));*/
        /*if ($file) {
            $result = [
                'error' => 0,
                'url'   => str_replace('\\', '/', $save_path . $info->getSaveName())
            ];
        } else {
            $result = [
                'error'   => 1,
                'message' => $file->getError()
            ];
        }
        return response()->json($result);*/
    }
}
