<?php
require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/functions.php';
$products = require __DIR__ . '/data/products.php';
include __DIR__ . '/components/header.php';
?>

<h1 class="page-title">Keranjang <span>Belanja</span></h1>

<?php if ($flash = pullFlash()): ?>
    <div class="flash" style="width:100%; max-width:500px;">
        <?php echo e($flash); ?>
    </div>
<?php endif; ?>

<?php if (empty($_SESSION['cart'])): ?>
    <div class="card p-5 text-center" style="max-width:500px;">
        <h4 class="mb-3">Keranjang Kosong 😢</h4>
        <p class="text-muted mb-4">Belum ada produk yang ditambahkan</p>
        <a href="index.php" class="btn btn-primary">Lihat Katalog Produk</a>
    </div>
<?php else: ?>
    <div class="card p-4" style="width:100%; max-width:700px;">
        <?php
        $total = 0;
        foreach ($_SESSION['cart'] as $id => $jumlah):
            $nama = $products[$id]['nama'];
            $harga = $products[$id]['harga'];
            $subtotal = $harga * $jumlah;
            $total += $subtotal;
        ?>
        <div class="d-flex justify-content-between align-items-center py-3 border-bottom">
            <div>
                <h5 class="mb-1"><?php echo e($nama); ?></h5>
                <p class="text-muted mb-0">Rp <?php echo number_format($harga, 0, ',', '.'); ?> × <?php echo $jumlah; ?></p>
            </div>
            <div class="text-end">
                <p class="price mb-2">Rp <?php echo number_format($subtotal, 0, ',', '.'); ?></p>
                <form method="POST" action="actions.php" style="display:inline;">
                    <input type="hidden" name="action" value="remove">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                </form>
            </div>
        </div>
        <?php endforeach; ?>

        <div class="d-flex justify-content-between align-items-center py-4">
            <h4 class="fw-bold mb-0">Total Bayar</h4>
            <h4 class="price mb-0">Rp <?php echo number_format($total, 0, ',', '.'); ?></h4>
        </div>

        <div class="d-flex gap-3">
            <a href="index.php" class="btn btn-outline-secondary flex-grow-1">Kembali ke Katalog</a>
            <form method="POST" action="actions.php" style="flex-grow-1;">
                <input type="hidden" name="action" value="clear">
                <button type="submit" class="btn btn-outline-danger w-100" onclick="return confirm('Yakin kosongkan keranjang?')">Kosongkan</button>
            </form>
        </div>
    </div>
<?php endif; ?>

<?php include __DIR__ . '/components/footer.php'; ?>