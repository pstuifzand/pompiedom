<?
error_reporting(E_ALL);

require_once 'config.inc.php';
require_once 'util.inc.php';


function database_init() {
    $link = mysql_connect(DB_HOST, DB_USER, DB_PASS);
    mysql_select_db(DB_DATABASE, $link); 
    return $link;
}

function get_messages($link) {
    $res = mysql_query("SELECT `message`, `created` FROM `tweet` ORDER BY `created` DESC LIMIT 15", $link);

    $messages = array();

    while ($row = mysql_fetch_assoc($res)) {
        $message = $row['message'];
        $message = linkify_html($message);
        $messages[] = array('message' => $message, 'created' => $row['created']);
    }
    return $messages;
}

function get_first_message($link) {
    $res = mysql_query("SELECT `message`, `created` FROM `tweet` ORDER BY `created` DESC LIMIT 1", $link);
    if ($row = mysql_fetch_assoc($res)) {
        $message = $row['message'];
        $message = linkify_html($message);
        return array('message' => $message, 'created' => $row['created']);
    }
    return false;
}

function save_message($link, $message) {
    $message = mysql_real_escape_string($message, $link);
    mysql_query("INSERT INTO `tweet` (`message`, `created`) VALUES('$message', UTC_TIMESTAMP())", $link);
    return true;
}

function client_messages($link, $lasttime=0) {
    $lasttime = mysql_real_escape_string($lasttime, $link);
    $res = mysql_query("SELECT `message`, UNIX_TIMESTAMP(`created`) AS `created` FROM `tweet` WHERE UNIX_TIMESTAMP(`created`) >= $lasttime ORDER BY `created` DESC LIMIT 15", $link);

    $messages = array();

    while ($row = mysql_fetch_assoc($res)) { 
        $message = $row['message'];
        $message = preg_replace('/\r?\n/', '\\n', $message);
        $messages[] = array('message' => $message, 'created' => $row['created']);
    }
    return $messages;
}


?>
