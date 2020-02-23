
<?php
/**
 * functions
 * 
 * @package techzy-php-core
 * @author AkashSingh
 */


/* ------------------------------- */
/* Core */
/* ------------------------------- */

/**
 * check_system_requirements
 * 
 * @return void
 */
function check_system_requirements() {
    /* set required php version*/
    $required_php_version = '5.5';
    /* check php version */
    $php_version = phpversion();
    if(version_compare( $required_php_version, $php_version, '>')) {
    }
    /* check if mysqli enabled */
    if(!extension_loaded('mysqli')) {
    }
    /* check if curl enabled */
    if(!extension_loaded('curl')) {
    }
    /* check if intl enabled */
    if(!extension_loaded('intl')) {
    }
    /* check if json_decode enabled */
    if(!function_exists('json_decode')) {
    }
    /* check if base64_decode enabled */
    if(!function_exists('base64_decode')) {
    }
    /* check if mail enabled */
    if(!function_exists('mail')) {
    }
    if(!function_exists('getimagesize')) {
    }
}




/**
 * get_system_protocol
 * 
 * @return string
 */
function get_system_protocol() {
    $is_secure = false;
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
        $is_secure = true;
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' || !empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on') {
        $is_secure = true;
    }
    return $is_secure ? 'https' : 'http';
}


/**
 * get_system_url
 * 
 * @return string
 */
function get_system_url() {
    $protocol = get_system_protocol();
    $system_url =  $protocol."://".$_SERVER['HTTP_HOST'].BASEPATH;
    return rtrim($system_url,'/');
}


/**
 * check_system_url
 * 
 * @return void
 */
function check_system_url() {
    $protocol = get_system_protocol();
    $parsed_url = parse_url(SYS_URL);
    if( ($parsed_url['scheme'] != $protocol) || ($parsed_url['host'] != $_SERVER['HTTP_HOST']) ) {
        header('Location: '.SYS_URL);
    }
}


/**
 * redirect
 * 
 * @param string $url
 * @return void
 */
function redirect($url = '') {
    if($url) {
        header('Location: '.SYS_URL.$url);
    } else {
        header('Location: '.SYS_URL);
    }
    exit;
}



/* ------------------------------- */
/* Security */
/* ------------------------------- */

/**
 * secure
 * 
 * @param string $value
 * @param string $type
 * @param boolean $quoted
 * @return string
 */
function secure($value, $type = "", $quoted = true) {
    global $db;
    if($value !== 'null') {
        // [1] Sanitize
        /* Escape all (single-quote, double quote, backslash, NULs) */
        if(get_magic_quotes_gpc()) {
            $value = stripslashes($value);
        }
        /* Convert all applicable characters to HTML entities */
        $value = htmlentities($value, ENT_QUOTES, 'utf-8');
        // [2] Safe SQL
        $value = $db->real_escape_string($value);
        switch ($type) {
            case 'int':
                $value = ($quoted)? "'".intval($value)."'" : intval($value);
                break;
            case 'datetime':
                $value = ($quoted)? "'".set_datetime($value)."'" : set_datetime($value);
                break;
            case 'search':
                if($quoted) {
                    $value = (!is_empty($value))? "'%".$value."%'" : "''";
                } else {
                    $value = (!is_empty($value))? "'%%".$value."%%'" : "''";
                }
                break;
            default:
                $value = (!is_empty($value))? "'".$value."'" : "''";
                break;
        }
    }
    return $value;
}


/**
 * session_hash
 * 
 * @param string $hash
 * @return array
 */
function session_hash($hash) {
}


/**
 * _password_hash
 * 
 * @param string $password
 * @return string
 */
function _password_hash($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}


/**
 * get_hash_key
 * 
 * @param integer $length
 * @return string
 */
