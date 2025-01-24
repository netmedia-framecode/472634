<?php
// Koneksi ke database
require __DIR__ . '/../config/Database.php'; // Pastikan path ini sesuai dengan file koneksi Anda

header('Content-Type: application/json'); // Pastikan respons berupa JSON

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Ambil data dari request
  $id_tempat = $_POST['id_tempat'] ?? null;

  if ($id_tempat && is_numeric($id_tempat)) {
    // Gunakan prepared statement untuk menghindari SQL injection
    $query = "UPDATE pesanan SET status_pesanan = 'Gagal' WHERE id_pesanan = ? AND status_pesanan != 'Diterima'";
    $stmt = $conn->prepare($query);

    if ($stmt) {
      $stmt->bind_param('i', $id_tempat);
      $stmt->execute();

      if ($stmt->affected_rows > 0) {
        echo json_encode(['success' => true, 'message' => 'Status diperbarui ke Gagal.']);
      } else {
        echo json_encode(['success' => false, 'message' => 'Tidak ada data yang diperbarui.']);
      }

      $stmt->close();
    } else {
      echo json_encode(['success' => false, 'message' => 'Kesalahan pada query: ' . $conn->error]);
    }
  } else {
    echo json_encode(['success' => false, 'message' => 'ID Tempat tidak valid atau tidak ditemukan.']);
  }
} else {
  echo json_encode(['success' => false, 'message' => 'Metode tidak valid.']);
}
