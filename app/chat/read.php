<?php

header('Content-Type: application/json');

$fp = fopen('../../data/chat.txt', 'r');

$content = fread($fp, filesize('../../data/chat.txt'));

fclose($fp);

echo json_encode(['content' => $content]);