function get_hash_key($length = 8) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $count = mb_strlen($chars);
    for ($i = 0, $result = ''; $i < $length; $i++) {
        $index = rand(0, $count - 1);
        $result .= mb_substr($chars, $index, 1);
    }
    return $result;
}


/**
 * get_hash_token
 * 
 * @return string
 */
function get_hash_token() {
    return md5(time()*rand(1, 9999));
}



/* ------------------------------- */
/* Validation */
/* ------------------------------- */

/**
 * is_ajax
 * 
 * @return void
 */
function is_ajax() {
    if( !isset($_SERVER['HTTP_X_REQUESTED_WITH']) || ($_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest') ) {
        redirect();
    }
}


/**
 * is_empty
 * 
 * @param string $value
 * @return boolean
 */
function is_empty($value) {
    if(strlen(trim(preg_replace('/\xc2\xa0/',' ',$value))) == 0) {
        return true;
    } else {
        return false;
    }
}


/**
 * valid_email
 * 
 * @param string $email
 * @return boolean
 */
function valid_email($email) {
    if(filter_var($email, FILTER_VALIDATE_EMAIL) !== false) {
        return true;
    } else {
        return false;
    }
}


/**
 * valid_url
 * 
 * @param string $url
 * @return boolean
 */
function valid_url($url) {
    if(filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_HOST_REQUIRED) !== false) {
        return true;
    } else {
        return false;
    }
}


/**
 * valid_username
 * 
 * @param string $username
 * @return boolean
 */
function valid_username($username) {
    if(strlen($username) >= 3 && preg_match('/^[a-zA-Z0-9]+([_|.]?[a-zA-Z0-9])*$/', $username)) {
        return true;
    } else {
        return false;
    }
}


/**
 * reserved_username
 * 
 * @param string $username
 * @return boolean
 */
function reserved_username($username) {
    $reserved_usernames = array('install', 'static', 'contact', 'contacts', 'sign', 'signin', 'login', 'signup', 'register', 'signout', 'logout', 'reset', 'activation', 'connect', 'revoke', 'packages', 'started', 'search', 'friends', 'messages', 'message', 'notifications', 'notification', 'settings', 'setting', 'posts', 'post', 'photos', 'photo', 'create', 'pages', 'page', 'groups', 'group', 'events', 'event', 'games', 'game', 'saved', 'forums', 'forum', 'blogs', 'blog', 'articles', 'article', 'directory', 'products', 'product', 'market', 'admincp', 'admin', 'admins', 'chat', 'ads', 'wallet', 'boosted', 'people');
    if(in_array(strtolower($username), $reserved_usernames)) {
        return true;
    } else {
        return false;
    }
}


/**
 * valid_name
 * 
 * @param string $name
 * @return boolean
 */
function valid_name($name) {
    if(preg_match('/[\'^£$%&*()}{@#~?><>,|=+¬]/', $name)) {
        return false;
    } else {
        return true;
    }
}


/**
 * valid_location
 * 
 * @param string $location
 * @return boolean
 */
function valid_location($location) {
    if(preg_match("/^[\\p{L} \-,()0-9]+$/ui", $location)) {
        return true;
    } else {
        return false;
    }
}


/**
 * valid_extension
 * 
 * @param string $extension
 * @param array $allowed_extensions
 * @return boolean
 */
function valid_extension($extension, $allowed_extensions) {
    $extensions = explode(',', $allowed_extensions);
    foreach ($extensions as $key => $value) {
        $extensions[$key] = strtolower(trim($value));
    }
    if(is_array($extensions) && in_array($extension, $extensions)) {
        return true;
    }
    return false;
}



/* ------------------------------- */
/* Date */
/* ------------------------------- */

/**
 * set_datetime
 * 
 * @param string $date
 * @return string
 */
function set_datetime($date) {
    return date("Y-m-d H:i:s", strtotime($date));
}


/**
 * get_datetime
 * 
 * @param string $date
 * @return string
 */
function get_datetime($date) {
    return date("m/d/Y g:i A", strtotime($date));
}



