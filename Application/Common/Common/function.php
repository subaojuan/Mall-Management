<?php
require 'email.php';
// 有选择性的过滤XSS --》 说明：性能非常低-》尽量少用
function removeXSS($data)
{
    require_once './HtmlPurifier/HTMLPurifier.auto.php';
    $_clean_xss_config = HTMLPurifier_Config::createDefault();
    $_clean_xss_config->set('Core.Encoding', 'UTF-8');
    // 设置保留的标签
    $_clean_xss_config->set('HTML.Allowed', 'div,b,strong,i,em,a[href|title],ul,ol,li,p[style],br,span[style],img[width|height|alt|src]');
    $_clean_xss_config->set('CSS.AllowedProperties', 'font,font-size,font-weight,font-style,font-family,text-decoration,padding-left,color,background-color,text-align');
    $_clean_xss_config->set('HTML.TargetBlank', TRUE);
    $_clean_xss_obj = new HTMLPurifier($_clean_xss_config);
    // 执行过滤
    return $_clean_xss_obj->purify($data);
}

//创建发送邮件的函数
function SendMail($to, $subject, $con)
{
    $host = "smtp.qq.com";
    $user = "2754634384@qq.com";
    $pass = "vcqeysqlkshhddba";
    $port = 465;
    $from = "2754634384@qq.com";
    $to = $to;
    $subject = $subject;
    $con = $con;
    $email = new Email($host, $user, $pass, $port, $format = 1, $debug = false);
    $email->connect(TRUE);
    if ($email->send_email($from, $to, $subject, $con)) {
        return true;
    } else {
        return false;
    }

}
