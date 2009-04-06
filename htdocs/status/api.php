<?
require_once '../../inc/database.inc.php';

header('Content-Type: text/plain');

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


$link = database_init();

$lasttime = intval($_GET['lasttime']);

$messages = client_messages($link, $lasttime);

foreach ($messages as $message) {
        echo $message['created'] . ':' . USERNAME .  ':' . $message['message'] . "\r\n";
}

?>
