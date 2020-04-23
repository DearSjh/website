<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/5/23
 * Time: 14:38
 */

namespace App\Services;

use Illuminate\Support\Facades\Input;

class Utils
{
    const BASE_URL = 'http://cms.com';

    /**
     * Description:获取数字
     */
    public static function getInt($serverId)
    {
        $pattern = '/\d+/';
        if (preg_match_all($pattern, $serverId, $getInt)) {
            return implode($getInt[0]);
        }
        return 0;

    }

    /**
     * Description:上传base64编写文件
     */
    public static function imgDeal($img, $dir)
    {
        $result = $dir;
        //匹配出图片的格式
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $img, $result)) {
            $type = $result[2];
            $newFile = $dir;
            if (!file_exists($dir)) {
                //检查是否有该文件夹，如果没有就创建，并给予最高权限
                mkdir($newFile, 0777, true);
            }

            $newFile = $newFile . substr(str_shuffle(md5(date('YmdHis', time()))), 8, 16) . ".{$type}";
            if (file_put_contents($newFile, base64_decode(str_replace($result[1], '', $img)))) {
                return strstr($newFile, '/');
            } else {
                return '';
            }
        }
    }

    /**
     * Description:删除文件
     */
    public static function DelFile($dir)
    {
        if (file_exists($dir)) {
            unlink($dir);
        }
    }

    /**
     * Description:写入文件
     */
    public static function writeFile($dir, $txt)
    {
        if (!file_exists($dir)) {
            //检查是否有该文件夹，如果没有就创建，并给予最高权限
            mkdir($dir, 0777, true);
        }
        $newFile = $dir . substr(str_shuffle(md5(date('YmdHis', time()))), 8, 16) . '.text';
        $myFile = fopen($newFile, "w");
        fwrite($myFile, $txt);
        fclose($myFile);
        return strstr($newFile, '/');

    }

    /**
     * Description:读取文件
     */
    public static function readFile($file)
    {
        if (!file_exists($file)) {
            return '';
        }
        $handle = fopen($file, "r");
        $contents = fread($handle, filesize($file));
        fclose($handle);
        return $contents;

    }

    /**
     * Description:对象转数组
     */
    public static function objectArray($array)
    {
        if (is_object($array)) {
            $array = (array)$array;
        }
        if (is_array($array)) {
            foreach ($array as $key => $value) {
                $array[$key] = self::objectArray($value);
            }
        }
        return $array;
    }

    /**
     * Description:微端版本上传
     */
    public static function moveFiles($fileObject, $dir)
    {
        $fileArray = Utils::objectArray($fileObject);

        $date['name'] = $fileArray['file']['name'];
        $date['type'] = $fileArray['file']['type'];
        $date['tmp_name'] = $fileArray['file']['tmp_name'];
        $fileDir = dirname(dirname(dirname(__FILE__))) . $dir;

        if (!file_exists($fileDir)) {
            //检查是否有该文件夹，如果没有就创建，并给予最高权限
            mkdir($fileDir, 0777, true);
        }

        $newFileName = substr(str_shuffle(md5(date('YmdHis', time()))), 8, 16) . strrchr($date['name'], '.');

        if (!move_uploaded_file($date['tmp_name'], $fileDir . $newFileName)) {
            throw new \Exception('上传失败');
        }
        return [
            'newFileDir' => str_replace('/public/', '/', $dir) . $newFileName,
            'newFileName' => $newFileName,
            'dir' => $dir,
            'suffix' => strrchr($date['name'], '.'),
        ];
    }

    /**
     * Description:解压文件包
     */
    public static function zip($newFileName)
    {
        $zip = new \ZipArchive();
        if ($zip->open('../public/upload/appInfo/apk/' . $newFileName) === TRUE) {
            $str = explode('.', $newFileName);
            $zip->extractTo('../public/upload/appInfo/apk/' . $str[0]);//假设解压缩到在当前路径下images文件夹的子文件夹php
            $zip->close();//关闭处理的zip文件
            $file = self::listDir('../public/upload/appInfo/apk');
            return $file;

        }
    }

    /**
     * Description:遍历文件夹
     */
    public static function listDir($dir)
    {
        $dir .= substr($dir, -1) == '/' ? '' : '/';
        $dirInfo = array();
        foreach (glob($dir . '*') as $v) {
            $dirInfo[] = $v;
            if (is_dir($v)) {
                $dirInfo = array_merge($dirInfo, self::listDir($v));
            }
        }
        return $dirInfo;
    }

    public static function delDir($path)
    {
        //如果不是目录则退出方法
        if (!is_dir($path)) {
            return;
        }
        //扫描一个文件夹内的所有文件夹和文件并返回数组
        $array = scandir($path);

        foreach ($array as $val) {
            //排除目录中的.和..
            if ($val == '.' || $val == '..' || $val == '.gitignore') {
                continue;
            }

            if (!is_dir($path . $val)) {
                self::DelFile($path . $val);
                continue;
            }
            //如果是目录则递归子目录，继续操作 子目录中操作删除文件夹和文件
            self::delDir($path . $val . '/');

            //目录清空后删除空文件夹
            @rmdir($path . $val . '/');
        }

    }

    public static function getReport($ListData)
    {
        return [
            'data' => $ListData['data'],
            'pagination' => [
                'total' => $ListData['total'],
                'count' => $ListData['total'],
                'perPage' => $ListData['per_page'],
                'currentPage' => $ListData['current_page'],
                'totalPages' => $ListData['last_page']
            ]
        ];

    }


    public static function categoryTree($list, $path = '')
    {
        $arr = [];
        if (!empty($list)) {
            foreach ($list as $k1 => $l1) {

                $link = !empty($l1['link']) ? $l1['link'] : "{$path}/{$l1['dir_name']}";

                $arr[$k1] = ['id' => $l1['id'], 'link' => $link, 'name' => $l1['name'], 'picture' => $l1['picture']];
                $arr[$k1]['child'] = [];
                foreach ($l1['child'] as $k2 => $l2) {

                    $link = !empty($l2['link']) ? $l2['link'] : "{$path}/{$l1['dir_name']}/{$l2['dir_name']}";
                    $arr[$k1]['child'][$k2] = ['id' => $l2['id'], 'link' => $link, 'name' => $l2['name'], 'picture' => $l2['picture']];
                    $arr[$k1]['child'][$k2]['child'] = [];
                    foreach ($l2['child'] as $k3 => $l3) {

                        $link = !empty($l3['link']) ? $l3['link'] : "{$path}/{$l1['dir_name']}/{$l2['dir_name']}/{$l3['dir_name']}";
                        $arr[$k1]['child'][$k2]['child'][$k3] = ['id' => $l3['id'], 'link' => $link, 'name' => $l3['name'], 'picture' => $l3['picture']];

                    }

                }

            }
        }

        return $arr;

    }


    /**
     *
     */
    public static function getPath()
    {

        $path = Input::path();
        $arrPath = explode('/', $path);

        if (preg_match('/html$/', $path)) {
            array_pop($arrPath);
        }
        return $arrPath;
    }

    /**
     * @describe 字符串 生成正则表达式
     * @param $string
     * @return string
     */
    public static function generateRegularExpressionString($string)
    {
        $strArr[0] = $string;
        $strNewArr = array_map('preg_quote', $strArr);
        return $strNewArr[0];
    }

    public static function checkWords($banned, $string)
    {
        $matchBanned = array();
        //循环查出所有敏感词

        $newBanned = strtolower($banned);
        $i = 0;
        do {
            $matches = null;
            if (!empty($newBanned) && preg_match($newBanned, $string, $matches)) {
                $isEmpyt = empty($matches[0]);
                if (!$isEmpyt) {
                    $matchBanned = array_merge($matchBanned, $matches);
                    $matchesStr = strtolower(Utils::generateRegularExpressionString($matches[0]));
                    $newBanned = str_replace("|" . $matchesStr . "|", "|", $newBanned);
                    $newBanned = str_replace("/" . $matchesStr . "|", "/", $newBanned);
                    $newBanned = str_replace("|" . $matchesStr . "/", "/", $newBanned);
                }
            }
            $i++;
            if ($i > 5) {
                break;
            }

        } while (count($matches) > 0 && !$isEmpyt);

        //查出敏感词
        if ($matchBanned) {
            return $matchBanned;
        }
        //没有查出敏感词
        return array();
    }


    public static function getIpInfo($ip)
    {
        $ipInfo = file_get_contents('http://ip.taobao.com/service/getIpInfo.php?ip=' . $ip);
        $data['region'] = json_decode($ipInfo, true)['data']['region'] ?? '';
        $data['city'] = json_decode($ipInfo, true)['data']['city'] ?? '';
        return $data;
    }

    public static function rankingSign($arr, $secretKey = RANKING_SECRET_KEY)
    {
        ksort($arr);

        $str = implode('&', $arr);
        return md5(md5($str) . $secretKey);

    }
}