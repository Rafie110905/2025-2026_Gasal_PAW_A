<?php
require_once 'config.php';

$start = isset($_GET['start']) && $_GET['start'] ? $_GET['start'] : date('Y-m-d', strtotime('-6 days'));
$end   = isset($_GET['end']) && $_GET['end'] ? $_GET['end'] : date('Y-m-d');

$start_safe = $conn->real_escape_string($start);
$end_safe   = $conn->real_escape_string($end);

$sql = "
SELECT 
  transaction_date AS tgl,
  COUNT(*) AS transaksi_count,
  COUNT(DISTINCT customer_id) AS unique_customers,
  SUM(amount) AS total_amount
FROM transactions
WHERE transaction_date BETWEEN '$start_safe' AND '$end_safe'
GROUP BY transaction_date
ORDER BY transaction_date ASC
";
$rs = $conn->query($sql);

$filename = "rekap_{$start}_to_{$end}.csv";
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="'.$filename.'"');

$out = fopen('php://output', 'w');
fputcsv($out, ['Tanggal','Jumlah Transaksi','Jumlah Pelanggan (unik)','Total Penerimaan']);

while($r = $rs->fetch_assoc()){
    fputcsv($out, [$r['tgl'], $r['transaksi_count'], $r['unique_customers'], $r['total_amount']]);
}
fclose($out);
exit;