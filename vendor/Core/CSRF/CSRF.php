<?php

namespace Vendor\Core\CSRF;

class CSRF
{

    public function random_string(int $strength = 16) {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $input_length = strlen($permitted_chars);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $permitted_chars[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }

        return $random_string;
    }

    public function setCSRF()
    {
        $len = 16;
        $token = $this->random_string($len);
        $_SESSION['CSRF'] = $token;
        return $token;
    }
    public function get_captcha(string $string)
    {
        define("img_dir", ROOT_DIR . "content/images/");
        define("font_dir", ROOT_DIR . "content/fonts/");
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s", 10000) . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header("Content-Type:image/png");
        $linenum = rand(3, 7);
        $img_arr = ['captcha.png'];
        $font_arr = array();
        $font_arr[0]["fname"] = "DroidSans.ttf";
        $font_arr[0]["size"] = rand(20, 30);
        $n = rand(0,sizeof($font_arr)-1);
        $img_fn = $img_arr[rand(0, sizeof($img_arr)-1)];
        $im = imagecreatefrompng (img_dir . $img_fn);
        for ($i=0; $i<$linenum; $i++)
        {
            $color = imagecolorallocate($im, rand(0, 150), rand(0, 100), rand(0, 150));
            imageline($im, rand(0, 20), rand(1, 50), rand(150, 180), rand(1, 50), $color);
        }
        $color = imagecolorallocate($im, rand(0, 200), 0, rand(0, 200));
        $x = rand(10,20);
        for($i = 0; $i < strlen($string); $i++) {
            $x+=15;
            $letter=substr($string, $i, 1);
            imagettftext ($im, $font_arr[$n]["size"], rand(2, 4), $x, rand(30,40), $color, font_dir.$font_arr[$n]["fname"], $letter);
        }
        for ($i=0; $i<$linenum; $i++)
        {
            $color = imagecolorallocate($im, rand(0, 255), rand(0, 200), rand(0, 255));
            imageline($im, rand(0, 20), rand(1, 50), rand(150, 180), rand(1, 50), $color);
        }
        ImagePNG ($im);
        ImageDestroy ($im);
    }
}