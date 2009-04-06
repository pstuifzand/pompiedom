<?
require_once '../../inc/util.inc.php';
require_once '../../inc/database.inc.php';

$link = database_init();
$message = get_first_message($link);
?>
<div class='status'>
    <p class="message"><?= $message['message'] ?></p>
    <span class="info">Posted by <? echo USERNAME ?> on <span class="created"><?= $message['created'] ?></span>
    <p><a href="/status/">What is this?</a></p>
</div>

