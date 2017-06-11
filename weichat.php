<?php
define("TOKEN", "prodevelop");
$wechatObj = new wechatCallbackapiTest();
$wechatObj->valid();

class wechatCallbackapiTest
{
    protected $url_api = "http://tp5.local.com/homeapi.php";
    public function __construct($url_api)
    {
        $this->url_api = $url_api;
    }

    public function valid()
    {
        $echoStr = $_GET["echostr"];//随机字符串
        //valid signature , option
        if ($this->checkSignature()) {
            echo $echoStr;
            exit;
        }
    }

    /**
     * @return bool
     * 微信验签
     */
    private function checkSignature()
    {
        //微信服务器将发送GET请求到填写的服务器地址URL上
        //微信加密签名，signature结合了开发者填写的token参数和请求中的timestamp参数、nonce参数。
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];//时间戳
        $nonce = $_GET["nonce"];//随机数
        $token = TOKEN;

        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);
        if ($tmpStr == $signature) {
            return true;
        } else {
            return false;
        }
    }

    public function responseMsg()
    {
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        echo $postStr;
        if (!empty($postStr)) {
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $result = curlRequest($this->url_api,$postObj);
            $result = $postObj->Content;
        } else {
            $result = '请输入关键字';
        }
        echo $result;
    }
}