/* ------------------------------- */
/* JSON */
/* ------------------------------- */

/**
 * _json_decode
 * 
 * @param string $string
 * @return string
 */
function _json_decode($string) {
    if(get_magic_quotes_gpc()) $string = stripslashes($string);
    return json_decode($string);
}


/**
 * return_json
 * 
 * @param array $response
 * @return json
 */
function return_json($response = array()) {
    header('Content-Type: application/json');
    exit(json_encode($response));
}



/* ------------------------------- */
/* Error */
/* ------------------------------- */

/**
 * _error
 * 
 * @return void
 */
function _error() {
    $args = func_get_args();
    if(count($args) > 1) {
        $title = $args[0];
        $message = $args[1];
    } else {
        switch ($args[0]) {
            case 'DB_ERROR':
                $title = "Database Error";
                $message = "<div class='text-left'><h1>"."Error establishing a database connection"."</h1>
                            <p>"."This either means that the username and password information in your config.php file is incorrect or we can't contact the database server at localhost. This could mean your host's database server is down."."</p>
                            <ul>
                                <li>"."Are you sure you have the correct username and password?"."</li>
                                <li>"."Are you sure that you have typed the correct hostname?"."</li>
                                <li>"."Are you sure that the database server is running?"."</li>
                            </ul>
                            <p>"."If you're unsure what these terms mean you should probably contact your host. If you still need help you can always visit the"." <a href='http://support.zamblek.com'>"."Sngine Support".".</a></p>
                            </div>";
                break;

            case 'SQL_ERROR':
                $title = "Database Error";
                $message = "An error occurred while writing to database. Please try again later";
                if(DEBUGGING) {
                    $backtrace = debug_backtrace();
                    $line=$backtrace[0]['line'];
                    $file=$backtrace[0]['file'];
                    $message .= "<br><br><small>This error function was called from line $line in file $file</small>";
                }
                break;

            case 'SQL_ERROR_THROWEN':
                $message = ("An error occurred while writing to database. Please try again later");
                if(DEBUGGING) {
                    $backtrace = debug_backtrace();
                    $line=$backtrace[0]['line'];
                    $file=$backtrace[0]['file'];
                    $message .= "<br><br><small>This error function was called from line $line in file $file</small>";
                }
                throw new Exception($message);
                break;

            case '404':
                header('HTTP/1.0 404 Not Found');
                $title ="404 Not Found";
                $message ="The requested URL was not found on this server. That's all we know";
                if(DEBUGGING) {
                    $backtrace = debug_backtrace();
                    $line=$backtrace[0]['line'];
                    $file=$backtrace[0]['file'];
                    $message .= "<br><br><small>This error function was called from line $line in file $file</small>";
                }
                break;

            case '400':
                header('HTTP/1.0 400 Bad Request');
                if(DEBUGGING) {
                    $backtrace = debug_backtrace();
                    $line=$backtrace[0]['line'];
                    $file=$backtrace[0]['file'];
                    exit("This error function was called from line $line in file $file");
                }
                exit;

            case '403':
                header('HTTP/1.0 403 Access Denied');
                if(DEBUGGING) {
                    $backtrace = debug_backtrace();
                    $line=$backtrace[0]['line'];
                    $file=$backtrace[0]['file'];
                    exit("This error function was called from line $line in file $file");
                }
                exit;
            
            default:
                $title = "Error";
                $message = "There is some thing went wrong";
                if(DEBUGGING) {
                    $backtrace = debug_backtrace();
                    $line=$backtrace[0]['line'];
                    $file=$backtrace[0]['file'];
                    $message .= "<br><br>"."<small>This error function was called from line $line in file $file</small>";
                }
                break;
        }
    }
    echo '<!DOCTYPE html>
            <html>
            <head>
                <meta charset="utf-8">
                <title>'.$title.'</title>
                <style type="text/css">
                    html {
                        background: #f1f1f1;
                    }
                    body {
                        color: #555;
                        font-family: "Open Sans", Arial,sans-serif;
                        margin: 0;
                        padding: 0;
                    }
                    .error-title {
                        background: #ce3426;
                        color: #fff;
                        text-align: center;
                        font-size: 34px;
                        font-weight: 100;
                        line-height: 50px;
                        padding: 60px 0;
                    }
                    .error-message {
                        margin: 1em auto;
                        padding: 1em 2em;
                        max-width: 600px;
                        font-size: 1em;
                        line-height: 1.8em;
                        text-align: center;
                    }
                    .error-message .code,
                    .error-message p {
                        margin-top: 0;
                        margin-bottom: 1.3em;
                    }
                    .error-message .code {
                        font-family: Consolas, Monaco, monospace;
                        background: rgba(0, 0, 0, 0.7);
                        padding: 10px;
                        color: rgba(255, 255, 255, 0.7);
                        word-break: break-all;
                        border-radius: 2px;
                    }
                    h1 {
                        font-size: 1.2em;
                    }
                    
                    ul li {
                        margin-bottom: 1em;
                        font-size: 0.9em;
                    }
                    a {
                        color: #ce3426;
                        text-decoration: none;
                    }
                    a:hover {
                        text-decoration: underline;
                    }
                    .button {
                        background: #f7f7f7;
                        border: 1px solid #cccccc;
                        color: #555;
                        display: inline-block;
                        text-decoration: none;
                        margin: 0;
                        padding: 5px 10px;
                        cursor: pointer;
                        -webkit-border-radius: 3px;
                        -webkit-appearance: none;
                        border-radius: 3px;
                        white-space: nowrap;
                        -webkit-box-sizing: border-box;
                        -moz-box-sizing:    border-box;
                        box-sizing:         border-box;

                        -webkit-box-shadow: inset 0 1px 0 #fff, 0 1px 0 rgba(0,0,0,.08);
                        box-shadow: inset 0 1px 0 #fff, 0 1px 0 rgba(0,0,0,.08);
                        vertical-align: top;
                    }

                    .button.button-large {
                        height: 29px;
                        line-height: 28px;
                        padding: 0 12px;
                    }

                    .button:hover,
                    .button:focus {
                        background: #fafafa;
                        border-color: #999;
                        color: #222;
                        text-decoration: none;
                    }

                    .button:focus  {
                        -webkit-box-shadow: 1px 1px 1px rgba(0,0,0,.2);
                        box-shadow: 1px 1px 1px rgba(0,0,0,.2);
                    }

                    .button:active {
                        background: #eee;
                        border-color: #999;
                        color: #333;
                        -webkit-box-shadow: inset 0 2px 5px -3px rgba( 0, 0, 0, 0.5 );
                        box-shadow: inset 0 2px 5px -3px rgba( 0, 0, 0, 0.5 );
                    }
                    .text-left {
                        text-align: left;
                    }
                    .text-center {
                        text-align: center;
                    }
                </style>
            </head>
            <body>
                <div class="error-title">'.$title.'</div>
                <div class="error-message">'.$message.'</div>
            </body>
            </html>';
    exit;
}




