<?php

namespace Vendor\Helper;

class BasicHelper
{
    public static function baseUrl($url = '')
    {
        if ($url != '') {
            return ENV.$url;
        } else {
            return ENV;
        }
    }
    public static function appUrl($controller, $action)
    {
        return '/'.ENV.'/'.$controller.'/'.$action;
    }
    public static function redirect($header, $response_code, $controller, $action, $success = null, $error = null)
    {
        if (empty($success) && empty($error)) {
            self::msgReset();
        } else {
            if (!empty($success)) {
                self::msgSuccess($success);
            } else {
                self::msgError($error);
            }
        }
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN' && strpos($_SERVER['SERVER_SOFTWARE'], "Microsoft-IIS") !== FALSE) {
            header("HTTP/1.1 302 Redirect");
        } else {
            header($_SERVER['SERVER_PROTOCOL'].' '.$header);
            header("Status: ".http_response_code($response_code));
        }
        header('Location: '.self::appUrl($controller, $action));
        exit();
    }
    public static function redirectHome()
    {
        self::msgReset();
        header($_SERVER['SERVER_PROTOCOL'].' '.'ABITUR');
        header("Status: ".http_response_code(401));
        header('Location: /');
        exit();
    }
    public static function msgReset()
    {
        $_SESSION['ABITUR']['success_msg'] = null;
        $_SESSION['ABITUR']['error_msg'] = null;
    }
    public static function msgSuccess($msg)
    {
        $_SESSION['ABITUR']['success_msg'] = $msg;
        $_SESSION['ABITUR']['error_msg'] = null;
    }
    public static function msgError($msg)
    {
        $_SESSION['ABITUR']['success_msg'] = null;
        $_SESSION['ABITUR']['error_msg'] = $msg;
    }
    public static function getBrowser()
    {
        $u_agent = $_SERVER['HTTP_USER_AGENT'];
        $bname = 'Unknown';
        $platform = 'Unknown';
        $version= '';
        if (preg_match('/linux/i', $u_agent)) {
            $platform = 'linux';
        }
        elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
            $platform = 'mac';
        }
        elseif (preg_match('/windows|win32/i', $u_agent)) {
            $platform = 'windows';
        }
        if (preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) {
            $bname = 'Internet Explorer';
            $ub = 'MSIE';
        } elseif (preg_match('/Firefox/i',$u_agent))
        {
            $bname = 'Mozilla Firefox';
            $ub = 'Firefox';
        } elseif (preg_match('/Chrome/i',$u_agent)) {
            $bname = 'Google Chrome';
            $ub = 'Chrome';
        } elseif (preg_match('/Safari/i',$u_agent)) {
            $bname = 'Apple Safari';
            $ub = 'Safari';
        } elseif (preg_match('/Opera/i',$u_agent)) {
            $bname = 'Opera';
            $ub = 'Opera';
        } elseif (preg_match('/Netscape/i',$u_agent)) {
            $bname = 'Netscape';
            $ub = 'Netscape';
        }
        elseif (preg_match('/Mozilla/i',$u_agent))
        {
            $bname = 'Mozilla Firefox';
            $ub = 'Mozilla';
        }
        else
        {
            file_put_contents("/var/www/html/vhost_test/log.log", "\$ub браузер не определён. Пользователь:".$_SESSION['phpCAS']['user']."\n".var_export($u_agent,TRUE)."\n",FILE_APPEND);
        }
        $known = array('Version', $ub, 'other');
        $pattern = '#(?<browser>'.join('|', $known).')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
        if (!preg_match_all($pattern, $u_agent, $matches)) {
        }
        $i = count($matches['browser']);
        if ($i != 1) {

            if (strripos($u_agent,"Version") < strripos($u_agent,$ub)) {
                $version= $matches['version'][0];
            } else {
                $version= $matches['version'][1];
            }
        } else {
            $version= $matches['version'][0];
        }
        if ($version == null || $version == '') {
            $version = '?';
        }

        return [
            'userAgent' => $u_agent,
            'name' => $bname,
            'version' => $version,
            'platform' => $platform,
            'pattern' => $pattern
        ];
    }
    public static function checkBrowser($name, $version)
    {
        switch ($name) {
            case 'Mozilla Firefox':
                if ($version < 60) {
                    return 'update';
                } else {
                    return null;
                }
            case 'Google Chrome':
                if ($version < 67) {
                    return 'update';
                } else {
                    return null;
                }
            case 'Opera':
                if ($version < 53) {
                    return 'update';
                } else {
                    return null;
                }
            default:
                return 'install';
        }
    }
}