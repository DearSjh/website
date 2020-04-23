<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class UploadController extends Controller
{
    public function file(Request $request)
    {

        try {


            // 判断上传的文件是否有效
            if ($request->file('file')->isValid()) {

                $file = $request->file('file'); // 参数file是前端上传的文件名


                // 上传的路径，是绝对路径。base_path()获取到的是从系统根目录到项目目录的路径
                $uploadPath = base_path() . '/public/file/';

                // 拼接出一个文件名，$file->getClientOriginalExtension()用于获取文件的后缀
                $fileName = date('YmdHis') . mt_rand(100, 999) . '.' . $file->getClientOriginalExtension();
                $fileRet = $file->move($uploadPath, $fileName);

                // 获取不到文件名，提示上传失败
                if (!$fileRet->getFilename()) {
                    $this->response->setMsg(500, '上传失败');
                    return $this->response->responseJSON();
                }

                $fileName = '/file/' . $fileRet->getFilename();

                $this->response->setData(['file' => $fileName]);
                return $this->response->responseJSON();

            } else {
                Throw new FileException('不是有效的文件');
            }


        } catch (FileException $exception) {
            $this->response->setMsg(500, $exception->getMessage());
        }

        return $this->response->responseJSON();
    }
}