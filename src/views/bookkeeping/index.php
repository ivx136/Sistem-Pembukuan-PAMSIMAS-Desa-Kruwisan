<?php include __DIR__ . '/../layout/header.php'; ?>
<div class="container">
    <h2>Data Pembukuan</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Deskripsi</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bookkeepings as $bookkeeping): ?>
                <tr>
                    <td><?php echo $bookkeeping['id']; ?></td>
                    <td><?php echo $bookkeeping['description']; ?></td>
                    <td><?php echo $bookkeeping['amount']; ?></td>
                    <td><?php echo $bookkeeping['date']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include __DIR__ . '/../layout/footer.php'; ?>