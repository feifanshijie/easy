<?php


if (!function_exists('env'))
{
    function env($param)
    {
        $re = explode('.', $param);
    }
}

/**
 * TODO:CURL
 * @param  string $url  地址
 * @param  string $type 类型默认GET
 * @param  array  $data 数据
 * @return mixed
 */
if(!function_exists('curl'))
{
    function curl(string $url = '', $type = 'get', array $data = [])
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if($type == 'post')
        {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
        else
        {
            curl_setopt($ch, CURLOPT_HEADER, 0);
        }

        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}

if(!function_exists('msg'))
{
    function msg(int $code = 200, string $msg = 'success', $data = [], int $status = 1) : array
    {
        return ['code' => $code, 'msg' => $msg, 'data' => $data, 'status' => $status];
    }
}

if(!function_exists('success'))
{
    function success(int $code = 200, string $msg = 'success', $data = [], int $status = 1) : array
    {
        return msg($code, $msg, $data, $status);
    }
}

if(!function_exists('fail'))
{
    function fail(int $code = 400, string $msg = 'fail', $data = [], int $status = 0)
    {
        return msg($code, $msg, $data, $status);
    }
}

if(!function_exists('dd'))
{
    function dd($param)
    {
        print_r($param);exit;
    }
}

//获取内存使用情况
if(!function_exists('FW_M'))
{
    function FW_M()
    {
        echo memory_get_usage();exit;
    }
}

function input($key, $default = null)
{
    if(isset($_REQUEST["$key"]) && !empty($_REQUEST["$key"]))
    {
        return $_REQUEST["$key"];
    }
    return $default;
}

/**
 * 文件系统相关
 */

if(!function_exists('file_write'))
{
    /**
     * TODO:写入一个文件
     * @param string $filename
     * @param string $content
     * @return bool
     */
    function file_write(string $filename = '', string $content = '') : bool
    {
        file_put_contents();
        return true;
    }
}

if(!function_exists('FILE_DELETE'))
{
    /**
     * TODO:删除一个文件
     * @param string|null $file_path
     * @return bool
     */
    function FILE_DELETE(string $file_path = null)
    {
        return true;
    }

}

if(!function_exists('FILE_MOVE'))
{
    /**
     * TODO:移动一个文件
     * @param string|null $local_path
     * @param string|null $new_path
     * @return bool
     */
    function FILE_MOVE(string $local_path = null, string $new_path = null)
    {
        return true;
    }
}

/**
 * ====================================================
 * TODO: File Log function by GYM 2017/03/12
 * ====================================================
 */

if(!function_exists('FW_LOG_WRITE'))
{
    /**
     * 写日志
     * @param string $info
     * @return bool
     */
    function LOG_WRITE(string $info)
    {
        return boolval(1);
    }
}


/**
 * TODO:移动日志
 * @param  string $type
 * @param  string $file_name
 * @return boolean
 */
function LOG_MOVE(string $type, string $file_name)
{
    return true;
}

/**
 * TODO:Delete log
 * TODO:删除日志
 * @param  string  $type
 * @param  string  $file_name
 * @return boolean
 */
if(!function_exists('FW_LOG_DELETE'))
{
    function LOG_DELETE(string $type, string $file_name)
    {
        return true;
    }
}

/**
 * ====================================================
 * TODO: Relate to IP address by GYM 2017/07/26
 * ====================================================
 */

if(!function_exists('IP_GET'))
{
    /**
     * TODO:获取IP地址  代码来自discuz
     */
    function IP_GET()
    {
        $ip='未知IP';
        if(!empty($_SERVER['HTTP_CLIENT_IP']))
        {
            return IP_IS($_SERVER['HTTP_CLIENT_IP'])?$_SERVER['HTTP_CLIENT_IP']:$ip;
        }
        elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        {
            return IP_IS($_SERVER['HTTP_X_FORWARDED_FOR'])?$_SERVER['HTTP_X_FORWARDED_FOR']:$ip;
        }

        return IP_IS($_SERVER['REMOTE_ADDR'])?$_SERVER['REMOTE_ADDR']:$ip;
    }
}

/**
 * TODO:Check IP address is true or false
 * TODO:检查IP地址是否正确
 * @param  $ip_str
 * @return bool|int
 */
if(!function_exists('IP_IS'))
{
    function IP_IS($ip_str)
    {
        $ip=explode('.',$ip_str);
        for($i=0;$i<count($ip);$i++)
        {
            if($ip[$i]>255){
                return false;
            }
        }

        return preg_match('/^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$/',$ip_str);
    }
}

/**
 * TODO:遍历数组
 * @param  $arr
 * @return boolean
 */
if(!function_exists('FW_ITERATOR'))
{
    function ARRAY_ITERATOR($arr)
    {
        echo '<style>body{margin:0;padding:0;line-height:30px;}</style>';
        echo '<div style="background-color:#000;color:greenyellow;font-size:20px;margin:0;padding:10px 20px;border:1px solid #ddd"><pre>';
        var_dump($arr);
        die ('</pre></div>');
    }
}

/**
 * TODO:读取配置
 * @param  mixed $config_name
 * @return
 */
if(!function_exists('FW_CONFIG'))
{
    function FW_CONFIG($config_name)
    {
        return parse_ini_file(CONFIG_PATH."/{$config_name}.ini",true);
    }
}

if(!function_exists('FW_MILLISECOND'))
{
    /**
     * 获取毫秒
     */
    function GET_MILLISECOND()
    {
        return microtime(true);
    }
}