/**
 * modal
 * 
 * @return json
 */
function modal() {
    $args = func_get_args();
    switch ($args[0]) {
        case 'LOGIN':
            return_json( array("callback" => "modal('#modal-login')") );
            break;
        case 'MESSAGE':
            return_json( array("callback" => "modal('#modal-message', {title: '".$args[1]."', message: '".addslashes($args[2])."'})") );
            break;
        case 'ERROR':
            return_json( array("callback" => "modal('#modal-error', {title: '".$args[1]."', message: '".addslashes($args[2])."'})") );
            break;
        case 'SUCCESS':
            return_json( array("callback" => "modal('#modal-success', {title: '".$args[1]."', message: '".addslashes($args[2])."'})") );
            break;
        default:
            if(isset($args[1])) {
                return_json( array("callback" => "modal('".$args[0]."', ".$args[1].")") );
            } else {
                return_json( array("callback" => "modal('".$args[0]."')") );
            }
            break;
    }
}



/**
 * decode_urls
 * 
 * @param string $text
 * @return string
 */
function decode_urls($text) {
    $text = preg_replace('/(https?:\/\/[^\s]+)/', "<a target='_blank' href=\"$1\">$1</a>", $text);
    return $text;
}


/**
 * decode_hashtag
 * 
 * @param string $text
 * @return string
 */
