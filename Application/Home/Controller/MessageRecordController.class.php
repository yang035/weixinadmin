<?php
namespace Home\Controller;

use Think\Controller;

class MessageRecordController extends Controller
{
    public function index()
    {

    }

    public function responseMessage()
    {
        $postObj = $_REQUEST;
        $msgType = trim($postObj->MsgType);
        switch ($msgType) {
            case 'text':
                $this->receiveText($postObj);
                $resultStr = $this->responseText($postObj);
                break;
            case 'image':
                $resultStr = $this->receiveImage($postObj);
                break;
            case 'voice':
                $resultStr = $this->receiveVoice($postObj);
                break;
            case 'video':
                $resultStr = $this->receiveVideo($postObj);
                break;
            case 'shortvideo':
                $resultStr = $this->receiveShortVideo($postObj);
                break;
            case 'location':
                $resultStr = $this->receiveLocation($postObj);
                break;
            case 'link':
                $resultStr = $this->receiveLink($postObj);
                break;
            case 'event':
                $resultStr = $this->receiveLink($postObj);
                break;
            default:
                $resultStr = $this->receiveEvent($postObj);
        }
        return $resultStr;
    }

    public function receiveText($postObj)
    {
        $data = array(
            'to_user_name' => $postObj->ToUserName,
            'from_user_name' => $postObj->FromUserName,
            'create_time' => date('Y-m-d H:i:s', $postObj->CreateTime),
            'msg_type' => $postObj->MsgType,
            'content' => $postObj->Content,
            'msg_id' => $postObj->MsgId,
            'add_time' => date('Y-m-d H:i:s'),
        );
        $flag = D('message_record')->add($data);
        if ($flag) {
            return true;
        } else {
            return false;
        }
    }

    public function receiveImage($postObj)
    {
        $data = array(
            'to_user_name' => $postObj->ToUserName,
            'from_user_name' => $postObj->FromUserName,
            'create_time' => date('Y-m-d H:i:s', $postObj->CreateTime),
            'msg_type' => $postObj->MsgType,
            'pic_url' => $postObj->PicUrl,
            'media_id' => $postObj->MediaId,
            'msg_id' => $postObj->MsgId,
            'add_time' => date('Y-m-d H:i:s'),
        );
        $flag = D('message_record')->add($data);
        if ($flag) {
            return true;
        } else {
            return false;
        }
    }

    public function receiveVoice($postObj)
    {
        $data = array(
            'to_user_name' => $postObj->ToUserName,
            'from_user_name' => $postObj->FromUserName,
            'create_time' => date('Y-m-d H:i:s', $postObj->CreateTime),
            'msg_type' => $postObj->MsgType,
            'media_id' => $postObj->MediaId,
            'format' => $postObj->Format,
            'recognition' => $postObj->Recognition,
            'msg_id' => $postObj->MsgId,
            'add_time' => date('Y-m-d H:i:s'),
        );
        $flag = D('message_record')->add($data);
        if ($flag) {
            return true;
        } else {
            return false;
        }
    }

    public function receiveVideo($postObj)
    {
        $data = array(
            'to_user_name' => $postObj->ToUserName,
            'from_user_name' => $postObj->FromUserName,
            'create_time' => date('Y-m-d H:i:s', $postObj->CreateTime),
            'msg_type' => $postObj->MsgType,
            'media_id' => $postObj->MediaId,
            'thumb_media_id' => $postObj->ThumbMediaId,
            'msg_id' => $postObj->MsgId,
            'add_time' => date('Y-m-d H:i:s'),
        );
        $flag = D('message_record')->add($data);
        if ($flag) {
            return true;
        } else {
            return false;
        }
    }

    public function receiveShortVideo($postObj)
    {
        $data = array(
            'to_user_name' => $postObj->ToUserName,
            'from_user_name' => $postObj->FromUserName,
            'create_time' => date('Y-m-d H:i:s', $postObj->CreateTime),
            'msg_type' => $postObj->MsgType,
            'media_id' => $postObj->MediaId,
            'thumb_media_id' => $postObj->ThumbMediaId,
            'msg_id' => $postObj->MsgId,
            'add_time' => date('Y-m-d H:i:s'),
        );
        $flag = D('message_record')->add($data);
        if ($flag) {
            return true;
        } else {
            return false;
        }
    }

    public function receiveLocation($postObj)
    {
        $data = array(
            'to_user_name' => $postObj->ToUserName,
            'from_user_name' => $postObj->FromUserName,
            'create_time' => date('Y-m-d H:i:s', $postObj->CreateTime),
            'msg_type' => $postObj->MsgType,
            'location_x' => $postObj->Location_X,
            'location_y' => $postObj->Location_Y,
            'scale' => $postObj->Scale,
            'label' => $postObj->Label,
            'msg_id' => $postObj->MsgId,
            'add_time' => date('Y-m-d H:i:s'),
        );
        $flag = D('message_record')->add($data);
        if ($flag) {
            return true;
        } else {
            return false;
        }
    }

