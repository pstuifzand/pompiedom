<html>
<head>
<title>Admin - Pompiedom</title>
<link rel="stylesheet" href="/status/style.css"/>
</head>
<body>
<h1>Pompiedom</h1>
<div style="width:600px">
<p style="float:left">What are you doing?</p><span style="color:#888;float:right;font-size:33pt" id="counter"></span>

<form action="/status/admin/post.php" method="post">
    <textarea name='message' rows='2' cols='55' id='status'></textarea><br/>
    <input type='submit' value='Update' />
</form>


<? 
require_once '../../../inc/database.inc.php';
$link = database_init();
$messages = get_messages($link);

foreach ($messages as $message) {
?>
<p><?= $message['message'] ?></p>
<p class="info">Posted by <? echo USERNAME ?> on <span class="created"><?= $message['created'] ?></p>
<? } ?>

</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script src="jquery.charcounter.js"></script>
<script>
$(document).ready(function() {
    $('#status').charCounter(255, {'format':'%1','container':'#counter'}) 
});
</script>
</body>
</html>

