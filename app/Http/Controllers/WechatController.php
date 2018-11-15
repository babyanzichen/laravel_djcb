<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\libs\ipCity;
use jssdk; 
class WechatController extends Controller
{   


    public function api()
    {
        if (isset($_GET['echostr'])) {     //验证微信
            $this->valid();
        }else{                     //回复消息
             $this->responseMsg();
        }
    }




    private function valid()
    {
        $echoStr = $_GET["echostr"];
        if($this->checkSignature()){
            echo $echoStr;
            exit;
        }
    }

    private function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

        $token = "weixin";
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );

        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }


    //回复消息
    public function responseMsg()
    {
    $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
    if (!empty($postStr)){
         $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
        $RX_TYPE = trim($postObj->MsgType);

        switch ($RX_TYPE)
        {
            case "text":
                $resultStr = $this->receiveText($postObj);
                break;
            case "image":
                $resultStr = $this->receiveImage($postObj);
                break;
            case "location":
                $resultStr = $this->receiveLocation($postObj);
                break;
            case "voice":
                $resultStr = $this->receiveVoice($postObj);
                break;
            case "video":
                $resultStr = $this->receiveVideo($postObj);
                break;
            case "link":
                $resultStr = $this->receiveLink($postObj);
                break;
            case "event":
                $resultStr = $this->receiveEvent($postObj);
                break;
            default:
                $resultStr = "unknow msg type: ".$RX_TYPE;
                break;
        }
        echo $resultStr;
    }else {
        echo "";
        exit;
    }
    }
    
    //接收文本消息
    private function receiveText($object)
    {
        $keyword = trim($object->Content);
       // $url = "http://api100.duapp.com/movie/?appkey=DIY_miaomiao&name=".$keyword;
      //  $output = file_get_contents($url,$keyword);
       // $contentStr = json_decode($output, true);
        switch ($keyword) {
            case "j":
            $contentStr = DB::table('jokestable')
            ->orderBy(\DB::raw('RAND()'))
            ->take(1)
            ->value('content');
            break;
            case "h":
            $contentStr ="国博交通指引，请回复“1”；\n 车博会介绍，请回复“2”；\n免费抢电子门票，请回复“3”；\n ";
             break;
            case "2":
             $arr_item["title"]="武汉车博会|心在哪，风景就在哪";
            $arr_item["description"]="2017年第15届中国（武汉）国际汽车服务产业博览会暨第3届中国（武汉）国际汽车升级及改装展览会（简称武汉车博会）将于6月16日-18日，在中国之“心”——武汉盛大召开。";
            $arr_item["picurl"]="http://mmbiz.qpic.cn/mmbiz_jpg/jPjAicia0GJV8VaDqYfMnlE4Kxfum2cS8eFlw7MdLicYwRK5d2L8aPLibp1NkkkwfLS3g39xTU6Rb4rInicYvRRKiaKQ/640?wx_fmt=jpeg&tp=webp&wxfrom=5&wx_lazy=1";
            $arr_item["url"]="http://mp.weixin.qq.com/s/rqqpfxVJcO4-OLPC25ploA";
             break;
             case "3":
           $arr_item["title"]="武汉改装车展电子门票免费抢";
            $arr_item["description"]="想要第一时间抢到最火热的武汉改装车展门票，赶紧猛戳我领取吧";
            $arr_item["picurl"]="http://www.djcb123.com/filePathRoot/20170516/20170516145531_152.png";
            $arr_item["url"]="http://dwz.cn/5XByUg";
             break;
             case "1":
            $arr_item["title"]="武汉国博中心最全交通指引，请收藏";
            $arr_item["description"]="去武汉看车博会担心迷路？最新的国博交通指引，请收藏。";
            $arr_item["picurl"]="https://mmbiz.qlogo.cn/mmbiz_jpg/KXnDcZPrrFr3Dz6uC2vxmGldOJjYJ6XXCzp7DxV20jcgIB8P69jp8A5EnyFlY1SlEG7ia4tT5oJ5TaZjKpGCohQ/0?wx_fmt=jpeg";
            $arr_item["url"]="http://mp.weixin.qq.com/s/E7tTLx1gMmF0vqnFEuNkJw";
             break;
            default:
                # code...
            $contentStr="小宝是机器人，还没成长的足够强大，所以偶尔不能理解您的指令。等我们客服姐姐来了，她会认真回复您。获取帮助请回复“h”。";
                break;
        }
        if (isset($arr_item)&&is_array($arr_item)){
            $resultStr = $this->transmitNews($object,$arr_item);
        }else{
            $resultStr = $this->transmitText($object, $contentStr);
        }
        return $resultStr;
    }

    
    //接收事件，关注等
    private function receiveEvent($object)
    {
       $contentStr = "";
       $eventType=trim($object->Event);
        switch ($eventType)
        {
            case "subscribe":
                $contentStr = "参观「武汉国际改装车展」：\n点菜单“门票”，\n登记信息提交就可以免费拿到门票啦！
快把消息告诉小伙伴吧~！\n获取更多帮助请回复“h”。";    //关注后回复内容
                $resultStr = $this->transmitText($object, $contentStr);
                return $resultStr;
                break;
            case "unsubscribe":
                $contentStr = "";
                break;
            case "CLICK":
                $resultStr=$this->receiveClick($object);    //点击事件
               return $resultStr;
                break;
            default:
                $contentStr = "receive a new event: ".$object->Event;
                break;
        }
        
        
    }
    
    //接收图片
    private function receiveImage($object)
    {
        $contentStr = "你发送的是图片，地址为：".$object->PicUrl;
        $resultStr = $this->transmitText($object, $contentStr);
        return $resultStr;
    }
    
    
    //接收语音
    private function receiveVoice($object)
    {
        $contentStr = "你发送的是语音，媒体ID为：".$object->MediaId;
        $resultStr = $this->transmitText($object, $contentStr);
        return $resultStr;
    }
    
    //接收视频
    private function receiveVideo($object)
    {
        $contentStr = "你发送的是视频，媒体ID为：".$object->MediaId;
        $resultStr = $this->transmitText($object, $contentStr);
        return $resultStr;
    }
    
    //位置消息
    private function receiveLocation($object)
    {
        $contentStr = "你发送的是位置，纬度为：".$object->Location_X."；经度为：".$object->Location_Y."；缩放级别为：".$object->Scale."；位置为：".$object->Label;
        $resultStr = $this->transmitText($object, $contentStr);
        return $resultStr;
    }
    
    //链接消息
    private function receiveLink($object)
    {
        $contentStr = "你发送的是链接，标题为：".$object->Title."；内容为：".$object->Description."；链接地址为：".$object->Url;
        $resultStr = $this->transmitText($object, $contentStr);
        return $resultStr;
    }
    
    
   //点击菜单消息
    private function receiveClick($object)
    {   
       // $resultStr="";
         switch ($object->EventKey)
         {
            
             
             case "map":
             $media_id = "yAKhlHPsCMEkf9XeKJPfOjVqNSZ2_RXPU7JlKzbAKcDj4IRy3DccPGyhsMxnFv4a";
             break;
             
           
             
             default:
             $contentStr = "你点击了菜单: ".$object->EventKey;
             break;
         }
        
        
      
            $resultStr = $this->transmitImage($object, $media_id);
       
        return  $resultStr;
    }
    
    //回复文本消息
    private function transmitText($object, $content)
    {
        $textTpl = "<xml>
        <ToUserName><![CDATA[%s]]></ToUserName>
        <FromUserName><![CDATA[%s]]></FromUserName>
        <CreateTime>%s</CreateTime>
        <MsgType><![CDATA[text]]></MsgType>
        <Content><![CDATA[%s]]></Content>
        </xml>";
        $resultStr = sprintf($textTpl, $object->FromUserName, $object->ToUserName, time(), $content);
        return $resultStr;
    }    
    /*回复图片*/
    private function transmitImage($object, $media_id)
    {
        $imageTpl = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[image]]></MsgType>