    public function receiveLink($postObj)
    {
        $data = array(
            'to_user_name' => $postObj->ToUserName,
            'from_user_name' => $postObj->FromUserName,
            'create_time' => date('Y-m-d H:i:s', $postObj->CreateTime),
            'msg_type' => $postObj->MsgType,
            'title' => $postObj->Title,
            'description' => $postObj->Description,
            'url' => $postObj->Url,
            'msg_id' => $postObj->MsgId,
            'add_time' => date('Y-m-d H:i:s'),
        );
        $flag = D('message_record')->add($data);
        if ($flag) {
            return true;
        } else {
            return false;
        }
    }

    public function receiveEvent($postObj)
    {
        $eventType = trim($postObj->Event);
        switch ($eventType) {
            case 'subscribe':
                $resultStr = $this->receiveEventSubscribe($postObj);
                break;
            case 'unsubscribe':
                $resultStr = $this->receiveEventSubscribe($postObj);
                break;
            case 'SCAN':
                $resultStr = $this->receiveEventScan($postObj);
                break;
            case 'LOCATION':
                $resultStr = $this->receiveEventLocation($postObj);
                break;
            case 'CLICK':
                $resultStr = $this->receiveEventClick($postObj);
                break;
            case 'VIEW':
                $resultStr = $this->receiveEventClick($postObj);
                break;
            default:
                $resultStr = $this->receiveEventSubscribe($postObj);
        }
        return $resultStr;
    }

    public function receiveEventSubscribe($postObj)
    {
        $eventType = trim($postObj->Event);
        $eventKey = trim($postObj->EventKey);
        if (('subscribe' == $eventType || 'unsubscribe' == $eventType) && empty($eventKey)) {
            $data = array(
                'to_user_name' => $postObj->ToUserName,
                'from_user_name' => $postObj->FromUserName,
                'create_time' => date('Y-m-d H:i:s', $postObj->CreateTime),
                'msg_type' => $postObj->MsgType,
                'event' => $postObj->Event,
                'add_time' => date('Y-m-d H:i:s'),
            );

        } else {
            $data = array(
                'to_user_name' => $postObj->ToUserName,
                'from_user_name' => $postObj->FromUserName,
                'create_time' => date('Y-m-d H:i:s', $postObj->CreateTime),
                'msg_type' => $postObj->MsgType,
                'event' => $postObj->Event,
                'event_key' => $postObj->EventKey,
                'ticket' => $postObj->Ticket,
                'add_time' => date('Y-m-d H:i:s'),
            );
        }
        $flag = D('message_record')->add($data);
        if ($flag) {
            return true;
        } else {
            return false;
        }
    }

    public function receiveEventScan($postObj)
    {
        $data = array(
            'to_user_name' => $postObj->ToUserName,
            'from_user_name' => $postObj->FromUserName,
            'create_time' => date('Y-m-d H:i:s', $postObj->CreateTime),
            'msg_type' => $postObj->MsgType,
            'event' => $postObj->Event,
            'event_key' => $postObj->EventKey,
            'ticket' => $postObj->Ticket,
            'add_time' => date('Y-m-d H:i:s'),
        );
        $flag = D('message_record')->add($data);
        if ($flag) {
            return true;
        } else {
            return false;
        }
    }

    public function receiveEventLocation($postObj)
    {
        $data = array(
            'to_user_name' => $postObj->ToUserName,
            'from_user_name' => $postObj->FromUserName,
            'create_time' => date('Y-m-d H:i:s', $postObj->CreateTime),
            'msg_type' => $postObj->MsgType,
            'event' => $postObj->Event,
            'event_key' => $postObj->EventKey,
            'latitude' => $postObj->Latitude,
            'longitude' => $postObj->Longitude,
            'precision' => $postObj->Precision,
            'add_time' => date('Y-m-d H:i:s'),
        );
        $flag = D('message_record')->add($data);
        if ($flag) {
            return true;
        } else {
            return false;
        }
    }

    public function receiveEventClick($postObj)
    {
        $data = array(
            'to_user_name' => $postObj->ToUserName,
            'from_user_name' => $postObj->FromUserName,
            'create_time' => date('Y-m-d H:i:s', $postObj->CreateTime),
            'msg_type' => $postObj->MsgType,
            'event' => $postObj->Event,
            'event_key' => $postObj->EventKey,
            'add_time' => date('Y-m-d H:i:s'),
        );
        $flag = D('message_record')->add($data);
        if ($flag) {
            return true;
        } else {
            return false;
        }
    }

