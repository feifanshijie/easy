<?php

namespace Boot\Support;

class Exception extends \Exception
{
    public function __construct($message, $code)
    {
        echo "<script>alert('{$code}:{$message}')</script>";

    }
    public function __toString() {
        return __CLASS__.':['.$this->code.']:'.$this->message.'\n';
    }

    public function customFunction() {
        echo '自定义错误类型';
    }

    //TODO:保存捕获日志
    public function push_log()
    {
        echo $this->file;
        echo $this->line;
    }
}