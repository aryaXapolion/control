<?php
// Simpan command
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $command = $data["command"] ?? "";

    file_put_contents("lastCommand.txt", $command);
    echo json_encode(["status" => "OK", "received" => $command]);
    exit;
}

// Ambil command
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $command = @file_get_contents("lastCommand.txt");
    echo json_encode(["command" => $command]);
    exit;
}

echo json_encode(["status" => "Invalid Request"]);