function decode_hashtag($text) {
    global $system;
    $pattern = '/(#|\x{ff03}){1}([0-9_\p{L}]*[_\p{L}][0-9_\p{L}]*)/u';
    $text = preg_replace($pattern, '<a href="'.$system['system_url'].'/search/hashtag/$2">$0</a>', $text);
    return $text;
}


/**
 * decode_mention
 * 
 * @param string $text
 * @return string
 */
function decode_mention($text) {
    global $user;
    $text = preg_replace_callback('/\[([a-z0-9._]+)\]/i', array($user, 'get_mentions'), $text);
    return $text;
}


/**
 * decode_text
 * 
 * @param string $string
 * @return string
 */
function decode_text($string) { 
    return base64_decode($string);
}




/**
 * censored_words
 * 
 * @param string $text
 * @return string
 */
function censored_words($text) {
    global $system;
    if($system['censored_words_enabled']) {
        $bad_words = explode(',', $system['censored_words']);
        if(count($bad_words) > 0) {
            foreach($bad_words as $word) {
                $pattern = '/\b'.$word.'\b/i';
                $text = preg_replace($pattern, str_repeat('*', strlen($word)), $text);
            }
        }
    }
    return $text;
}



/* ------------------------------- */
/* General */
/* ------------------------------- */

/**
 * get_picture
 * 
 * @param string $picture
 * @param string $type
 * @return string
 */
function get_picture($picture, $type) {
//login to return image location based on type will deside later
}


/**
 * get_ip
 * 
 * @return string
 */
function get_user_ip() {
    /* handle CloudFlare IP addresses */
    return (isset($_SERVER["HTTP_CF_CONNECTING_IP"])?$_SERVER["HTTP_CF_CONNECTING_IP"]:$_SERVER['REMOTE_ADDR']);
}


/**
 * get_os
 * 
 * @return string
 */
function get_user_os() {
    $os_platform = "Unknown OS Platform";
    $os_array = array(
        '/windows nt 10/i'      =>  'Windows 10',
        '/windows nt 6.3/i'     =>  'Windows 8.1',
        '/windows nt 6.2/i'     =>  'Windows 8',
        '/windows nt 6.1/i'     =>  'Windows 7',
        '/windows nt 6.0/i'     =>  'Windows Vista',
        '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
        '/windows nt 5.1/i'     =>  'Windows XP',
        '/windows xp/i'         =>  'Windows XP',
        '/windows nt 5.0/i'     =>  'Windows 2000',
        '/windows me/i'         =>  'Windows ME',
        '/win98/i'              =>  'Windows 98',
        '/win95/i'              =>  'Windows 95',
        '/win16/i'              =>  'Windows 3.11',
        '/macintosh|mac os x/i' =>  'Mac OS X',
        '/mac_powerpc/i'        =>  'Mac OS 9',
        '/linux/i'              =>  'Linux',
        '/ubuntu/i'             =>  'Ubuntu',
        '/iphone/i'             =>  'iPhone',
        '/ipod/i'               =>  'iPod',
        '/ipad/i'               =>  'iPad',
        '/android/i'            =>  'Android',
        '/blackberry/i'         =>  'BlackBerry',
        '/webos/i'              =>  'Mobile'
    );
    foreach($os_array as $regex => $value) {
        if(preg_match($regex, $_SERVER['HTTP_USER_AGENT'])) {
            $os_platform = $value;
        }
    }   
    return $os_platform;
}


