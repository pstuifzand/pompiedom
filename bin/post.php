#!/usr/bin/php
<?
require_once 'inc/database.inc.php';

$link = database_init();
save_message($link, $argv[1]);


?>
