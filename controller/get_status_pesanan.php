<?php
// Koneksi ke database
require __DIR__ . '/../config/Database.php'; // Sesuaikan path koneksi

header('Content-Type: application/json'); // Respons berupa JSON

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  // Query semua status pesanan
  $query = "SELECT id_pesanan, status_pesanan FROM pesanan";
  $result = $conn->query($query);

  if ($result) {
    $pesanan = [];
    while ($row = $result->fetch_assoc()) {
      $pesanan[] = [
        'id_pesanan' => $row['id_pesanan'],
        'status_pesanan' => $row['status_pesanan']
      ];
    }
    echo json_encode(['success' => true, 'pesanan' => $pesanan]);
  } else {
    echo json_encode(['success' => false, 'message' => 'Gagal mengambil data pesanan: ' . $conn->error]);
  }
} else {
  echo json_encode(['success' => false, 'message' => 'Metode tidak valid.']);
}
