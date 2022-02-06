<?php
$type = $_REQUEST['type'];
if (!$type) $type = 'monoroll';
$imgs = explode("\n", file_get_contents("./$type/imgs.csv"));
$num = $_REQUEST['num'];
if (!$num) $num = rand(0, count($imgs) - 1);
$img = explode(',', $imgs[$num]);
$url = explode('{key}', file_get_contents("./$type/url.cfg"));
echo <<<EOF
{   "id": "$img[0]",
    "author": "$img[1]",
    "title": "$img[2]",
    "url": "$url[0]$img[3]$url[1]",
    "comment": "$img[4]",
}
EOF;