    public function responseText($postObj)
    {
        $fromUsername = $postObj->FromUserName;
        $toUsername = $postObj->ToUserName;
        $keyword = trim($postObj->Content);
        $time = time();
        $textTpl = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[%s]]></MsgType>
<Content><![CDATA[%s]]></Content>
</xml>";
        if (!empty($keyword)) {
//            $where = array(
//                'msg_type' => 'text',
//                'keyword' => $keyword,
//            );
//            $result = D('message_material')->field('content')->where($where)->find();
            $msgType = "text";
            $result['content'] = '内容1';
            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $result['content']);
            echo $resultStr;
        } else {
            echo "请输入查询关键字";
        }
    }

    public function responseImage($postObj)
    {
        $fromUsername = $postObj->FromUserName;
        $toUsername = $postObj->ToUserName;
        $keyword = trim($postObj->Content);
        $time = time();
        $textTpl = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[%s]]></MsgType>
<Image>
<MediaId><![CDATA[%s]]></MediaId>
</Image>
</xml>";
        if (!empty($keyword)) {
            $msgType = "image";
            $imageStr = $postObj->MediaId;
            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $imageStr);
            echo $resultStr;
        } else {
            echo "请输入查询关键字";
        }
    }

    public function responseVoice($postObj)
    {
        $fromUsername = $postObj->FromUserName;
        $toUsername = $postObj->ToUserName;
        $keyword = trim($postObj->Content);
        $time = time();
        $textTpl = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[%s]]></MsgType>
<Voice>
<MediaId><![CDATA[%s]]></MediaId>
</Voice>
</xml>";
        if (!empty($keyword)) {
            $msgType = "voice";
            $voiceStr = $postObj->MediaId;
            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $voiceStr);
            echo $resultStr;
        } else {
            echo "请输入查询关键字";
        }
    }

    public function responseVideo($postObj)
    {
        $fromUsername = $postObj->FromUserName;
        $toUsername = $postObj->ToUserName;
        $keyword = trim($postObj->Content);
        $time = time();
        $textTpl = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[%s]]></MsgType>
<Video>
<MediaId><![CDATA[%s]]></MediaId>
<Title><![CDATA[%s]]></Title>
<Description><![CDATA[%s]]></Description>
</Video>
</xml>";
        if (!empty($keyword)) {
            $msgType = "video";
            $videoStr = $postObj->MediaId;
            $title = 'cy';
            $description = 'chenyang';
            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $videoStr, $title, $description);
            echo $resultStr;
        } else {
            echo "请输入查询关键字";
        }
    }

    public function responseMusic($postObj)
    {
        $fromUsername = $postObj->FromUserName;
        $toUsername = $postObj->ToUserName;
        $keyword = trim($postObj->Content);
        $time = time();
        $textTpl = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[%s]]></MsgType>
<Music>
<Title><![CDATA[%s]]></Title>
<Description><![CDATA[%s]]></Description>
<MusicUrl><![CDATA[%s]]></MusicUrl>
<HQMusicUrl><![CDATA[%s]]></HQMusicUrl>
<ThumbMediaId><![CDATA[%s]]></ThumbMediaId>
</Music>
</xml>";
        if (!empty($keyword)) {
            $msgType = "music";
            $title = 'cy';
            $description = 'chenyang';
            $musicurl = '';
            $hqmusicurl = '';
            $thumbmediaid = '';
            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $title, $description, $musicurl, $hqmusicurl, $thumbmediaid);
            echo $resultStr;
        } else {
            echo "请输入查询关键字";
        }
    }

    public function responseNews($postObj)
    {
        $textTpl1 = "<item>
<Title><![CDATA[%s]]></Title> 
<Description><![CDATA[%s]]></Description>
<PicUrl><![CDATA[%s]]></PicUrl>
<Url><![CDATA[%s]]></Url>
</item>";
        $list = array();
        $num = count($list);
        $itemStr = "";
        foreach ($list as $val) {
            $itemStr .= sprintf($textTpl1, $val['title'], $val['description'], $val['pic_url'], $val['url']);
        }
        $fromUsername = $postObj->FromUserName;
        $toUsername = $postObj->ToUserName;
        $keyword = trim($postObj->Content);
        $time = time();
        $textTpl = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[%s]]></MsgType>
<ArticleCount>%s</ArticleCount>
<Articles>
{$itemStr}
</Articles>
</xml>";
        if (!empty($keyword)) {
            $msgType = "news";
            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $num);
            echo $resultStr;
        } else {
            echo "请输入查询关键字";
        }
    }

    public function test()
    {
        $where = array(
            'msg_type' => 'text',
            'keyword' => '关键字1',
        );
        $result = D('message_material')->field('content')->where($where)->find();
        print_r($result);
    }
}