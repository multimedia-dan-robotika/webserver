<?php
require 'connection.php';

$sql = "SELECT AVG(sensor_kelembaban) as sensor_kelembaban
FROM testing
WHERE timestamp >= DATE_SUB((SELECT MAX(timestamp) FROM testing), INTERVAL 7 DAY) AND nama = 'Lora'
GROUP BY DATE(timestamp)
ORDER BY DATE(timestamp) DESC;";
$result = $connection->query($sql);

// Buat array kosong untuk menampung data
$data = array();

// Looping untuk mengambil data dari hasil query
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
  // Konversi nilai dari string ke integer
  $sensor_n = intval($row['sensor_kelembaban']);
  // Tambahkan nilai ke dalam array
  $data[] = $sensor_n;
}

// Balik urutan elemen array urutan reverse akan mmebuat data dari yg paling lama ke terbaru dari kiri ke kanan
$data = array_reverse($data);

// Konversi array ke dalam format JSON
$json_data = json_encode($data);

// Tampilkan data dalam format JSON
// echo $json_data;
?>