/**
 * get_browser
 * 
 * @return string
 */
function get_user_browser() {
    $browser = "Unknown Browser";
    $browser_array = array(
        '/msie/i'       =>  'Internet Explorer',
        '/firefox/i'    =>  'Firefox',
        '/safari/i'     =>  'Safari',
        '/chrome/i'     =>  'Chrome',
        '/edge/i'       =>  'Edge',
        '/opera/i'      =>  'Opera',
        '/netscape/i'   =>  'Netscape',
        '/maxthon/i'    =>  'Maxthon',
        '/konqueror/i'  =>  'Konqueror',
        '/mobile/i'     =>  'Handheld Browser'
    );
    foreach($browser_array as $regex => $value) {
        if(preg_match($regex, $_SERVER['HTTP_USER_AGENT'])) {
            $browser = $value;
        }
    }
    return $browser;
}


/**
 * get_extension
 * 
 * @param string $path
 * @return string
 */
function get_extension($path) {
    return strtolower(pathinfo($path, PATHINFO_EXTENSION));
}


/**
 * ger_origenal_url
 * 
 * @param string $url
 * @return string
 */
function ger_origenal_url($url) {
    stream_context_set_default(array(
        'http' => array(
            'ignore_errors' => true,
            'method' => 'HEAD',
            'user_agent' => @$_SERVER['HTTP_USER_AGENT'],
        )
    ));
    $headers = get_headers($url, 1);
    if ($headers !== false && (isset($headers['location']) || isset($headers['Location']))) {
        $location = (isset($headers['location']))? $headers['location'] : $headers['Location'];
        return is_array($location) ? array_pop($location) : $location;
    }
    return $url;
}


/**
 * get_url_text
 * 
 * @param string $string
 * @param integer $length
 * @return string
 */
function get_url_text($string, $length = 10) {
    $string = htmlspecialchars_decode($string, ENT_QUOTES);
    $string = preg_replace('/[^\\pL\d]+/u', '-', $string);
    $string = trim($string, '-');
    $words = explode("-",$string);
    if(count($words) > $length) {
        $string = "";
        for($i = 0; $i < $length; $i++) {
            $string .= "-".$words[$i];
        }
        $string = trim($string, '-');
    }
    return $string;
}


/**
 * remove_querystring_var
 * 
 * @param string $url
 * @param string $key
 * @return string
 */
function remove_querystring_var($url, $key) { 
    $url = preg_replace('/(.*)(?|&)' . $key . '=[^&]+?(&)(.*)/i', '$1$2$4', $url . '&'); 
    $url = substr($url, 0, -1); 
    return $url; 
}


/**
 * get_snippet_text
 * 
 * @param string $string
 * @return string
 */
function get_snippet_text($string) {
    $string = htmlspecialchars_decode($string, ENT_QUOTES);
    $string = strip_tags($string);
    return $string;
}


/**
 * get_tag
 * 
 * @param string $string
 * @return string
 */
function get_tag($string) {
    $string = trim($string);
    $string = preg_replace('/[^\\pL\d]+/u', '_', $string);
    return $string;
}


/**
 * get_youtube_id
 * 
 * @param string $url
 * @return string
 */
function get_youtube_id($url) {
    preg_match('/youtube\.com\/embed\/([^\&\?\/]+)/', $url, $id);
    return $id[1];
}


/**
 * get_array_key
 * 
 * @param array $array
 * @param integer $current
 * @param integer $offset
 * @return mixed
 */
function get_array_key($array, $current, $offset = 1) {
    $keys = array_keys($array);
    $index = array_search($current, $keys);
    if(isset($keys[$index + $offset])) {
        return $keys[$index + $offset];
    }
    return false;
}

?>