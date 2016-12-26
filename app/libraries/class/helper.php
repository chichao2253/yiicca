<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

/**
 * Created by PhpStorm.
 * User: chichao
 * Date: 2016/12/22
 * Time: 13:38
 */
class helper
{
    function upload_one($file){
        $originalName = $file->getClientOriginalName(); // 文件原名
        $ext = $file->getClientOriginalExtension();     // 扩展名
        $realPath = $file->getRealPath();   //临时文件的绝对路径
        $type = $file->getClientMimeType();     // image/jpeg
        // 上传文件
        $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
        // 使用我们新建的uploads本地存储空间（目录）
        $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));
        $filenameSmall = "uploads/small/" . $filename;
        $filenameBig = "uploads/big/" . $filename;
        $img= ImageManagerStatic::make($file[0]);

        $img->save($filenameBig,100)->resize(300,200);
        $img->save($filenameSmall,50);
        return "a";
    }

}