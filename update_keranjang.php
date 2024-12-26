<?php
require_once 'config/Database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    $id_pesanan = $input['id_pesanan'];
    $jumlah_menu = $input['jumlah_menu'];

    $query = "UPDATE pesanan SET jumlah_menu = ? WHERE id_pesanan = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $jumlah_menu, $id_pesanan);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false]);
    }

    $stmt->close();
    $conn->close();
}
