<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Penggunaan Dana</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Laporan Penggunaan Dana</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
                <th>Deskripsi</th>
                <th>ID Kategori</th>
                <th>ID User</th>
                <th>Proyek</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($penggunaan_dana as $row): ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['tanggal']; ?></td>
                <td><?= number_format($row['jumlah'], 0, ',', '.'); ?></td>
                <td><?= $row['deskripsi']; ?></td>
                <td><?= $row['id_kategori']; ?></td>
                <td><?= $row['id_user']; ?></td>
                <td><?= $row['proyek']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
