<?
require_once '../../inc/database.inc.php';

header('Content-Type: text/plain');


$link = database_init();

$lasttime = intval($_GET['lasttime']);

$messages = client_messages($link, $lasttime);

foreach ($messages as $message) {
        echo $message['created'] . ':' . USERNAME .  ':' . $message['message'] . "\r\n";
}

?>
