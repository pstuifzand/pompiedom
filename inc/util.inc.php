<?php
function linkify_html($text) {
    $text = preg_replace('/&/', '&amp;', $text);
    $text = preg_replace('/</', '&lt;', $text);
    $text = preg_replace('/>/', '&gt;', $text);
    $text = preg_replace('/"/', '&quot;', $text);

    $text = preg_replace('{\b(http://[-a-z0-9]+(\.[-a-z0-9]+)*\.(\w{3,6})\b(/[-a-z0-9_:\@&?=+,.!/~*\'%\$]*(?<![.,?!]))?)}', '<a href="$1">$1</a>', $text);

    return $text;
}
?>
