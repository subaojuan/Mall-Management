<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Email{
    private $_host;//要连接的邮件服务器
    private $_port = 25;
    private $_user;
    private $_pass;
    private $_debug = FALSE;//是否开启调试模式，默认关闭
    private $_sock;//保存与服务器连接的句柄
    private $_format;//标志用什么格式发送邮件：1、文本，2、HTML
    
    public function __construct($host,$user,$pass,$port=25,$format=1,$debug=FALSE) {
        $this->_host = $host;
        $this->_user = base64_encode($user);
        $this->_pass = base64_encode($pass);
        $this->_format = $format;
        $this->_debug = $debug;
        $this->_port = $port;
    }
    
    public function connect($ssl=FALSE){
        $errno = 0;
        $errstr = "";
        if(!$ssl){
            $this->_sock = fsockopen($this->_host, $this->_port,$errno,$errstr,10);
        }else{
            $remoteAddr = "tcp://" . $this->_host . ":" . $this->_port;
            $this->_sock = stream_socket_client($remoteAddr, $errno,$errstr,10);
            stream_socket_enable_crypto($this->_sock, true, STREAM_CRYPTO_METHOD_SSLv23_CLIENT);
            stream_set_blocking($this->_sock, 1); //设置阻塞模式
        }
        

        if(!$this->_sock){
            exit("Error number: $errno, Error message: $errstr.\n");
        }
        
        $response = fgets($this->_sock);
        if(strstr($response, "220") === FALSE){
            exit("server error:$response.\n");
        }
        return TRUE;
    }
    
    private function show_debug($msg,$step){
		
        if($this->_debug){
            echo "<p>$step <br/>Debug:$msg</p>\n";
        }
    }
    
    private function do_command($cmd, $return_code){
        fwrite($this->_sock, $cmd);
        
        $response = fgets($this->_sock);
        $this->show_debug($response,$cmd);
		
        if(strstr($response, "$return_code") === FALSE){
            
            return FALSE;
        }
        
        return TRUE;
    }
    
    private function is_mail($email){
        $parttren = "/^[^_][\w]*@[\w.]+[\w]*[^_]$/";
        if(preg_match($parttren, $email)){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    public function send_email($from,$to,$subject,$body){
        $separator = "----By.hzh.".uniqid(md5($from . time())); //分隔符
        
        if(!$this->is_mail($from) || !$this->is_mail($to)){
            $this->show_debug("Please enter valid email account.\n","send");
            return FALSE;
        }
        
        if(empty($subject) || empty($body)){
            $this->show_debug("Please enter subject/body.\n","send");
            exit();
        }
        
        $detail = "Date: ".date("r")."\r\n";
        $detail = "From: <".$from.">\r\n";
        $detail .= "To: <".$to.">\r\n";
        $detail .= "Subject: ".$subject."\r\n";
        $detail .= "Content-Type: multipart/alternative;\r\n";
        $detail .= "\t" . 'boundary="' . $separator . '"\r\n';//邮件头分隔符
        $detail .= "MIME-Version:1.0\r\n";
        $detail .= "\r\n--" . $separator . "\r\n";//从这里开始是邮件正文
        if($this->_format){
            $detail .= "Content-Type: text/html;\r\n";
        }  else {
            $detail .= "Content-Type: text/plain;\r\n";
        }
        
        $detail .= "charset = UTF-8;\r\n\r\n";
        $detail .= $body."\r\n";
        $detail .= "--".$separator . "\r\n";
        $detail .= "\r\n.\r\n";
        
        if(!$this->do_command("HELO $this->_host\r\n", 250) 
            || !$this->do_command("AUTH LOGIN\r\n", 334) 
            || !$this->do_command($this->_user."\r\n", 334) 
            || !$this->do_command($this->_pass."\r\n", 235) 
            || !$this->do_command("Mail FROM: <".$from.">\r\n", 250) 
            || !$this->do_command("RCPT TO: <".$to.">\r\n", 250)
            || !$this->do_command("DATA\r\n", 354) 
            || !$this->do_command($detail, 250) 
            || !$this->do_command("QUIT\r\n", 221)){
            exit("do_command error.\n");
        }
        return TRUE;
    }
}
