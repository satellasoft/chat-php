<?php

header('Content-Type: application/json');

$message  = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);
$userName = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_SPECIAL_CHARS);

if (strlen(trim($message)) < 1 || $userName == null) {
    echo json_encode(['code' => -1]);
    return;
}

write($userName,  $message);

function write(string $userName,  string $message): void
{
    try {
        $fp = fopen('../../data/chat.txt', 'a+');

        $row = "<p><span>{$userName}: </span> {$message}</p>";

        fwrite($fp, $row);

        fclose($fp);

        echo json_encode(['code' => 1, 'msg' => 'okay']);
    } catch (Exception $ex) {
        echo json_encode(['code' => -1, 'msg' => $ex->getMessage()]);
    }
}
