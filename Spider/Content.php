<?php

class Content
{
    private static $instance;
    protected static $url = 'http://mp.weixin.qq.com/s?__biz=MjM5NDAwMTA2MA==&amp;mid=2695729619&amp;idx=1&amp;sn=8be0b6bd0210cee0d492ebdf20f7371f&amp;chksm=83d74818b4a0c10ef286b33bb7deb73226125f866ddb5b2781166066a69afef3705eabdb3b85&amp;scene=4#wechat_redirect';

    public static function instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Content();
        }
        return self::$instance;
    }

    private function __construct()
    {
    }

    public function getContent()
    {
        $html = file_get_contents(self::$url);
        preg_match_all("/id=\"js_content\">(.*)<script/iUs", $html, $content, PREG_PATTERN_ORDER);
        $content = "<div id='js_content'>" . $content[1][0];
        print_r($content);
    }
}

Content::instance()->getContent();