<Image>
<MediaId><![CDATA[%s]]></MediaId>
</Image>
</xml>";
        $resultStr = sprintf($imageTpl, $object->FromUserName, $object->ToUserName, time(), $media_id);
        return $resultStr;
    }
    
    
    //回复图文
    private function transmitNews($object, $arr_item)
    {
        
        $itemTpl = " <xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[news]]></MsgType>
<ArticleCount>1</ArticleCount>
<Articles>
<item>
<Title><![CDATA[%s]]></Title> 
<Description><![CDATA[%s]]></Description>
<PicUrl><![CDATA[%s]]></PicUrl>
<Url><![CDATA[%s]]></Url>
</item>
</Articles>
</xml>";
        
            $resultStr = sprintf($itemTpl,$object->FromUserName, $object->ToUserName, time(),$arr_item['title'], $arr_item['description'], $arr_item['picurl'], $arr_item['url']);
       
        return $resultStr;
    }
    
    
    //音乐消息
    private function transmitMusic($object, $musicArray, $flag = 0)
    {
        $itemTpl = "<Music>
        <Title><![CDATA[%s]]></Title>
        <Description><![CDATA[%s]]></Description>
        <MusicUrl><![CDATA[%s]]></MusicUrl>
        <HQMusicUrl><![CDATA[%s]]></HQMusicUrl>
        </Music>";
        $item_str = sprintf($itemTpl, $musicArray['Title'], $musicArray['Description'], $musicArray['MusicUrl'], $musicArray['HQMusicUrl']);
        $textTpl = "<xml>
        <ToUserName><![CDATA[%s]]></ToUserName>
        <FromUserName><![CDATA[%s]]></FromUserName>
        <CreateTime>%s</CreateTime>
        <MsgType><![CDATA[music]]></MsgType>
        $item_str
        <FuncFlag>%d</FuncFlag>
        </xml>"; 
       $resultStr = sprintf($textTpl, $object->FromUserName, $object->ToUserName, time(), $flag);
        return $resultStr;
    }
}
?>