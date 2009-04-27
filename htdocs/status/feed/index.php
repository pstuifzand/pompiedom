<?
require_once '../../../inc/database.inc.php';
$link = database_init();

$messages = get_messages($link);

header('Content-Type: application/rss+xml');
echo '<?xml version="1.0" ?>';
echo '<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">';
echo '<channel>';
echo '<title>Peter Stuifzand - Pompiedom</title>';
echo '<link>http://peterstuifzand.nl/status/</link>';
echo '<description>Peter&apos;s status updates</description>';
echo '<atom:link href="http://peterstuifzand.nl/status/feed/" rel="self" type="application/rss+xml" />';

foreach ($messages as $message) {
    echo '<item>' . "\n";
#    echo '<title>' . htmlentities($message['message']) . '</title>';
    echo '<description>' . htmlentities($message['message']) . '</description>';
    echo '<guid>http://peterstuifzand.nl/statuses/' . $message['timestamp'] . '</guid>';
    echo '<pubDate>' . strftime("%a, %d %b %Y %H:%M:%S %z", $message['timestamp']) . '</pubDate>';
    echo '</item>' . "\n";
}

echo '</channel>';
echo '</rss>';

?>
