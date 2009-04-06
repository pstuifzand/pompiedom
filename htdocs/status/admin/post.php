<? 
require_once '../../../inc/database.inc.php';

if (isset($_POST['message'])) {
    $link = database_init();
    save_message($link, $_POST['message']);
}

header('Location: /status/admin/');
?>
