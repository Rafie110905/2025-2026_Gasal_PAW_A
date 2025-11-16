<?php
require_once 'config.php';
$start = isset($_GET['start']) && $_GET['start'] ? $_GET['start'] : date('Y-m-d', strtotime('-6 days'));
$end   = isset($_GET['end']) && $_GET['end'] ? $_GET['end'] : date('Y-m-d');


$start_safe = $conn->real_escape_string($start);
$end_safe   = $conn->real_escape_string($end);

$sql_rekap = "
SELECT 
  transaction_date AS tgl,
  COUNT(*) AS transaksi_count,
  SUM(amount) AS total_amount,
  COUNT(DISTINCT customer_id) AS unique_customers
FROM transactions
WHERE transaction_date BETWEEN '$start_safe' AND '$end_safe'
GROUP BY transaction_date
ORDER BY transaction_date ASC
";
$rs = $conn->query($sql_rekap);


$labels = [];
$data_totals = [];
$rekap_rows = [];
while ($row = $rs->fetch_assoc()) {
    $labels[] = $row['tgl'];
    $data_totals[] = (float)$row['total_amount'];
    $rekap_rows[] = $row;
}


$sql_total = "
SELECT 
  COUNT(DISTINCT customer_id) AS total_customers,
  SUM(amount) AS grand_total
FROM transactions
WHERE transaction_date BETWEEN '$start_safe' AND '$end_safe'
";
$r_total = $conn->query($sql_total);
$total = $r_total->fetch_assoc();
$total_customers = $total['total_customers'] ?? 0;
$grand_total = $total['grand_total'] ?? 0.00;


function rupiah($n){ return number_format($n,0,',','.'); }

?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Reporting - Grafik, Rekap & Total</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body{font-family: Arial, sans-serif;margin:20px;background:#f7f7f7}
    .card{background:white;padding:16px;border-radius:8px;box-shadow:0 1px 4px rgba(0,0,0,0.08);margin-bottom:16px}
    .flex{display:flex;gap:12px;align-items:center}
    .controls input{padding:6px;border:1px solid #ccc;border-radius:4px}
    .btn{padding:8px 12px;border:none;border-radius:6px;cursor:pointer}
    .btn-primary{background:#1f8ef1;color:white}
    .btn-default{background:#e7e7e7}
    table{width:100%;border-collapse:collapse}
    th,td{padding:8px;border:1px solid #ddd;text-align:left}
    .right{text-align:right}
    @media print {
      .no-print{display:none}
    }
  </style>
</head>
<body>

<h2>Reporting — Grafik, Rekap & Total</h2>

<div class="card no-print">
  <form method="get" class="flex controls" style="gap:10px;flex-wrap:wrap">
    <label>Start: <input type="date" name="start" value="<?=htmlspecialchars($start)?>"></label>
    <label>End:   <input type="date" name="end"   value="<?=htmlspecialchars($end)?>"></label>
    <button class="btn btn-primary" type="submit">Filter</button>

    
    <div style="margin-left:auto">
      <button type="button" class="btn btn-default no-print" onclick="window.print()">Print</button>
      <a class="btn btn-default no-print" href="export_excel.php?start=<?=urlencode($start)?>&end=<?=urlencode($end)?>">Export Excel</a>
    </div>
  </form>
</div>


<div class="card">
  <h3>Grafik: Total Penerimaan per Tanggal</h3>
  <canvas id="barChart" height="120"></canvas>
</div>

<div class="card">
  <h3>Rekap</h3>
  <table>
    <thead>
      <tr>
        <th>Tanggal</th>
        <th class="right">Jumlah Transaksi</th>
        <th class="right">Jumlah Pelanggan (unik)</th>
        <th class="right">Total Penerimaan</th>
      </tr>
    </thead>
    <tbody>
      <?php if(count($rekap_rows)==0): ?>
        <tr><td colspan="4">Tidak ada data untuk rentang tanggal ini.</td></tr>
      <?php else: foreach($rekap_rows as $r): ?>
        <tr>
          <td><?=htmlspecialchars($r['tgl'])?></td>
          <td class="right"><?=number_format($r['transaksi_count'])?></td>
          <td class="right"><?=number_format($r['unique_customers'])?></td>
          <td class="right"><?=rupiah($r['total_amount'])?></td>
        </tr>
      <?php endforeach; endif; ?>
    </tbody>
  </table>
</div>

<div class="card">
  <h3>Total (kumulatif pada rentang)</h3>
  <div class="flex">
    <div style="min-width:200px">
      <strong>Jumlah Pelanggan Unik:</strong>
      <div style="font-size:22px"><?=number_format($total_customers)?></div>
    </div>
    <div style="min-width:200px">
      <strong>Total Pendapatan:</strong>
      <div style="font-size:22px">Rp <?=rupiah($grand_total)?></div>
    </div>
  </div>
</div>

<script>
const labels = <?=json_encode($labels)?>;
const dataTotals = <?=json_encode($data_totals)?>;

const ctx = document.getElementById('barChart').getContext('2d');
const chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Total Penerimaan (Rp)',
            data: dataTotals,
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: false },
            title: { display: false }
        },
        scales: {
            y: {
                ticks: {
                    callback: function(value, index, values) {
                        return value.toLocaleString('id-ID');
                    }
                }
            }
        }
    }
});
</script>

</body>
</html>