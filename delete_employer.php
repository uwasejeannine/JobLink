<?php
require("config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $stmt = $conn->prepare("DELETE FROM employers WHERE id = ?");
    $stmt->bind_param("i", $id);
    $success = $stmt->execute();
    $stmt->close();

    echo json_encode(["success" => $success]);
} else {
    echo json_encode(["success" => false, "message" => "Invalid request."]);
}
?>




