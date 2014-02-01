<?php

/*
Title:      PHP Blink
URL:        http://github.com/jamiebicknell/PHP-Blink
Author:     Jamie Bicknell
Twitter:    @jamiebicknell
*/

class Blink {
    
    public static $path = 'sudo /blink1-tool';
    public static $fade = 50;
    
    public static function rgb($hex) {
        list($r,$g,$b) = self::hex2rgb($hex);
        self::command('-t 500 -m '.self::$fade.' --rgb '.$r.','.$g.','.$b);
    }
    
    public static function test() {
        if(self::command('--version')=='no blink(1) devices found') {
            return false;
        }
        return true;
    }
    
    public static function send($pattern,$loop = 1) {
        if(!self::test()) {
            return false;
        }
        $pattern = implode('|#000,500|',array_fill(0,$loop,trim($pattern,'|')));
        $segments = explode('|',$pattern);
        foreach($segments as $segment) {
            list($colour,$duration) = explode(',',$segment);
            self::rgb($colour);
            usleep(max(self::$fade,$duration)*1000);
        }
        self::rgb('#000');
        return true;
    }
    
    private static function hex2rgb($hex) {
        $hex = preg_replace('/[^0-9A-F]/i','',$hex);
        $hex = isset($hex[3]) ? $hex : $hex[0].$hex[0].$hex[1].$hex[1].$hex[2].$hex[2];
    	$dec = hexdec($hex);
    	return array(0xFF&($dec>>0x10),0xFF&($dec>>0x8),0xFF&$dec);
    }
    
    private static function command($cmd) {
        return exec(self::$path.' '.$cmd);
    }

}