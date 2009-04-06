<?
error_reporting(E_ALL);
require_once '../../inc/database.inc.php';
?>
<html>
<head>
<title>Pompiedom</title>
<link rel="stylesheet" href="/status/style.css"/>
</head>
<body>
<h1>Pompiedom</h1>
<p><a href="/">Back to website</a><br/>Showing last 15 updates.</p>
<? 
$link = database_init();
$messages = get_messages($link);

foreach ($messages as $message) {
?>
<p><?= $message['message'] ?></p>
<p class="info">Posted by <? echo USERNAME ?> on <span class="created"><?= $message['created'] ?></p>
<? } ?>
</body>
</html>
